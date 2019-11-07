<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 *
 */

use humhub\modules\comment\models\Comment;

use humhub\modules\tasks\helpers\TaskUrl;
use humhub\modules\tasks\widgets\lists\TaskListDetails;
use humhub\modules\tasks\widgets\TaskBadge;
use humhub\modules\tasks\widgets\TaskPercentageBar;
use humhub\modules\tasks\widgets\TaskUserList;
use humhub\widgets\Link;
use humhub\widgets\Button;
use humhub\modules\tasks\models\Task;
use humhub\modules\content\widgets\MoveContentLink;
use yii\helpers\Html;

/* @var $this \humhub\components\View */
/* @var $task \humhub\modules\tasks\models\Task */
/* @var $options array */
/* @var $details boolean */
/* @var $canManage boolean */
/* @var $contentContainer \humhub\modules\content\components\ContentActiveRecord */

$checkUrl = $task->state->getCheckUrl();

?>

<?= Html::beginTag('div', $options) ?>

<div class="task-list-task-title-bar">
    <span class="task-list-item-title">

         
             <i class="fa fa-bars task-moving-handler"></i>
        

        <?php // We use an extra label in order to prevent click events on the actual label otherwise tasks could be accidentally finished ?>
        <?= Html::checkBox('item[' . $task->id . ']', $task->isCompleted(), [
            'label' => '&nbsp;',
            'data-action-change' => 'changeState',
            'data-action-url' => $checkUrl,
            'disabled' => empty($checkUrl)
        ]); ?>

        <span class="toggleTaskDetails"><?= Html::encode($task->title) ?></span>

        <?= TaskBadge::widget(['task' => $task, 'includePending' => false, 'includeCompleted' => false]) ?>
        
    </span>
  
    <?php if ($task->content->canEdit()) : ?>
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
                        <?= Button::asLink(Yii::t('TasksModule.base', 'Edit task'))
                            ->action('task.list.editTask', TaskUrl::editTask($task))
                            ->icon('fa-pencil'); ?>
                    </li>
                  
                    <li>
                        <?= Button::asLink(Yii::t('TasksModule.base', 'Delete task'))
                            ->action('task.deleteTask', TaskUrl::deleteTask($task))
                            ->icon('fa-trash')->confirm(); ?>
                    </li>
                </ul>
            </div>


        </div>
    <?php endif; ?>

</div>
<?php if ($details) : ?>
    <?= TaskListDetails::widget(['task' => $task]) ?>
<?php endif; ?>
<?= Html::endTag('div') ?>


