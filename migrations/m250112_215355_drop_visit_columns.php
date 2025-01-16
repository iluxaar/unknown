<?php

use yii\db\Migration;

/**
 * Class m250112_215355_drop_isit_columns
 */
class m250112_215355_drop_visit_columns extends Migration
{
	private const TBL = 'visit';
	
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->dropForeignKey('visit_user_fk', self::TBL);
		$this->dropColumn(self::TBL, 'user_id');
	    
	    $this->dropForeignKey('visit_service_fk', self::TBL);
	    $this->dropColumn(self::TBL, 'service_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250112_215355_drop_isit_columns cannot be reverted.\n";

        return false;
    }

}
