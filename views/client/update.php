<?php

/* @var $this yii\web\View */
/* @var $model app\models\Client */

$this->title = Yii::t('app', 'Изменить клиента', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Клиенты'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Карточка клиента', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Изменить');
?>
<div class="client-update">
    <h1>
        Изменить клиента
    </h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
