<?php

use app\models\Service;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use app\widgets\GridView;

/** @var yii\web\View $this */
/** @var app\search\ServiceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Услуги');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index">
    <p class="text-right">
        <?= Html::a(Yii::t('app', 'Добавить'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
	        [
		        'attribute' => 'name',
		        'format'=>'raw',
		        'value' => static function ($model) {
			        return Html::a($model->name, ['view', 'id' => $model->id], ['data-pjax' => 0]);
		        },
	        ],
            'price:decimal',
	        [
		        'class' => ActionColumn::class,
		        'template' => '{update}',
		        'urlCreator' => static function ($action, Service $model) {
			        return Url::toRoute([$action, 'id' => $model->id]);
		        }
	        ],
	        [
		        'class' => ActionColumn::class,
		        'template' => '{delete}',
		        'urlCreator' => static function ($action, Service $model) {
			        return Url::toRoute([$action, 'id' => $model->id]);
		        }
	        ],
        ],
    ]) ?>
</div>
