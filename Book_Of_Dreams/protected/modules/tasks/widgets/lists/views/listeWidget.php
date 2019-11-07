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
use humhub\widgets\Button;
use yii\helpers\Html;

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
    <div class="task-list-items">
        <?php foreach ($tasks as $tasks) : ?>
            <?= TaskListItem::widget(['tasks' => $tasks]) ?>
        <?php endforeach; ?>
    </div>
</div>
<?= Html::endTag('div') ?>
