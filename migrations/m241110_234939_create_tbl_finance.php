<?php

use yii\db\Migration;

/**
 * Class m241110_234939_create_tbl_store
 */
class m241110_234939_create_tbl_finance extends Migration
{
	private const TBL = 'finance';
	
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->createTable(self::TBL, [
			'id' => $this->primaryKey(),
			'type' => $this->tinyInteger()->notNull()->defaultValue(0)->comment('Статья'),
			'user_id' => $this->integer()->notNull()->comment('Мастер'),
			'material_id' => $this->integer()->notNull()->comment('Материал'),
			'visit_id' => $this->integer()->comment('Запись (учет расхода на процедуре)'),
			'sum' => $this->integer()->notNull()->defaultValue(0)->comment('Сумма'),
			'created_at' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment('Время создания'),
			'comment' => $this->text()->comment('Комментарий'),
		]);
	    
	    $this->addForeignKey('finance_user_fk', self::TBL, 'user_id', 'user', 'id');
	    $this->addForeignKey('finance_material_fk', self::TBL, 'material_id', 'material', 'id');
	    $this->addForeignKey('finance_visit_fk', self::TBL, 'visit_id', 'visit', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    $this->dropForeignKey('finance_user_fk', self::TBL);
	    $this->dropForeignKey('finance_material_fk', self::TBL);
	    $this->dropForeignKey('finance_visit_fk', self::TBL);
		
        $this->dropTable(self::TBL);
    }

}
