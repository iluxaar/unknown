<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = Yii::t('app', 'Добавить мастера');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Мастера'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">
    <h1>
        Добавить мастера
    </h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
