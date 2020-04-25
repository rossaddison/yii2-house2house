<?php
namespace frontend\modules\installer\components;

use Yii;
use yii\validators\Validator;

class ClassnameValidator extends Validator
{
    /**
     * @inheritdoc
     * @return null|array
     */
    public function validateValue($value)
    {
        if (class_exists($value) === false) {
            return [
                Yii::t('app', 'Unable to find specified class.'),
                []
            ];
        } else {
            return null;
        }
    }
}