<?php

namespace app\modules\v1\services;

use app\models\Visit;
use app\modules\v1\entities\visit\VisitEntity;
use app\query\VisitQuery;
use yii\base\InvalidConfigException;

class VisitFindService
{
	private array $visits = [];
	
	/**
	 * @return VisitQuery
	 */
	private function getBaseQuery(): VisitQuery
	{
		return Visit::find();
	}
	
	/**
	 * @param $userId
	 * @param $start
	 * @param $end
	 * @return array|Visit[]
	 * @throws InvalidConfigException
	 */
	public function getByUserId($userId, $start, $end): array
	{
		$models = $this->getBaseQuery()
			->where(['user_id' => $userId])
			->andWhere(['>=', 'visit_datetime', $start])
			->andWhere(['<=', 'visit_datetime', $end])
			->all();
		
		foreach ($models as $visit) {
			$entity = $this->getEntity($visit);
			$this->visits[] = [
				'id' => $entity->getId(),
				'title' => $entity->getTitle(),
				'start' => $entity->getStart(),
				'color' => $entity->getColor(),
				'url' => 'visit/' . $entity->getId(),
			];
		}
		
		return $this->visits;
	}
	
	/**
	 * @param $visit
	 * @return VisitEntity
	 * @throws InvalidConfigException
	 */
	protected function getEntity($visit): VisitEntity
	{
		return new VisitEntity(
			$visit->id,
			$visit->service->name,
			\Yii::$app->formatter->asDatetime($visit->visit_datetime, 'yyyy-MM-dd') .
			'T'. \Yii::$app->formatter->asDatetime($visit->visit_datetime, 'HH:mm:ss'),
			$visit->getStatusColor()
		);
	}
	
}