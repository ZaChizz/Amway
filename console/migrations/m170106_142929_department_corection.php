<?php

use yii\db\Migration;

class m170106_142929_department_corection extends Migration
{
    public function up()
    {
        $this->addColumn('{{%department}}', 'image', $this->string(255)->comment('фото стены'));
        $this->addColumn('{{%department}}', 'backgroundColor', $this->string(255)->comment('титул стены'));
        $this->addColumn('{{%department}}', 'landHeader', $this->string(255)->comment('заголовок стены'));
        $this->addColumn('{{%department}}', 'landTitle', $this->string(255)->comment('титул стены'));
        $this->addColumn('{{%department}}', 'label', $this->string(255)->comment('ярлык'));
        $this->addColumn('{{%department}}', 'labelClass', $this->string(5)->comment('html Class'));
    }

    public function down()
    {
        $this->dropColumn('{{%department}}', 'image');
        $this->dropColumn('{{%department}}', 'backgroundColor');
        $this->dropColumn('{{%department}}', 'landHeader');
        $this->dropColumn('{{%department}}', 'landTitle');
        $this->dropColumn('{{%department}}', 'label');
        $this->dropColumn('{{%department}}', 'labelClass');
             
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
