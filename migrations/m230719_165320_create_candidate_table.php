<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%candidate}}`.
 */
class m230719_165320_create_candidate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%candidate}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'created_by' => $this->string(255)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_by' => $this->string(255)->notNull(),
            'updated_at' => $this->dateTime()->notNull()
        ]);
        // creates index for column `user_id`
        $this->createIndex(
            'idx-candidate-user_id',
            'candidate',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-candidate-user_id',
            'candidate',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%candidate}}');
    }
}
