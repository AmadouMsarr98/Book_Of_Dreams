<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 *
 */
use humhub\modules\admin\widgets\ExportButton;
use humhub\modules\tasks\helpers\TaskListUrl;
use humhub\modules\tasks\models\lists\TaskList;
use humhub\modules\tasks\widgets\lists\TaskListItem;
use humhub\widgets\Button;
use yii\helpers\Html;
use humhub\widgets\Link;

/* @var $this \humhub\components\View */
/* @var $list \humhub\modules\tasks\models\lists\TaskListInterface */
/* @var $title string */
/* @var $color string */
/* @var $listId int|null */
/* @var $options array */
/* @var $tasks \humhub\modules\tasks\models\Task[] */
/* @var $completedTasks \humhub\modules\tasks\models\Task[] */
/* @var $completedTasksCount int */
/* @var $contentContainer \humhub\modules\content\components\ContentContainerActiveRecord */
/* @var $editListUrl string|null */
/* @var $addTaskUrl string */
/* @var $showMoreCompletedUrl string */
/* @var $canManage boolean */
/* @var $canCreate boolean */
/* @var $canSort boolean */

?>

<?= Html::beginTag('div', $options) ?>
<div class="task-list-container collapsable" style="border-color:<?= $color ?>">
    <div class="task-list-title-bar clearfix">
            <i class="fa fa-tasks"></i>

        <?= Html::encode($title) ?>

        <?php if ($list instanceof TaskList) : ?>


<!-- ------------------------------------------------------------------ -->
        
        <div class="task-controls end pull-right">
            <div class="btn-group">
                <?= Link::none()->icon('fa-ellipsis-v')
                    ->cssClass('dropdown-toggle')
                    ->options([
                        'data-toggle' => 'dropdown',
                        'haspopup' => 'true',
                        'aria-expanded' => 'false'
                    ])->sm()->loader(false) ?>
                <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu pull-right">
                   
                    <li>
                        <?= Button::asLink(Yii::t('TasksModule.base', 'Modifier le projet'))
                            ->action('task.list.edit', TaskListUrl::editTaskList($list))->loader(false)
                            ->icon('fa-pencil'); ?>
                    </li>
                    <li>
                        <?= Button::asLink(Yii::t('TasksModule.base', 'Supprimer le projet'))
                            ->action('deleteList', TaskListUrl::deleteTaskList($list))->loader(false)
                            ->icon('fa-trash')->confirm(); ?>
                    </li>
                    <li>
                        <?= Button::asLink(Yii::t('TasksModule.base', 'Ajouter une tache'))->icon('fa-plus')->xs()
                            ->action('task.list.editProjet', TaskListUrl::addTaskListTask($list))
                            ->loader(false)->visible($canCreate)->cssClass('tt'); ?>
                    
                    </li>
                    <li>
                        <?= Button::asLink(Yii::t('TasksModule.base', 'Lister les taches'))->xs()
                            ->action('task.list.loadComments', TaskListUrl::showTask($list))->loader(false)
                            ->icon('fa fa-list'); ?>
                    </li>
                    <li>
                        <?= Button::asLink(Yii::t('TasksModule.base', 'Afficher Kanban'))->xs()
                            ->action('task.list.editTasks', TaskListUrl::showKanban($list))->loader(false)
                            ->icon('fa fa-table'); ?>
                    </li>
                    

                </ul>
            </div>


        </div>
    <!-- ------------------------------------------------------------------ -->
    <?php endif; ?>

    </div>
    <?php $i = 0?>
    <?php foreach ($tasks as $task) : ?>
        <?php if ($task->isOverdue()) :?>
            <?php  $i++?>
        <?php endif; ?>
    <?php endforeach; ?>
        <div style="margin-left:10%;">
            <p class="label label-default"><?= '<i class="fa fa-info-circle"></i> ' . Yii::t('TasksModule.views_index_index', 'Pending'); ?> : <?= count($tasks1) ?></p><br>
            <p class="label label-info "><?= '<i class="fa fa-edit"></i> ' . Yii::t('TasksModule.views_index_index', 'In Progress'); ?> : <?= count($tasks2) ?></p><br>
            <p class="label label-success"><?= '<i class="fa fa-check-square"></i> ' . Yii::t('TasksModule.views_index_index', 'Completed'); ?> : <?= count($tasks3) ?></p><br>
            <p class="label label-danger " ><?= '<i class="fa fa-exclamation-triangle"></i> ' . Yii::t('TasksModule.views_index_index', 'Overdue'); ?> : <?= $i ?></p><br>
        </div>

</div>
<?= Html::endTag('div') ?>
