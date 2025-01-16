<?php

use yii\db\Migration;

/**
 * Class m250114_234537_create_tbl_payment
 */
class m250114_234537_create_tbl_payment extends Migration
{
	private const TBL = 'payment';
	
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->createTable(self::TBL, [
			'id' => $this->primaryKey(),
			'visit_id' => $this->integer()->notNull()->comment('Визит'),
			'payment_method_id' => $this->integer()->notNull()->comment('Способ оплаты'),
			'sum' => $this->integer()->notNull()->comment('Сумма'),
			'created_at' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment('Создан'),
		]);
	    
	    $this->addForeignKey('payment_visit_fk', self::TBL, 'visit_id', 'visit', 'id', 'CASCADE');
	    $this->addForeignKey('payment_method_fk', self::TBL, 'payment_method_id', 'payment_method', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('payment_method_fk', self::TBL);
	    $this->dropForeignKey('payment_visit_fk', self::TBL);
		
		$this->dropTable(self::TBL);
    }
}
