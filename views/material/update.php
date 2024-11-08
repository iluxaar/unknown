<?php

/** @var yii\web\View $this */
/** @var app\models\Material $model */

$this->title = Yii::t('app', 'Изменить материал', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Материалы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Изменить');
?>
<div class="material-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
