<?php

/** @var yii\web\View $this */
/** @var app\models\Service $model */

$this->title = Yii::t('app', 'Изменить услугу', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Услуги'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Изменить');
?>
<div class="service-update">
    <h1>
        Изменить услугу
    </h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
