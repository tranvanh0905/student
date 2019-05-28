<?php

use yii\db\Migration;

/**
 * Class m190528_032445_add_user_id_to_course_table
 */
class m190528_032445_add_user_id_to_course_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190528_032445_add_user_id_to_course_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190528_032445_add_user_id_to_course_table cannot be reverted.\n";

        return false;
    }
    */
}
