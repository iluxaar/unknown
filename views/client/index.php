<?php

use app\models\Client;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use app\widgets\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\search\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Клиенты');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">
    <p class="text-right">
        <?= Html::a(Yii::t('app', 'Добавить'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget(config: [
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
            'mobile_phone',
            [
                'attribute' => 'birthday',
                'filter' => false,
            ],
	        'created_at:datetime',
            [
                'class' => ActionColumn::class,
                'template' => '{update}',
                'urlCreator' => static function ($action, Client $model) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
            [
                'class' => ActionColumn::class,
                'template' => '{delete}',
                'urlCreator' => static function ($action, Client $model) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]) ?>
</div>
