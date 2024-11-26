<?php

namespace app\widgets;

use app\models\Finance;
use Yii;
use yii\grid\DataColumn;

class AmountColumn extends DataColumn
{
	/**
	 * @return string|null
	 */
	protected function renderFooterCellContent(): ?string
	{
		$sum = 0;
		$dataProvider = $this->grid->dataProvider;
		
		/** @var Finance $model */
		foreach ($dataProvider->models as $model) {
			if ($model->isIncome()) {
				$sum += $model->sum;
			} elseif ($model->isExpense()) {
				$sum -= $model->sum;
			}
		}
		
		return Yii::$app->formatter->asDecimal($sum);
	}
}