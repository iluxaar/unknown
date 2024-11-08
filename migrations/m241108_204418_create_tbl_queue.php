<?php

use yii\db\Migration;

/**
 * Class m241108_204418_create_tbl_queue
 */
class m241108_204418_create_tbl_queue extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    Yii::$app->db->createCommand('
		    CREATE TABLE `queue` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`channel` varchar(255) NOT NULL,
			`job` blob NOT NULL,
			`pushed_at` int(11) NOT NULL,
			`ttr` int(11) NOT NULL,
			`delay` int(11) NOT NULL DEFAULT 0,
			`priority` int(11) unsigned NOT NULL DEFAULT 1024,
			`reserved_at` int(11) DEFAULT NULL,
			`attempt` int(11) DEFAULT NULL,
			`done_at` int(11) DEFAULT NULL,
			PRIMARY KEY (`id`),
			KEY `channel` (`channel`),
			KEY `reserved_at` (`reserved_at`),
			KEY `priority` (`priority`)
			) ENGINE=InnoDB
			')->queryScalar();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('queue');
    }

}
