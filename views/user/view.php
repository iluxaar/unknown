<?php

use app\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Мастера'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">
    <h1>
        Просмотр мастера
    </h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'email',
            'mobile_phone',
        ],
    ]) ?>
</div>
