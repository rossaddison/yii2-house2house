<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "works_employee".
 *
 * @property integer $id
 * @property string $nationalinsnumber
 * @property string $contact_telno
 * @property string $title
 * @property string $birthdate
 * @property string $maritalstatus
 * @property string $gender
 * @property string $hiredate
 * @property integer $salariedflag
 * @property integer $vacationhours
 * @property integer $sickleavehours
 * @property integer $currentflag
 * @property string $modifieddate
 *
 * @property WorksSalesorderheader[] $worksSalesorderheaders
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public static function getDb()
   {
       return \frontend\components\Utilities::userdb();
   }
    
    
    
    
    public static function tableName()
    {
        return 'works_employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['vacationhours', 'sickleavehours'], 'integer'],
            [['vacationhours'],'default','value'=>0],
            [['nationalinsnumber'], 'string', 'max' => 9],
            [['hiredate','birthdate'],'safe'],
            [['contact_telno'], 'string', 'max' => 11],
            [['title'], 'string', 'max' => 50],
            [['maritalstatus'], 'string', 'max' =>8],
            [['gender'], 'string', 'max' =>6],
            [['sickleavehours'],'default','value'=> 0],
            [['salariedflag'], 'string', 'max' =>30], 
            [['nationalinsnumber'],'unique'],
            [['currentflag'],'string','max' => 11]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nationalinsnumber' => 'National Insurance Number',
            'contact_telno' => 'Contact Telephone Number',
            'title' => 'Title',
            'birthdate' => 'Birth Date',
            'maritalstatus' => 'Marital Status',
            'gender' => 'Gender',
            'hiredate' => 'Hire date',
            'salariedflag' => 'Salaried flag',
            'vacationhours' => 'Vacation hours',
            'sickleavehours' => 'Sickleave hours',
            'currentflag' => 'Current flag',
            'modifieddate' => 'Modified date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorksSalesorderheaders()
    {
        return $this->hasMany(WorksSalesorderheader::className(), ['employee_id' => 'id']);
    }
}
