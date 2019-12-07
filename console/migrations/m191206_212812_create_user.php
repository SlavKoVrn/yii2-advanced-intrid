<?php

use yii\db\Migration;

/**
 * Class m191206_212812_create_user
 */
class m191206_212812_create_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%user}}',[
		'id' => 1,
		'username' => 'admin',
		'auth_key' => 'Yk2eOE7-gdxUFMZia-uf98UTdxwxFr2a',
		'password_hash' => '$2y$13$rW1v5rV05sePxiGmH.Wr6elMu2BgpkfuKFqmrpJ0mn2fy5AJPWj6S', // 123456
		'password_reset_token' => '',
		'email' => 'pochta@mail.ru',
		'verification_token' => '',
		'created_at' => 1575659170,
		'updated_at' => 1575659170,
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191206_212812_create_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191206_212812_create_user cannot be reverted.\n";

        return false;
    }
    */
}
