<?php

use yii\db\Migration;

class m190218_130055_create_poll_questions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%poll_questions}}', [
            'id' => $this->primaryKey(),
            'question' => $this->text()->notNull(),
            'active' => $this->boolean()->defaultValue(1)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%poll_questions}}');
    }
}
