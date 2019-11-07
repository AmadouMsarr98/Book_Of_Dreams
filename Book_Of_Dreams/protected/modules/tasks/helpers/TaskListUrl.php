<?php

namespace humhub\modules\tasks\helpers;

use humhub\modules\content\components\ContentActiveRecord;
use humhub\modules\content\components\ContentContainerActiveRecord;
use humhub\modules\content\components\ContentContainerController;
use humhub\modules\content\models\ContentTag;
use humhub\modules\tasks\models\lists\TaskList;
use humhub\modules\tasks\models\lists\TaskListInterface;
use humhub\modules\tasks\models\Task;
use Yii;

class TaskListUrl extends TaskUrl
{
    const ROUTE_TASKLIST_ROOT = '/tasks/list';
    const ROUTE_SHOW_KANBAN = '/tasks/project/show-kanban';
    const ROUTE_SHOW_LISTE = '/tasks/list/liste-project';

    const ROUTE_EDIT_TASKLIST = '/tasks/list/edit';
    const ROUTE_DELETE_TASKLIST = '/tasks/list/delete';
    const ROUTE_RELOAD_TASKLIST = '/tasks/list/load-ajax';
    const ROUTE_RELOAD_TASKLIST_TASK = '/tasks/list/load-ajax-task';
    const ROUTE_RELOAD_COMPLETED_TASKLIST = '/tasks/list/load-completed';
    const ROUTE_TASKLIST_LOAD_DETAILS = '/tasks/list/load-task-details';
    const ROUTE_DROP_TASKLIST_TASK = '/tasks/list/drop-task';
    const ROUTE_DROP_TASKLIST = '/tasks/list/drop-task-list';

    const ROUTE_LOAD_CLOSED_LISTS = '/tasks/list/load-closed-lists';

    //ajout
    
    const ROUTE_VIEW_CALENDAR = '/tasks/calendar';
    const ROUTE_SHOW_TASKS = '/tasks/project/show-tasks';


    public static function taskListRoot(ContentContainerActiveRecord $container)
    {
        return $container->createUrl(static::ROUTE_TASKLIST_ROOT);
    }
    //calendar 
    public static function testTask(ContentContainerActiveRecord $container)
    {
        return $container->createUrl(static::ROUTE_VIEW_CALENDAR);
    }

    public static function createTaskList(ContentContainerActiveRecord $container)
    {
        return $container->createUrl(static::ROUTE_EDIT_TASKLIST);
    }

    public static function editTaskList(TaskList $taskList)
    {
        return static::container($taskList)->createUrl(static::ROUTE_EDIT_TASKLIST, ['id' => $taskList->id]);
    }
     //kanban
     public static function showKanban( $taskList = NULL)
     {
         if (!$taskList) {
            return static::container($taskList)->createUrl(static::ROUTE_SHOW_KANBAN);
         }
         return static::container($taskList)->createUrl(static::ROUTE_SHOW_KANBAN, ['id' => $taskList->getId()]);
         
     }
      //Liste
      public static function showListe(TaskListInterface $taskList)
      {
          return static::container($taskList)->createUrl(static::ROUTE_SHOW_LISTE, ['liste' => $taskList]);
          
      }
      
      public static function showTask(TaskListInterface $taskList)
      {
          return static::container($taskList)->createUrl(static::ROUTE_SHOW_TASKS, ['id' => $taskList->getId()]);
          
      }

    public static function deleteTaskList(TaskListInterface $taskList)
    {
        return static::container($taskList)->createUrl(static::ROUTE_DELETE_TASKLIST, ['id' => $taskList->getId()]);
    }


    public static function showMore(TaskListInterface $taskList)
    {
        return static::container($taskList)->createUrl('/tasks/list/show-more-completed', ['id' => $taskList->getId()]);
    }

    public static function addTaskListTask(TaskListInterface $taskList)
    {
        return static::container($taskList)->createUrl(static::ROUTE_EDIT_TASK, ['listId' => $taskList->getId()]);
    }

    public static function reloadTaskList(TaskListInterface $taskList)
    {
        return static::container($taskList)->createUrl(static::ROUTE_RELOAD_TASKLIST, ['id' =>  $taskList->getId()]);
    }

    public static function reloadTaskListTask(Task $task)
    {
        return static::container($task)->createUrl(static::ROUTE_RELOAD_TASKLIST_TASK, ['id' =>  $task->id]);
    }

    public static function reloadCompletedTaskList(TaskList $taskList)
    {
        return static::container($taskList)->createUrl(static::ROUTE_RELOAD_COMPLETED_TASKLIST, ['id' =>  $taskList->getId()]);
    }

    public static function loadTaskDetails(Task $task)
    {
        return static::container($task)->createUrl(static::ROUTE_TASKLIST_LOAD_DETAILS, ['id' =>  $task->id]);
    }


    public static function dropTaskListTask(TaskListInterface $taskList)
    {
        return static::container($taskList)->createUrl(static::ROUTE_DROP_TASKLIST_TASK, ['id' =>  $taskList->getId()]);
    }

    public static function dropTaskList(ContentContainerActiveRecord $container)
    {
        return  $container->createUrl('/tasks/list/drop-task-list');
    }

}