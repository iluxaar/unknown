<?php

use app\models\Payment;
use app\widgets\AmountColumn;
use app\widgets\DropdownActionColumn;
use app\widgets\GridView;
use yii\data\ArrayDataProvider;

/** @var yii\web\View $this */
/** @var Payment[] $payments */
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
		'allModels' => $payments,
		'pagination' => false,
	]),
	'columns' => [
		[
			'attribute' => 'paymentMethod.name',
			'format' => 'raw',
			'footer' => 'Итого:'
		],
		'created_at:datetime',
		[
			'class' => AmountColumn::class,
			'attribute' => 'sum',
			'format' => 'decimal',
			'contentOptions' => ['class' => 'grid-column-sum'],
			'footerOptions' => ['class' => 'grid-column-sum'],
		],
		[
			'class' => DropdownActionColumn::class,
			'items' => static function (Payment $model) {
				return [
					[
						'label' => 'Редактировать',
						'url' => ['payment/update', 'id' => $model->id],
						'linkOptions' => [
							'class' => 'modal-ajax-link',
						],
					],
					[
						'label' => 'Удалить',
						'url' => ['payment/delete', 'id' => $model->id],
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
