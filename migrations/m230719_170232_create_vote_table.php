<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vote}}`.
 */
class m230719_170232_create_vote_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vote}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'candidate_id' => $this->integer()->notNull(),
            'created_by' => $this->string(255)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_by' => $this->string(255)->notNull(),
            'updated_at' => $this->dateTime()->notNull()
        ]);
        // creates index for column `user_id`
        $this->createIndex(
            'idx-vote-user_id',
            'vote',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-vote-user_id',
            'vote',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            'idx-vote-candidate_id',
            'vote',
            'candidate_id'
        );

        // add foreign key for table `candidate`
        $this->addForeignKey(
            'fk-vote-candidate_id',
            'vote',
            'candidate_id',
            'candidate',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%vote}}');
    }
}
