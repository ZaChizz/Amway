<?php

use yii\db\Migration;

class m161215_160533_user_correction extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'image', $this->string(255)->comment('фото'));

    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'image');

    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
