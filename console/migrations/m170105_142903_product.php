<?php

use yii\db\Migration;

class m170105_142903_product extends Migration
{
   public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'id_category' => $this->integer('11')->notNull(),
            'id_group' => $this->integer('11')->notNull(),
            'id_department' => $this->integer('11')->notNull(),
            'skin' => $this->string(255)->comment('кожа'),
            'flavor' => $this->string(255)->comment('запах'),
            'amount' => $this->string(255)->comment('количество'),
            'weight' => $this->string(255)->comment('вес'),
            'volume' => $this->string(255)->comment('объем'),
            'rgb' => $this->string(255)->comment('цвет'),
            'consist' => $this->text()->comment('состав'),
            'packaging' => $this->string(255)->comment('упаковка'),
            'applications' => $this->text()->comment('способ приминения'),
            'with_use' => $this->text()->comment('c этим средством используют'),
            'necessary' => $this->text()->comment('это средство необходимо для людей, у которых'),
            'useful' => $this->text()->comment('это полезно знать'),
            'title' => $this->string(255)->notNull()->comment('название'),
            'brand' => $this->string(255)->notNull()->comment('бренд'),
            'variant_title' => $this->string(255)->notNull()->comment('вариант'),
            'vendor_code' => $this->integer(11)->notNull()->comment('артикул'),
            'description' => $this->text()->notNull()->comment('описание'),
            'short_description' => $this->string(255)->comment('короткое описание'),
            'tag_search' => $this->string(255)->comment('теги для поиска'),
            'created_at' => $this->integer('11')->notNull(),
            'updated_at' => $this->integer('11')->notNull(),
            'display' => $this->integer('1')->notNull()->comment('отображение в каталоге'),
            'grouping' => $this->integer('11')->notNull()->comment('группировка вариаций'),
        ], $tableOptions);
        
        $this->addForeignKey('product_ibfk_category','{{%product}}' , 'id_category', '{{%category}}', 'id');
        $this->addForeignKey('product_ibfk_group','{{%product}}' , 'id_group', '{{%group}}', 'id');
        $this->addForeignKey('product_ibfk_department','{{%product}}' , 'id_department', '{{%department}}', 'id');

    }

    public function down()
    {
        $this->dropForeignKey('product_ibfk_category', '{{%product}}');
        $this->dropForeignKey('product_ibfk_group', '{{%product}}');
        $this->dropForeignKey('product_ibfk_department', '{{%product}}');

        
        $this->dropTable('{{%product}}');
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
