<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 *
 */

use humhub\modules\tasks\helpers\TaskListUrl;
use humhub\modules\tasks\models\lists\TaskList;
use humhub\modules\tasks\widgets\lists\TaskListItem;
use humhub\modules\tasks\widgets\lists\TaskListWidget;
use humhub\widgets\Button;
use yii\helpers\Html;
use humhub\widgets\ModalDialog;
use humhub\modules\content\widgets\WallEntryAddons;
use humhub\modules\comment\widgets\Comments;
use humhub\widgets\ModalButton;


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
<div class="task-list">
<?php ModalDialog::begin(['size' => 'large', 'closable' => true]); ?>
    <?= Html::beginTag('div') ?>
        <div class="task-list-items " >
        <p class="titre-kanban">Liste de taches de <strong><?= $title ?></strong> </p>
        <hr>
        <?php if (count($tasks) > 0) : ?>
            <?php foreach ($tasks as $task) : ?>
                <?= TaskListItem::widget(['task' => $task, 'canManage' => $canManage]) ?>
            <?php endforeach; ?>
            <?php else :?>
            <?php echo('La liste est vide'); ?>
        <?php endif; ?>
        </div>
    <?= Html::endTag('div') ?>
    <div class="modal-footer">
        <?= ModalButton::cancel(Yii::t('TasksModule.base', 'Quitter')) ?>
    </div>
<?php ModalDialog::end(); ?>
</div>
