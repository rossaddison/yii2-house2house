<?php

namespace frontend\modules\backup\components;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\ProcessBuilder;
use Symfony\Component\Process\Exception\ProcessTimedOutException;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Yii;
use yii\base\Component;

class BackupHelper extends Component
{
    
    public $backupCronTimeout = 36000;
    public $backupCronIdleTimeout = 600;
    
    public static function unlimitTime()
    {
        return set_time_limit(0);
    }
       
    public function applyAppBackupCron()
    {
        $builder = $this->backupCreateCronCommandBuilder();
        $process = $builder->getProcess();
        $process
            ->setTimeout($this->backupCronTimeout)
            ->setIdleTimeout($this->backupCronIdleTimeout);
        return $process;
    }
    
    private function backupCreateCronCommandBuilder()
    {
        $backup = new ProcessBuilder();
        $backup
            ->setWorkingDirectory(Yii::getAlias('@webroot'))
            ->setPrefix($this->getPhpExecutable())
            ->setArguments([
                realpath(Yii::getAlias('@webroot').'/yii'),
                'backup/create/cron',
                "Cron-Job - Daily Backup",
            ]);
        
        return $backup;
    }
    
    private function getPhpExecutable()
    {
        //return PHP_BINDIR . '/php';
        return 'd:\wamp32\bin\php\php7.3.5\php';
        //return 'd:\wamp31\www\multi2\web\yii ';
    }
    
}
