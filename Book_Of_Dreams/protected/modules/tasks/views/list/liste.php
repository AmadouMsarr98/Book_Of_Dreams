<?php
use humhub\modules\tasks\helpers\TaskListUrl;
use humhub\modules\tasks\widgets\lists\CompletedTaskListView;
use humhub\modules\tasks\assets\Assets;
use humhub\modules\tasks\widgets\lists\TaskListWidget;
use humhub\modules\tasks\widgets\lists\UnsortedTaskListWidget;
use humhub\modules\tasks\widgets\TaskSubMenu;
use humhub\widgets\Button;

?>

<div class="task-list-ul">
    <div class="task-list-li">
        <?= TaskListWidget::widget(['list' => $taskLists]) ?> 
    </div>
</div>
