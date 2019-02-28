<?php

use yii\db\Migration;

/**
 * Class m190228_093234_Data
 */
class m190228_093234_Data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('users', [
            'email' => 'email@mail.ru',
            'password_hash' => '123',
            'fio' => 'Иванов Иван Иванович'
        ]);
        $this->insert('users', [
            'email' => 'email2@mail.ru',
            'password_hash' => '123',
            'token' => '123123123',
            'fio' => 'Петров Петр Петрович'
        ]);
        $this->insert('users', [
            'email' => 'email3@mail.ru',
            'password_hash' => '123',
            'token' => '123123123',
            'fio' => 'Иванова Лидия Ивановна'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190228_093234_Data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190228_093234_Data cannot be reverted.\n";

        return false;
    }
    */
}
