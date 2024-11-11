<?php

use app\models\FinanceType;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\search\FinanceTypeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Статьи финансов');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="finance-type-index">
    <p class="text-right">
        <?= Html::a(Yii::t('app', 'Добавить'), ['create'], ['class' => 'btn btn-success modal-ajax-link']) ?>
    </p>
    <?= \app\widgets\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
	        [
		        'attribute' => 'name',
		        'format'=>'raw',
		        'value' => static function ($model) {
			        return Html::a($model->name, ['view', 'id' => $model->id], ['class' => 'modal-ajax-link', 'data-pjax' => 0]);
		        },
	        ],
	        [
		        'attribute' => 'type',
		        'value' => 'typeName',
		        'filter' => FinanceType::typesMap(),
	        ],
	        [
		        'class' => ActionColumn::class,
		        'template' => '{update}',
		        'urlCreator' => static function ($action, FinanceType $model) {
			        return Url::toRoute([$action, 'id' => $model->id]);
		        },
		        'buttonOptions' => ['class' => 'modal-ajax-link'],
	        ],
	        [
		        'class' => ActionColumn::class,
		        'template' => '{delete}',
		        'urlCreator' => static function ($action, FinanceType $model) {
			        return Url::toRoute([$action, 'id' => $model->id]);
		        }
	        ],
        ],
    ]) ?>
</div>
