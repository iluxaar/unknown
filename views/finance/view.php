<?php

use yii\helpers\Html;
use app\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Finance $model */

$this->title = 'Просмотр операции';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Финансы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="finance-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'type.name',
	        'material.name',
            'user.name',
	        'type.typeName',
            'sum:decimal',
            'created_at:datetime',
            'comment:ntext',
        ],
    ]) ?>
</div>
