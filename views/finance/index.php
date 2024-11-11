<?php

use app\models\Finance;
use app\models\FinanceType;
use app\models\Material;
use app\models\User;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use app\widgets\GridView;

/** @var yii\web\View $this */
/** @var app\search\FinanceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Финансы');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="finance-index">
    <p class="text-right">
        <?= Html::a(Yii::t('app', 'Добавить'), ['create'], ['class' => 'btn btn-success modal-ajax-link']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
	        [
		        'attribute' => 'type_id',
                'format' => 'raw',
		        'filter' => FinanceType::list(),
		        'value' => static function (Finance $model) {
			        return Html::a($model->type->name, ['view', 'id' => $model->id], ['class' => 'modal-ajax-link', 'data-pjax' => 0]);
		        },
	        ],
	        [
		        'attribute' => 'material_id',
                'value' => 'material.name',
		        'filter' => Material::list(),
	        ],
	        [
		        'attribute' => 'user_id',
		        'value' => 'user.name',
		        'filter' => User::list(),
	        ],
	        [
		        'attribute' => 'financeType',
		        'value' => 'type.typeName',
		        'filter' => FinanceType::typesMap(),
	        ],
	        [
		        'attribute' => 'sum',
		        'format' => 'decimal',
                'filter' => false,
		        'options' => [
			        'class' => 'grid-column-sum',
		        ],
	        ],
	        [
		        'attribute' => 'created_at',
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
		        'class' => ActionColumn::class,
		        'template' => '{update}',
		        'urlCreator' => static function ($action, Finance $model) {
			        return Url::toRoute([$action, 'id' => $model->id]);
		        },
		        'buttonOptions' => ['class' => 'modal-ajax-link'],
	        ],
	        [
		        'class' => ActionColumn::class,
		        'template' => '{delete}',
		        'urlCreator' => static function ($action, Finance $model) {
			        return Url::toRoute([$action, 'id' => $model->id]);
		        }
	        ],
        ],
    ]); ?>
</div>
