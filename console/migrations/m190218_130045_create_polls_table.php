<?php

use yii\db\Migration;

class m190218_130045_create_polls_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%polls}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'comment' => $this->text()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ]);

        $this->createIndex('{{%idx-polls-created_at}}', '{{%polls}}', 'created_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%polls}}');
    }
}
