<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 *
 */

namespace humhub\modules\tasks\widgets\lists;

use humhub\modules\content\components\ContentContainerActiveRecord;
use humhub\modules\tasks\helpers\TaskListUrl;
use humhub\modules\tasks\models\Task;
use humhub\modules\tasks\models\lists\TaskListInterface;
use humhub\widgets\JsWidget;
use Yii;

class TaskProjectWidget extends JsWidget
{
    /**
     * @inheritdocs
     */
    public $init = true;

    /**
     * @inheritdocs
     */
    public $jsWidget = 'task.list.TaskList';

    /**
     * @var TaskListInterface
     */
    public $list;

    /**
     * @var Task[] | null
     */
    public $tasks;

    public $canBeSorted = true;

    public $canManage = false;

    public $canCreate = false;

    /**
     * @inheritdocs
     */
    public function run()
    {

        $tasks1= Task::find()->where(['task_list_id'=>$this->list->getId(), 'status'=>1])->all(); 
        $tasks2= Task::find()->where(['task_list_id'=>$this->list->getId(), 'status'=>2])->all(); 
        $tasks3= Task::find()->where(['task_list_id'=>$this->list->getId(), 'status'=>5])->all();
        $tasks= Task::find()->where(['task_list_id'=>$this->list->getId()])->all(); 

        $completedTasksQuery = $this->getCompletedTasksQuery();
        $countQuery = clone $completedTasksQuery;
       // $tasks = $this->getNonCompletedTasks();

        return $this->render('taskProject', [
            'list' => $this->list,
            'title' => $this->getTitle(),
            'tasks' => $tasks,
            'tasks1' => $tasks1,
            'tasks2' => $tasks2,
            'tasks3' => $tasks3,
            'canManage' => $this->canManage,
            'canSort' => $this->canManage && $this->canBeSorted,
            'canCreate' => $this->canCreate,
            'completedTasks' => $completedTasksQuery->limit(3)->all(),
            'completedTasksCount' => $countQuery->count(),
            'options' => $this->getOptions(),
            'color' => $this->list->getColor(),
        ]);
    }

    


    protected function getNonCompletedTasks()
    {
        return $this->list->getNonCompletedTasks()->all();
    }

    protected function getCompletedTasksQuery()
    {
        return $this->list->getCompletedTasks();
    }

    protected function getTitle()
    {
        return $this->list->getTitle();
    }

    public function getData()
    {
        return [
            'task-list-id' => $this->list->getId(),
            'can-manage' => $this->canManage,
            'reload-url' => TaskListUrl::reloadTaskList($this->list),
            'drop-task-url' => TaskListUrl::dropTaskListTask($this->list)
        ];
    }
}