<?php

use yii\db\Migration;

/**
 * Class m210215_181433_init_tables
 */
class m210215_181433_init_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210215_181433_init_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210215_181433_init_tables cannot be reverted.\n";

        return false;
    }
    */
}
