<?php

namespace humhub\modules\tasks\controllers;
use humhub\modules\content\components\ContentContainerControllerAccess;
use humhub\modules\tasks\models\Task;
use humhub\modules\tasks\helpers\TaskUrl;
use Yii;
use yii\web\HttpException;
use humhub\modules\tasks\models\lists\TaskList;
use humhub\modules\space\models\Space;
use humhub\modules\tasks\models\forms\ItemDrop;
use humhub\modules\tasks\models\forms\TaskForm;
use humhub\modules\tasks\models\user\TaskUser;
use humhub\modules\tasks\permissions\CreateTask;
use humhub\modules\tasks\permissions\ManageTasks;
use humhub\modules\user\models\UserPicker;
use humhub\widgets\ModalClose;
use humhub\modules\tasks\models\lists\TaskListInterface;
use yii\web\Controller;
use humhub\modules\user\models\User;
use humhub\widgets\JsWidget;

use humhub\modules\tasks\models\lists\TaskListItemDrop;
use humhub\modules\tasks\models\lists\TaskListRootItemDrop;
use humhub\modules\tasks\models\lists\UnsortedTaskList;
use humhub\modules\tasks\widgets\lists\CompletedTaskListItem;
use humhub\modules\tasks\widgets\lists\CompletedTaskListView;
use humhub\modules\tasks\widgets\lists\TaskListDetails;
use humhub\modules\tasks\widgets\lists\TaskListItem;
use humhub\modules\tasks\widgets\lists\TaskListWidget;
use humhub\modules\tasks\widgets\lists\UnsortedTaskListWidget;
class ProjectController extends AbstractTaskController
{

    public function getAccessRules()
    {
        return [
            [ContentContainerControllerAccess::RULE_USER_GROUP_ONLY => [Space::USERGROUP_MEMBER, User::USERGROUP_SELF]],
            ['permission' => ManageTasks::class, 'actions' => ['edit', 'delete', 'drop-task', 'drop-task-list']],
        ];
    }
    

    public function actionShowTasks($id)
    {
       
        $taskList = $this->getTaskListById($id);
        if (!$taskList) {
            throw new HttpException(404);
        } else 
            $tasks = Task::find()->where(['task_list_id'=>$taskList->id])->all();
            return $this->renderAjax('showTasks',
            ['tasks'=>$tasks,
            'canManage' =>  $this->canManageTasks(),
            'canCreate' => $this->canCreateTask(),
            'title'=>$taskList->title]);
        
    }

    public function actionShowKanban($id = null)
    {
        $id =  $this->getTaskListById($id);
        if(!$id){
            throw new HttpException(404);
        }
        else
        $Tasks1= Task::find()->where(['task_list_id'=>$id, 'status'=>1])->all(); 
        $Tasks2= Task::find()->where(['task_list_id'=>$id, 'status'=>2])->all(); 
        $Tasks3= Task::find()->where(['task_list_id'=>$id, 'status'=>5])->all(); 
        return $this->renderAjax('kanban',
            ['Tasks1'=>$Tasks1,
             'Tasks2'=>$Tasks2,
             'Tasks3'=>$Tasks3,
             'title'=>$id->title]
        );
    }

    
    
    public function getTaskListById($id)
    {
        $taskList = TaskList::findById($id, $this->contentContainer);
        if(!$taskList) {
            throw new HttpException(404);
        }
        return $taskList;
    }





    public function actionEdit($id = null)
    {
        $taskList = ($id) ? $this->getTaskListById($id) : new TaskList($this->contentContainer);

        if(!$taskList) {
            throw new HttpException(404);
        }

        if($taskList->load(Yii::$app->request->post()) && $taskList->save()) {
            return ModalClose::widget();
        }

        return $this->renderAjax('edit', [
            'model' => $taskList,
        ]);
    }

    public function actionDelete($id)
    {
        $this->forcePostRequest();
        $this->getTaskListById($id)->delete();
        return $this->asJson(['success' => true]);
    }

    public function actionLoadClosedLists()
    {
        return CompletedTaskListView::widget(['contentContainer' => $this->contentContainer]);
    }

    public function actionLoadCompleted($id)
    {
        return CompletedTaskListItem::widget(['contentContainer' => $this->contentContainer, 'taskList' =>  $this->getTaskListById($id)]);
    }
    public function actionLoadTaskDetails($id)
    {
        return TaskListDetails::widget(['task' => $this->getTaskById($id)]);
    }

    public function actionDropTask()
    {
        $model = new TaskListItemDrop(['contentContainer' => $this->contentContainer]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->asJson([
                'success' => true
            ]);
        }

        return $this->asJson(['success' => false]);
    }

    public function actionDropTaskList()
    {
        $model = new TaskListRootItemDrop(['contentContainer' => $this->contentContainer]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->asJson(['success' => true]);
        }

        return $this->asJson(['success' => false]);
    }

    public function actionShowMoreCompleted($id = null, $offset)
    {
        /** @var $taskList TaskListInterface */
        $taskList = $id ? TaskList::findById($id, $this->contentContainer) :  new UnsortedTaskList(['contentContainer' => $this->contentContainer]);

        if(!$taskList) {
            throw new HttpException(404);
        }

        $tasks = $taskList->getShowMoreCompletedTasks($offset, 10);
        $completedTaskCount = $taskList->getCompletedTasks()->count();

        $result = [];
        foreach ($tasks as $task) {
            $result[] = TaskListItem::widget(['task' => $task]);
        }


        $remainingCount = $completedTaskCount - ($offset + count($result));

        return $this->asJson([
            'tasks' => $result,
            'remainingCount' => $remainingCount,
            'showMoreMessage' => Yii::t('TasksModule.base','Show {count} more completed {n,plural,=1{task} other{tasks}}', ['n' => $remainingCount, 'count' => $remainingCount])
        ]);
    }

    public function actionLoadAjax($id = null)
    {
        if(!$id) {
            return UnsortedTaskListWidget::widget(['canManage' =>  $this->canManageTasks(), 'canCreate' => $this->canCreateTask()]);
        }

        $taskList = TaskList::findById($id, $this->contentContainer);
        if(!$taskList) {
            throw new HttpException(404);
        }

        return TaskListWidget::widget(['list' => $taskList, 'canManage' =>  $this->canManageTasks(), 'canCreate' => $this->canCreateTask()]);
    }

    public function actionLoadAjaxTask($id)
    {
        return TaskListItem::widget(['task' => $this->getTaskById($id), 'details' => true]);
    }
}