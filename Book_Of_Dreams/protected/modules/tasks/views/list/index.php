<?php
use humhub\modules\tasks\widgets\lists\TaskListWidget;
use humhub\modules\tasks\widgets\lists\TaskProjectWidget;
use humhub\modules\tasks\widgets\TaskSubMenu;
use humhub\widgets\Button;
use humhub\modules\tasks\helpers\TaskListUrl;
use humhub\widgets\ModalDialog;
/* @var $this \humhub\modules\ui\view\components\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $filter TaskFilter */
\humhub\modules\tasks\assets\Assets::register($this);
?>
<div class="panel panel-default task-list">
    <?= TaskSubMenu::widget() ?>

    <div class="panel-body clearfix">
        <?= Button::success(Yii::t('TasksModule.base', 'Créer un projet'))
            ->action('task.list.create', TaskListUrl::createTaskList($contentContainer))->sm()->icon('fa-plus')->right()->loader(false)->visible($canManage); ?>
        <h4><?= Yii::t('TasksModule.base', 'Liste des projets')?></h4>
        <div class="help-block"><?= Yii::t('TasksModule.base', 'Vous pouvez gérer ici vos projets.') ?></div>
    </div>

    <div class="panel-body">
			<div class="task-list-ul row">
                <?php foreach ($taskLists as $taskList) : ?>
                    <div class="task-list-li col-sm-4">
                        <?= TaskProjectWidget::widget(['list' => $taskList, 'canManage' => $canManage, 'canCreate' => $canCreate]) ?>
                    </div>
                <?php endforeach; ?>
            </div>
    </div>
</div>
