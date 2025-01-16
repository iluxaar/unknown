<?php

use yii\db\Migration;

/**
 * Class m250112_222257_rename_col_visit_comment
 */
class m250112_222257_rename_col_visit_comment extends Migration
{
	private const TBL = 'visit';
	
	private const NAME = 'comment';
	
	private const NEW_NAME = 'complaint';
	
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->renameColumn(self::TBL, self::NAME, self::NEW_NAME);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn(self::TBL, self::NEW_NAME, self::NAME);
    }
}
