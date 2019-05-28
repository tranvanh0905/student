<?php

use yii\db\Migration;

/**
 * Handles adding user_id to table `{{%course}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m190528_032528_add_user_id_column_to_course_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%course}}', 'user_id', $this->integer()->notNull());

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-course-user_id}}',
            '{{%course}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-course-user_id}}',
            '{{%course}}',
            'user_id',
            '{{%user}}',
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
            '{{%fk-course-user_id}}',
            '{{%course}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-course-user_id}}',
            '{{%course}}'
        );

        $this->dropColumn('{{%course}}', 'user_id');
    }
}
