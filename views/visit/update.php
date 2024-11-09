<?php

/** @var yii\web\View $this */
/** @var app\models\Visit $model */

$this->title = Yii::t('app', 'Изменить', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Записи'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Изменить');
?>
<div class="visit-update">
    <h1>
        Изменить запись
    </h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
