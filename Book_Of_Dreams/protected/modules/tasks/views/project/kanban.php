<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 *
 */

use humhub\modules\tasks\widgets\search\TaskSearchList;
use humhub\modules\tasks\widgets\TaskSubMenu;
use humhub\modules\tasks\widgets\search\TaskFilterNavigation;
use humhub\modules\tasks\models\forms\TaskFilter;
use \humhub\modules\content\components\ContentContainerActiveRecord;
use yii\helpers\Html;
use humhub\widgets\Button;
use humhub\modules\tasks\permissions\ManageTasks;
use humhub\modules\tasks\helpers\TaskListUrl;
use humhub\modules\tasks\widgets\lists\CompletedTaskListView;
use humhub\modules\tasks\assets\Assets;
use humhub\modules\tasks\widgets\lists\TaskListWidget;
use humhub\modules\tasks\widgets\lists\UnsortedTaskListWidget;
use humhub\modules\tasks\models\lists\TaskList;
use humhub\widgets\ModalDialog;
use humhub\widgets\ModalButton;
use yii\helpers\Url;

\humhub\modules\tasks\assets\Assets::register($this);

 
/* @var $canEdit boolean */
/* @var $contentContainer \humhub\modules\content\components\ContentContainerActiveRecord */
/* @var $pendingTasks \humhub\modules\tasks\models\Task[] */
/* @var $tasksPastProvider \yii\data\ActiveDataProvider */
/* @var $filter \humhub\modules\tasks\models\forms\TaskFilter */
  
?>
<?php ModalDialog::begin(['size' => 'large', 'closable' => true]);?>
<div class="modal-body" style="padding-bottom:0px">
  <p class="titre-kanban">Tableau Kanban de <strong><?= $title ?></strong> </p>
  <div class="container kanban-container">
    <div class="row">
      <div class="col-sm-3 todo-kanban dropper">
        <p class="text-kanban"><i class="fa fa-info-circle"></i> TODO</p>
        <hr>
        <?php foreach ($Tasks1 as $Taskcomplete1): ?>
          <div class="panel panel-default">
            <div id='<?= $Taskcomplete1->id?>' <?=$cm = $Taskcomplete1->isTaskAssigned()?'draggable':'draggable' ?> class="panel-body kanban-panel-todo <?=$cm?>"><?= Html::encode("{$Taskcomplete1->title}") ?><br>
              <small <?=$style = $Taskcomplete1->isOverdue()?'red':"grey" ?> style="color:<?= $style?>;" >Echéance <?= $Taskcomplete1->end_datetime!=""? Html::encode("{$Taskcomplete1->end_datetime}"): ": Indefini" ?></small>
            </div>
          </div>
        <?php endforeach;?>
      </div>
      <div class="col-sm-3 doing-kanban dropper">
        <p class="text-kanban"><i class="fa fa-edit"></i> DOING</p>
        <hr>
        <?php foreach ($Tasks2 as $Taskcomplete2): ?>
          <div class="panel panel-default ">
            <div id='<?= $Taskcomplete2->id?>' <?=$cm = $Taskcomplete2->isTaskAssigned()?'draggable':'draggable' ?> class="panel-body kanban-panel-doing <?=$cm?>"><?= Html::encode("{$Taskcomplete2->title}") ?><br>
              <small <?=$style = $Taskcomplete2->isOverdue()?'red':"grey" ?> style="color:<?= $style?>;" >Echéance <?= $Taskcomplete2->end_datetime!=""? Html::encode("{$Taskcomplete2->end_datetime}"): ": Indefini" ?></small>
            </div>
          </div>
        <?php endforeach;?>
      </div>
      <div class="col-sm-3 done-kanban dropper" >
        <p class="text-kanban">'<i class="fa fa-check-square"></i> DONE</p>
        <hr>
        <?php foreach ($Tasks3 as $Taskcomplete3): ?>
          <div class="panel panel-default " >
            <div id='<?= $Taskcomplete3->id?>' <?=$cm = $Taskcomplete3->isTaskAssigned()?'draggable':'draggable' ?> class="panel-body kanban-panel-done <?=$cm?>" ><?= Html::encode("{$Taskcomplete3->title}") ?><br>
              <small <?=$style = $Taskcomplete3->isOverdue()?'red':"grey" ?> style="color:<?= $style?>;" >Echéance <?= $Taskcomplete3->end_datetime!=""? Html::encode("{$Taskcomplete3->end_datetime}"): ": Indefini" ?></small>
            </div>
          </div>
        <?php endforeach;?>
      </div>
    </div>
  </div>
</div>
<div class="modal-footer">
  <?= ModalButton::cancel(Yii::t('TasksModule.base', 'Quitter')) ?>
</div>
<?php ModalDialog::end(); ?>