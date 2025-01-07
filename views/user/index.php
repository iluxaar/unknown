<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use app\widgets\GridView;

/** @var yii\web\View $this */
/** @var app\search\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Косметологи');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <p class="text-right">
        <?= Html::a(Yii::t('app', 'Добавить'), ['create'], ['class' => 'btn btn-success modal-ajax-link']) ?>
    </p>
    <?= GridView::widget([
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
	        'email',
            'mobile_phone',
	        [
		        'class' => ActionColumn::class,
		        'template' => '{update}',
		        'urlCreator' => static function ($action, User $model) {
			        return Url::toRoute([$action, 'id' => $model->id]);
		        },
		        'buttonOptions' => ['class' => 'modal-ajax-link'],
	        ],
	        [
		        'class' => ActionColumn::class,
		        'template' => '{delete}',
		        'urlCreator' => static function ($action, User $model) {
			        return Url::toRoute([$action, 'id' => $model->id]);
		        }
	        ],
        ],
    ]) ?>
</div>
