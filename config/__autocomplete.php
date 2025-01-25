<?php

/**
 * Class Yii
 */
class Yii extends \yii\BaseYii {
    /**
     * @var \yii\web\Application|\yii\console\Application|__Application
     */
    public static $app;
}

/**
 * @property yii\rbac\DbManager $authManager 
 * @property \yii\web\User|__WebUser $user
 * 
 */
class __Application {
	public yii\queue\Queue $queue;
}

/**
 * @property app\models\User $identity
 */
class __WebUser {
}
