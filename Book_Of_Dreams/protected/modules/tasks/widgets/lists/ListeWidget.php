<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 *
 */

namespace humhub\modules\tasks\widgets\lists;

use humhub\modules\content\components\ContentContainerActiveRecord;
use humhub\modules\tasks\helpers\TaskListUrl;
use humhub\modules\tasks\models\Task;
use humhub\modules\tasks\models\lists\TaskListInterface;
use humhub\widgets\JsWidget;
use Yii;

class ListeWidget extends JsWidget
{
    /**
     * @inheritdocs
     */
    public $init = true;

    /**
     * @inheritdocs
     */
    public $jsWidget = 'task.list.TaskList';

    /**
     * @var TaskListInterface
     */
    public $tasks;

        
   
    
    

    public $canBeSorted = true;

    public $canManage = false;

    public $canCreate = false;

    /**
     * @inheritdocs
     */
    public function run()
    {
        return $this->render('listeWidget', [
            'tasks' => $tasks
        ]);
    }
}