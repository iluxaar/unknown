<?php

use yii\helpers\Html;
use app\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Visit $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Записи'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="visit-view">
    <h1>
        Просмотр записи
    </h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user.name',
            'client.name',
            'service.name',
            'visit_datetime:datetime',
            [
                'attribute' => 'status',
                'value' => Html::tag('span', $model->getStatusName(), ['class' => "badge visit-status-{$model->status}"]),
                'format' => 'html',
            ],
	        'created_at:datetime',
            'comment:ntext',
        ],
    ]) ?>
    <p class="text-right">
		<?= Html::a(Yii::t('app', 'Изменить'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary modal-ajax-link']) ?>
		<?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => Yii::t('app', 'Точно удалить?'),
				'method' => 'post',
			],
		]) ?>
    </p>
</div>
