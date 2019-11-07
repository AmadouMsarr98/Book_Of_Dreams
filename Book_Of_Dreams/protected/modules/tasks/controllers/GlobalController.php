<?php
/**
 * Created by PhpStorm.
 * User: kingb
 * Date: 05.10.2018
 * Time: 20:22
 */

namespace humhub\modules\tasks\controllers;

use humhub\modules\content\components\ContentContainerController;
use Yii;
use humhub\components\access\ControllerAccess;
use humhub\components\Controller;
use humhub\modules\tasks\models\forms\TaskFilter;
use humhub\modules\tasks\widgets\search\TaskSearchList;

//import
//use humhub\modules\tasks\models\lists\TaskList;
use humhub\modules\content\components\ContentContainerActiveRecord;


use humhub\modules\content\components\ContentContainerControllerAccess;
use humhub\modules\space\models\Space;
use humhub\modules\tasks\models\lists\TaskListItemDrop;
use humhub\modules\tasks\models\lists\TaskListRootItemDrop;
use humhub\modules\tasks\models\lists\TaskList;
use humhub\modules\tasks\models\lists\TaskListInterface;
use humhub\modules\tasks\models\lists\UnsortedTaskList;
use humhub\modules\tasks\permissions\ManageTasks;
use humhub\modules\tasks\widgets\lists\CompletedTaskListItem;
use humhub\modules\tasks\widgets\lists\CompletedTaskListView;
use humhub\modules\tasks\widgets\lists\TaskListDetails;
use humhub\modules\tasks\widgets\lists\TaskListItem;
use humhub\modules\tasks\widgets\lists\TaskListWidget;
use humhub\modules\tasks\widgets\lists\UnsortedTaskListWidget;
use humhub\modules\user\models\User;



class GlobalController extends AbstractTaskController
{
    public $requireContainer = false;

    public function getAccessRules()
    {
        return [
            [ControllerAccess::RULE_LOGGED_IN_ONLY]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'filter' =>  new TaskFilter(['filters' => [TaskFilter::FILTER_ASSIGNED]])
        ]);
    }

    public function actionFilter()
    {
        $filter = new TaskFilter(['contentContainer' => $this->contentContainer]);
        $filter->load(Yii::$app->request->get());

        return $this->asJson([
            'success' => true,
            'result' => TaskSearchList::widget(['filter' => $filter])
        ]);
    }

    public function actionProject()
    {
        

         return $this->render('project', [
            'contentContainer' => $this->contentContainer,
            'taskLists' => TaskList::findOverviewList($this->contentContainer)->all()]);
    }


}