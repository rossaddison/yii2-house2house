<?php

namespace frontend\modules\installer\components;

use Yii;
use yii\base\Event;

/**
 * Class ConfigurationSaveEvent represents event on before validating configurable model and after data is populated
 * @package app\modules\config\components
 */
class ConfigurationSaveEvent extends Event
{
    /**
     * @var bool Whether to continue handling saving configuration
     */
    public $isValid = true;

    public $configurable = null;

    public $configurableModel = null;
}