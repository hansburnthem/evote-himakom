<?php

use yii\db\Migration;

/**
 * Class m230801_003245_add_column_vote_date_candidate
 */
class m230801_003245_add_column_vote_date_candidate extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('candidate', 'vote_date', $this->dateTime()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('candidate', 'vote_date');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230801_003245_add_column_vote_date_candidate cannot be reverted.\n";

        return false;
    }
    */
}
