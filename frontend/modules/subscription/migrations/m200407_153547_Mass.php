<?php
Namespace frontend\modules\subscription\migrations;

use yii\db\Schema;
use yii\db\Migration;

class m200407_153547_Mass extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable('{{%paypal_agreement}}',[
            'id'=> $this->primaryKey(11),
            'user_id'=> $this->integer(11)->notNull(),
            'agreement_id'=> $this->string(255)->null()->defaultValue(null),
            'quantity'=> $this->integer(11)->notNull()->defaultValue(1),
            'end_at'=> $this->timestamp()->null()->defaultValue(null),
            'created_at'=> $this->timestamp()->null()->defaultValue(null),
            'executed_at'=> $this->timestamp()->null()->defaultValue(null),
            'updated_at'=> $this->timestamp()->null()->defaultValue(null),
            'suspended_at'=> $this->timestamp()->null()->defaultValue(null),
            'terminated_at'=> $this->timestamp()->null()->defaultValue(null),
            'reactivated_at'=> $this->timestamp()->null()->defaultValue(null),
        ], $tableOptions);

        $this->createTable('{{%session_detail}}',[
            'session_detail_id'=> $this->primaryKey(11),
            'session_id'=> $this->char(40)->notNull(),
            'redirect_flow_id'=> $this->string(50)->notNull(),
            'db'=> $this->string(50)->notNull(),
            'product_id'=> $this->integer(11)->notNull(),
            'user_id'=> $this->integer(11)->notNull(),
            'customer_approved'=> $this->tinyInteger(1)->notNull()->defaultValue(0),
            'administrator_acknowledged'=> $this->tinyInteger(1)->notNull()->defaultValue(0),
        ], $tableOptions);

        $this->createIndex('fk_session_detail_to_session_idx','{{%session_detail}}',['session_id'],false);
        $this->createIndex('redirect_flow_id','{{%session_detail}}',['redirect_flow_id'],false);
    }

    public function safeDown()
    {
            $this->dropTable('{{%paypal_agreement}}');
            $this->dropTable('{{%session_detail}}');
    }
}
