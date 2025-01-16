<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PaymentMethod $model */

$this->title = Yii::t('app', 'Новый способ оплаты');
?>

<div class="material-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
