<?php

use app\models\Visit;
use app\widgets\DropdownActionColumn;
use app\widgets\GridView;
use yii\bootstrap4\Html;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\search\VisitSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\Client $client */

$this->title = $client->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Клиенты'), 'url' => ['client/index']];
$this->params['breadcrumbs'][] = ['label' => $client->name];
?>
<div class="client-view">
	<?php Pjax::begin([
		'submitEvent' => 'change submit',
	]); ?>
	<?= $this->render('@app/views/visit/_search', [
		'model' => $searchModel,
	]) ?>
	<?= Html::a(
		Yii::t('app', 'Новый визит'),
		['visit/create', 'clientId' => $client->id],
		['class' => 'float-right btn btn-success modal-ajax-link', 'data-pjax' => 0]
	) ?>
	<?= GridView::widget(config: [
		'dataProvider' => $dataProvider,
		'columns' => [
			[
				'attribute' => 'status',
				'format'=>'raw',
				'value' => static function (Visit $model) {
					return Html::tag('span', $model->getStatusName(), ['class' => "badge visit-status-{$model->status}"]);
				},
				'options' => [
					'class' => 'grid-column-visit-status',
				],
			],
			[
				'attribute' => 'visit_datetime',
				'format' => 'datetime',
				'options' => [
					'class' => 'grid-column-datetime',
				],
			],
			'complaint:ntext',
			[
				'attribute' => 'visitProcedures',
				'format' => 'raw',
				'value' => static function (Visit $model) {
					return Yii::$app->view->render('@app/views/visit-procedure/index', [
						'visitProcedures' => $model->visitProcedures,
					]);
				},
			],
			[
				'attribute' => 'payments',
				'format' => 'raw',
				'value' => static function (Visit $model) {
					$html = Yii::$app->view->render('@app/views/payment/index', [
						'payments' => $model->payments,
					]);
     
					if ($model->payments && $debt = $model->debt) {
						$html .= Html::tag('div', "Задолженность: <b>{$model->debt}</b>", ['class' => 'alert alert-danger']);
					}
                    
                    return $html;
				},
			],
			[
				'class' => DropdownActionColumn::class,
				'items' => static function (Visit $model) {
					return [
						[
							'label' => 'Добавить процедуру',
							'url' =>  ['visit-procedure/create', 'visitId' => $model->id],
							'linkOptions' => [
								'class' => 'modal-ajax-link',
							],
						],
						[
							'label' => 'Добавить платеж',
							'url' =>  ['payment/create', 'visitId' => $model->id],
							'linkOptions' => [
								'class' => 'modal-ajax-link',
							],
						],
						'<div class="dropdown-divider"></div>',
						[
							'label' => 'Редактировать',
							'url' => ['visit/update', 'id' => $model->id],
							'linkOptions' => [
								'class' => 'modal-ajax-link',
							],
						],
						[
							'label' => 'Удалить',
							'url' => ['visit/delete', 'id' => $model->id],
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
	<?php Pjax::end(); ?>
</div>
