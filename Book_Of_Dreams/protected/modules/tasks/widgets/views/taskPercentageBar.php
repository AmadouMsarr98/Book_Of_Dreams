<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 *
 */

/* @var $task \humhub\modules\tasks\models\Task */
/* @var $filterResult boolean */
?>
<?php if (/*$task->hasItems()*/ true) : ?>
    <!--    Progress Bar    -->
    <?php
    $percent = round($task->getPercent());
    if ($filterResult)
        $divID = "task_progress_" . $task->id . "_filter";
    else
        $divID = "task_progress_" . $task->id;

    $color = "progress-bar-info";
    ?>
   <p> progression : <?= $percent; ?>%</p>
    <div class="progress" style="width:200px;">
        <div id="<?= $divID; ?>"
             class="progress-bar <?= $color; ?>"
             role="progressbar"
             aria-valuenow="<?= $percent; ?>" aria-valuemin="0" aria-valuemax="100"
             style="width: 0%">
        </div>
    </div>
    
    <script type="text/javascript">
        $('#<?= $divID ?>').css('width', '<?= $percent; ?>%');
    </script>
<?php else : ?>
<?php endif; ?>