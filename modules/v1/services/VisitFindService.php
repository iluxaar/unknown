<?php

namespace app\modules\v1\services;

use app\models\Visit;
use app\modules\v1\entities\visit\VisitEntity;
use app\query\VisitQuery;
use yii\base\InvalidConfigException;
use yii\helpers\Url;

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
	 * @param $start
	 * @param $end
	 * @return array|Visit[]
	 * @throws InvalidConfigException
	 */
	public function get($start, $end): array
	{
		$models = $this->getBaseQuery()
			->where(['>=', 'visit_datetime', $start])
			->andWhere(['<=', 'visit_datetime', $end])
			->all();
		
		foreach ($models as $visit) {
			$entity = $this->getEntity($visit);
			$this->visits[] = [
				'id' => $entity->getId(),
				'title' => $entity->getTitle(),
				'start' => $entity->getStart(),
				'color' => $entity->getColor(),
				'url' => Url::toRoute(['/visit/index', 'clientId' => $entity->getClientId()]),
			];
		}
		
		return $this->visits;
	}
	
	/**
	 * @param Visit $visit
	 * @return VisitEntity
	 * @throws InvalidConfigException
	 */
	protected function getEntity(Visit $visit): VisitEntity
	{
		return new VisitEntity(
			$visit->id,
			$visit->client_id,
			$visit->client->name,
			\Yii::$app->formatter->asDatetime($visit->visit_datetime, 'yyyy-MM-dd') .
			'T'. \Yii::$app->formatter->asDatetime($visit->visit_datetime, 'HH:mm:ss'),
			$visit->getStatusColor(),
		);
	}
	
}