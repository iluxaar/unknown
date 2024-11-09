<?php

use yii\db\Migration;

/**
 * Class m241029_190924_create_tbl_material
 */
class m241029_190924_create_tbl_material extends Migration
{
	private const TBL = 'material';
	
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->createTable(self::TBL, [
		    'id' => $this->primaryKey(),
		    'name' => $this->string(255)->notNull()->unique()->comment('Наименование'),
		    'purchase_price' => $this->integer()->notNull()->comment('Цена закупки'),
		    'selling_price' => $this->integer()->comment('Цена продажи'),
		    'created_at' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment('Время добавления'),
	    ]);
	    
	    $this->createIndex('material_name_index', self::TBL, 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    $this->dropTable(self::TBL);
    }
}
