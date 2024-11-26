<?php

use app\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Material $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Материалы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="material-view">
    <h1>
        Просмотр материала
    </h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'purchase_price:decimal',
            'selling_price:decimal',
        ],
    ]) ?>
</div>
