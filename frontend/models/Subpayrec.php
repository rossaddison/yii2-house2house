<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "works_subpayrec".
 *
 * @property int $id
 * @property int $user_id
 * @property int $year
 * @property int $jan
 * @property int $feb
 * @property int $mar
 * @property int $apr
 * @property int $may
 * @property int $jun
 * @property int $jul
 * @property int $aug
 * @property int $sep
 * @property int $oct
 * @property int $nov
 * @property int $dec
 */
class Subpayrec extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'works_subpayrec';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'year'], 'required'],
            [['user_id', 'year', 'jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'year' => 'Year',
            'jan' => 'Jan',
            'feb' => 'Feb',
            'mar' => 'Mar',
            'apr' => 'Apr',
            'may' => 'May',
            'jun' => 'Jun',
            'jul' => 'Jul',
            'aug' => 'Aug',
            'sep' => 'Sep',
            'oct' => 'Oct',
            'nov' => 'Nov',
            'dec' => 'Dec',
        ];
    }
}
