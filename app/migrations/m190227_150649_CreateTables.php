<?php

use yii\db\Migration;

/**
 * Class m190227_150649_CreateTables
 */
class m190227_150649_CreateTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activity',[
            'id'=>$this->primaryKey(),
            'title'=>$this->string(150)->notNull(),
            'description'=>$this->text(),
            'dateAct' => $this->string()->notNull(),
            'timeStart'=>$this->string()->notNull(),
            'timeEnd'=>$this->string(),
            'use_notification'=>$this->boolean()->notNull()->defaultValue(0),
            'is_blocked'=>$this->boolean()->notNull()->defaultValue(0),
            'is_repeated'=>$this->boolean()->notNull()->defaultValue(0),
            'date_created'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        $this->createTable('users',[
            'id'=>$this->primaryKey(),
            'email'=>$this->string(150)->notNull(),
            'password_hash'=>$this->string(300)->notNull(),
            'token'=>$this->string(150),
            'fio'=>$this->string(150),
            'date_create'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
        $this->dropTable('activity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190225_161520_CreateTables cannot be reverted.\n";

        return false;
    }
    */
}
