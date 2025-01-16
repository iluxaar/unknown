<?php

namespace app\widgets;

use Yii;
use yii\grid\DataColumn;

class AmountColumn extends DataColumn
{
	/**
	 * @return string|null
	 */
	protected function renderFooterCellContent(): ?string
	{
		$sum = null;
		$dataProvider = $this->grid->dataProvider;
		
		foreach ($dataProvider->models as $model) {
			$sum += $model->sum;
		}
		
		return Yii::$app->formatter->asDecimal($sum);
	}
}