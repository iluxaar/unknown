<?php

use yii\db\Migration;

/**
 * Class m250114_214355_create_tbl_payment_method
 */
class m250114_214355_create_tbl_payment_method extends Migration
{
	private const TBL = 'payment_method';
	
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->createTable(self::TBL, [
			'id' => $this->primaryKey(),
			'name' => $this->string()->notNull()->comment('Способ оплаты'),
		]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TBL);
    }
}
