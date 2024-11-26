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
            [
                'attribute' => 'user_id',
                'value' => $model->user->name,
            ],
	        [
		        'attribute' => 'client_id',
		        'value' => $model->client->name,
	        ],
	        [
		        'attribute' => 'service_id',
		        'value' => $model->service->name,
	        ],
	        [
		        'attribute' => 'visit_datetime',
		        'format' => 'datetime',
	        ],
            [
                'attribute' => 'status',
                'value' => Html::tag('span', $model->getStatusName(), ['class' => "badge visit-status-{$model->status}"]),
                'format' => 'html',
            ],
	        'created_at:datetime',
            'comment:ntext',
        ],
    ]) ?>
</div>
