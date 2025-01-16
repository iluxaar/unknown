<?php

use yii\bootstrap4\Html;

/** @var yii\web\View $this */
/** @var app\models\Visit $model */
/** @var app\models\Client $client */

$this->title = Yii::t('app', 'Новый визит');
?>

<div class="visit-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
