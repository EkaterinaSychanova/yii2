<?php

namespace app\modules\test;

use yii\base\Application;
use yii\base\BootstrapInterface;

/**
 * test module definition class
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\test\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

    }

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        if($app instanceof \yii\console\Application){
            $this->controllerNamespace='app\modules\test\commands';
        }
    }
}
