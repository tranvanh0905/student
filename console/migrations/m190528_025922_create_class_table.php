<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%class}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m190528_025922_create_class_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%class}}', [
            'id' => $this->primaryKey()->unique(),
            'class_no' => $this->string()->unique()->notNull(),
            'student_id' => $this->integer()->unique(),
            'status' => $this->smallInteger()->notNull(),
            'created_at' => $this->date()->notNull(),
            'updated_at' => $this->date()->notNull(),
        ]);

        // creates index for column `student_id`
        $this->createIndex(
            '{{%idx-class-student_id}}',
            '{{%class}}',
            'student_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-class-student_id}}',
            '{{%class}}',
            'student_id',
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
            '{{%fk-class-student_id}}',
            '{{%class}}'
        );

        // drops index for column `student_id`
        $this->dropIndex(
            '{{%idx-class-student_id}}',
            '{{%class}}'
        );

        $this->dropTable('{{%class}}');
    }
}
