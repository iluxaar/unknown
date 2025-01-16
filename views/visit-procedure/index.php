<?php

use app\models\VisitProcedure;
use app\widgets\AmountColumn;
use app\widgets\DropdownActionColumn;
use app\widgets\GridView;
use yii\data\ArrayDataProvider;

/** @var yii\web\View $this */
/** @var VisitProcedure[] $visitProcedures */
?>

<?= GridView::widget(config: [
	'layout' => "{items}",
	'showOnEmpty' => false,
	'showHeader' => false,
	'showFooter' => true,
	'tableOptions' => [
		'class' => 'table sub-table',
	],
	'dataProvider' => new ArrayDataProvider([
		'allModels' => $visitProcedures,
		'pagination' => false,
	]),
	'columns' => [
		[
			'attribute' => 'service.name',
			'format' => 'raw',
			'contentOptions' => ['class' => 'grid-column-procedure'],
			'footer' => 'Итого:',
			'value' => static function (VisitProcedure $model) {
				return $model->service->name . "<br><em><small class=\"text-muted\">{$model->anatomical_zone}</small></em>";
			},
		],
		'material:ntext',
		[
			'class' => AmountColumn::class,
			'attribute' => 'sum',
			'format' => 'decimal',
			'contentOptions' => ['class' => 'grid-column-sum'],
			'footerOptions' => ['class' => 'grid-column-sum'],
		],
		[
			'class' => DropdownActionColumn::class,
			'items' => static function (VisitProcedure $model) {
				return [
					[
						'label' => 'Редактировать',
						'url' => ['visit-procedure/update', 'id' => $model->id],
						'linkOptions' => [
							'class' => 'modal-ajax-link',
						],
					],
					[
						'label' => 'Удалить',
						'url' => ['visit-procedure/delete', 'id' => $model->id],
						'linkOptions' => [
							'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
							'data-method' => 'post',
						]
					],
				];
			},
		],
	],
]) ?>