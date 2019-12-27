?php

namespace frontend\modules\backup\models;

use Yii;

class BackupModel extends \yii\base\Model
{
    public $manual_backup_run = false;
    public $ignore_time_limit_warning = false;
    
    //dbcode used for individual non-cron backups
    public $dbCode = '';
    
    public static function getDb()
    {
       return \frontend\components\Utilities::userdb();
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'manual_backup_run',
                    'ignore_time_limit_warning',
                 ],
                'filter',
                'filter' => 'boolval',
            ],
            [
                [
                    'manual_backup_run',
                    'ignore_time_limit_warning',
                ],
                'boolean',
            ],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'updateComposer' => '>>>>>> Update Composer before migrations are done.',
            'ignore_time_limit_warning' => '>>>>> Ignore the time limit warning.',
            'manual_backup_run' => '>>>>> Complete a Manual Backup Run.',
            'dbCode'=> 'Database Code for individual backup run.',
        ];
    }
}
