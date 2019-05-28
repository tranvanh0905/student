<?php

use yii\db\Migration;

/**
 * Handles adding auth_key to table `{{%user}}`.
 */
class m190528_040530_add_auth_key_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'auth_key', $this->string(32)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'auth_key');
    }
}
