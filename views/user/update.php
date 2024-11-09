<?php

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = Yii::t('app', 'Изменить мастера', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Мастера'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Изменить');
?>
<div class="user-update">
    <h1>
        Изменить мастера
    </h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
