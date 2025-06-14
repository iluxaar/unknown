<?php

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = Yii::t('app', 'Изменить', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Косметологи'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Изменить');
?>
<div class="user-update">
    <h1>
        Изменить
    </h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
