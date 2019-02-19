<?php

use yii\db\Migration;

class m190218_130065_create_poll_answers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%poll_answers}}', [
            'id' => $this->primaryKey(),
            'polls_id' => $this->integer()->notNull(),
            'poll_questions_id' => $this->integer()->notNull(),
            'rating' => $this->smallInteger()->notNull(),
        ]);

        $this->createIndex('{{%idx-poll_answers-polls_id}}', '{{%poll_answers}}', 'polls_id');

        $this->addForeignKey('{{%fk-poll_answers-polls_id}}', '{{%poll_answers}}', 'polls_id', '{{%polls}}', 'id', 'CASCADE');
        $this->addForeignKey('{{%fk-poll_answers-poll_questions_id}}', '{{%poll_answers}}', 'poll_questions_id', '{{%poll_questions}}', 'id', 'CASCADE', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%poll_answers}}');
    }
}
