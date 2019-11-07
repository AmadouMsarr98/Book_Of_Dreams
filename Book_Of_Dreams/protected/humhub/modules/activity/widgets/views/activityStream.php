<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2017 HumHub GmbH & Co. KG
 * @license https://www.humhub.org/licences
 */

use humhub\modules\activity\assets\ActivityAsset;
use yii\helpers\Html;

/* @var $this humhub\components\View */
/* @var $streamUrl string */
/* @var $options array */

ActivityAsset::register($this);
?>
<div class="panel panel-default panel-activities" id="panel-activities">
    <?= \humhub\widgets\PanelMenu::widget(['id' => 'panel-activities']); ?>
    <div class="panel-heading">
        <?= Yii::t('ActivityModule.widgets_views_activityStream', '<strong>Latest</strong> activities'); ?>
    </div>
    <?= Html::beginTag('div', $options) ?>
    <ul id="activityContents" class="media-list activities" data-stream-content></ul>
    <?= Html::endTag('div') ?>
</div>