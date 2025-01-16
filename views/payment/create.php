<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\VisitProcedure $model */

$this->title = Yii::t('app', 'Добавить платеж');
?>

<div class="visit-procedure-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
