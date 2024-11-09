<?php

use yii\helpers\Html;
use app\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Service $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Услуги'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="service-view">
    <h1>
        Просмотр услуги
    </h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'price:decimal',
        ],
    ]) ?>
    <p class="text-right">
		<?= Html::a(Yii::t('app', 'Изменить'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		<?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => Yii::t('app', 'Точно удалить?'),
				'method' => 'post',
			],
		]) ?>
    </p>
</div>
