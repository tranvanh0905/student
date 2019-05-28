<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%course}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%class}}`
 */
class m190528_031616_create_course_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course}}', [
            'id' => $this->primaryKey(),
            'class_id' => $this->integer()->notNull(),
            'title' => $this->string()->unique(),
            'created_at' => $this->date()->notNull(),
            'updated_at' => $this->date()->notNull(),

        ]);

        // creates index for column `class_id`
        $this->createIndex(
            '{{%idx-course-class_id}}',
            '{{%course}}',
            'class_id'
        );

        // add foreign key for table `{{%class}}`
        $this->addForeignKey(
            '{{%fk-course-class_id}}',
            '{{%course}}',
            'class_id',
            '{{%class}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%class}}`
        $this->dropForeignKey(
            '{{%fk-course-class_id}}',
            '{{%course}}'
        );

        // drops index for column `class_id`
        $this->dropIndex(
            '{{%idx-course-class_id}}',
            '{{%course}}'
        );

        $this->dropTable('{{%course}}');
    }
}
