<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m191206_215632_product_category
 */
class m191206_215632_product_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%category}}', [

            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . '(255) comment "Наименование"',

        ], $tableOptions);

        $this->createTable('{{%product}}', [

            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . '(255) comment "Наименование"',

            'category' => Schema::TYPE_INTEGER . '(11) DEFAULT 0 comment "Категория"',
            'sku' => Schema::TYPE_STRING . '(50) comment "Артикл"',

            'price' => Schema::TYPE_INTEGER . '(11) DEFAULT 0 comment "Цена"',
            'quantity' => Schema::TYPE_INTEGER . '(11) DEFAULT 0 comment "Количество"',

            'length' => Schema::TYPE_INTEGER . '(11) DEFAULT 0 comment "Длина"',
            'width' => Schema::TYPE_INTEGER . '(11) DEFAULT 0 comment "Ширина"',
            'height' => Schema::TYPE_INTEGER . '(11) DEFAULT 0 comment "Высота"',

        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
        $this->dropTable('{{%product}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191206_215632_product_category cannot be reverted.\n";

        return false;
    }
    */
}
