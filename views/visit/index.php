<?php

use app\models\User;
use app\models\Visit;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use app\widgets\GridView;

/** @var yii\web\View $this */
/** @var app\search\VisitSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Записи');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-index">
    <p class="text-right">
        <?= Html::a(Yii::t('app', 'Добавить'), ['create'], ['class' => 'btn btn-success modal-ajax-link']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
	        [
		        'attribute' => 'id',
		        'format'=>'raw',
		        'value' => static function ($model) {
			        return Html::a(
                        $model->id,
                        ['view', 'id' => $model->id],
                        ['class' => 'modal-ajax-link', 'data-pjax' => 0]
                    );
		        },
                'options' => [
                    'class' => 'grid-column-id',
                ],
	        ],
	        [
		        'attribute' => 'client.name',
		        'format'=>'raw',
		        'value' => static function (\app\models\Visit $model) {
                    if ($model->client) {
	                    return Html::a(
                            $model->client->name,
                            ['/client/view', 'id' => $model->client->id], ['class' => 'modal-ajax-link', 'data-pjax' => 0]
                        );
                    }
		        },
	        ],
            'service.name',
	        [
		        'attribute' => 'user_id',
		        'format'=>'raw',
		        'value' => 'user.name',
		        'filter' => User::list(),
	        ],
	        [
		        'attribute' => 'visit_datetime',
		        'format' => 'datetime',
                'filterType' => GridView::FILTER_DATE,
		        'filterWidgetOptions' => [
			        'type' => DatePicker::TYPE_INPUT,
			        'pluginOptions' => [
				        'todayHighlight' => true,
                        'clearBtn' => true,
				        'autoclose' => true,
                    ]
                ],
		        'options' => [
			        'class' => 'grid-column-datetime',
		        ],
	        ],
	        [
		        'attribute' => 'status',
		        'format'=>'raw',
		        'value' => static function (Visit $model) {
			        return Html::tag('span', $model->getStatusName(), ['class' => "badge visit-status-{$model->status}"]);
		        },
                'filter' => Visit::statusList(),
		        'options' => [
			        'class' => 'grid-column-visit-status',
		        ],
	        ],
	        [
		        'class' => ActionColumn::class,
		        'template' => '{update}',
		        'urlCreator' => static function ($action, Visit $model) {
			        return Url::toRoute([$action, 'id' => $model->id]);
		        },
		        'buttonOptions' => ['class' => 'modal-ajax-link'],
	        ],
            [
                'class' => ActionColumn::class,
	            'template' => '{delete}',
                'urlCreator' => static function ($action, Visit $model) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]) ?>
</div>
