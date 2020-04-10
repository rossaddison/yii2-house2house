<?php
Namespace console\migrations\auth;

use yii\db\Schema;
use yii\db\Migration;

class m200407_132530_Mass extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable('{{%auth_assignment}}',[
            'item_name'=> $this->string(64)->notNull(),
            'user_id'=> $this->string(64)->notNull(),
            'created_at'=> $this->integer(11)->null()->defaultValue(null),
        ], $tableOptions);


        $this->createTable('{{%auth_item}}',[
            'name'=> $this->string(64)->notNull(),
            'type'=> $this->smallInteger(6)->notNull(),
            'description'=> $this->text()->null()->defaultValue(null),
            'rule_name'=> $this->string(64)->null()->defaultValue(null),
            'data'=> $this->binary()->null()->defaultValue(null),
            'created_at'=> $this->integer(11)->null()->defaultValue(null),
            'updated_at'=> $this->integer(11)->null()->defaultValue(null),
        ], $tableOptions);

        $this->createIndex('rule_name','{{%auth_item}}',['rule_name'],false);
        $this->createIndex('idx-auth_item-type','{{%auth_item}}',['type'],false);
        $this->addPrimaryKey('pk_on_auth_item','{{%auth_item}}',['name']);

        $this->createTable('{{%auth_item_child}}',[
            'parent'=> $this->string(64)->notNull(),
            'child'=> $this->string(64)->notNull(),
        ], $tableOptions);

        $this->createIndex('child','{{%auth_item_child}}',['child'],false);
        $this->addPrimaryKey('pk_on_auth_item_child','{{%auth_item_child}}',['parent','child']);
    }

    public function safeDown()
    {
            $this->dropTable('{{%auth_assignment}}');
            $this->dropPrimaryKey('pk_on_auth_item','{{%auth_item}}');
            $this->dropTable('{{%auth_item}}');
            $this->dropPrimaryKey('pk_on_auth_item_child','{{%auth_item_child}}');
            $this->dropTable('{{%auth_item_child}}');
    }
}
