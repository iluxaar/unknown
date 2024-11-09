<?php

namespace app\traits;

use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

trait FindModelTrait
{
	/**
	 * @throws NotFoundHttpException
	 * @throws InvalidConfigException
	 */
	protected function findModel($modelName, $id): ActiveRecord
	{
		$modelClass = Yii::createObject($modelName);
		
		if (($model = $modelClass::findOne(['id' => $id])) !== null) {
			return $model;
		}
		
		throw new NotFoundHttpException(Yii::t('app', 'Запись не найдена'));
	}
}