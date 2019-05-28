<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%class_user}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%class}}`
 */
class m190528_043358_create_class_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%class_user}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'class_id' => $this->integer()->notNull(),
            'date_start' => $this->date()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-class_user-user_id}}',
            '{{%class_user}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-class_user-user_id}}',
            '{{%class_user}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `class_id`
        $this->createIndex(
            '{{%idx-class_user-class_id}}',
            '{{%class_user}}',
            'class_id'
        );

        // add foreign key for table `{{%class}}`
        $this->addForeignKey(
            '{{%fk-class_user-class_id}}',
            '{{%class_user}}',
            'class_id',
            '{{%classCourse}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-class_user-user_id}}',
            '{{%class_user}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-class_user-user_id}}',
            '{{%class_user}}'
        );

        // drops foreign key for table `{{%class}}`
        $this->dropForeignKey(
            '{{%fk-class_user-class_id}}',
            '{{%class_user}}'
        );

        // drops index for column `class_id`
        $this->dropIndex(
            '{{%idx-class_user-class_id}}',
            '{{%class_user}}'
        );

        $this->dropTable('{{%class_user}}');
    }
}
