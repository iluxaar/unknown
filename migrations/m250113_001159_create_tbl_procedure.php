<?php

use yii\db\Migration;

/**
 * Class m250113_001159_create_tbl_procedure
 */
class m250113_001159_create_tbl_procedure extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->createTable('visit_procedure', [
			'id' => $this->primaryKey(),
			'visit_id' => $this->integer()->notNull()->comment('ID визита'),
			'service_id' => $this->integer()->notNull()->comment('ID процедуры'),
			'anatomical_zone' => $this->string()->comment('Анатомическая зона'),
			'material' => $this->text()->comment('Материалы'),
			'sum' => $this->integer()->notNull()->comment('Сумма'),
		]);
	    
	    $this->addForeignKey('visit_procedure_visit_fk', 'visit_procedure', 'visit_id', 'visit', 'id', 'CASCADE');
	    $this->addForeignKey('visit_procedure_service_fk', 'visit_procedure', 'service_id', 'service', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250113_001159_create_tbl_procedure cannot be reverted.\n";

        return false;
    }

}
