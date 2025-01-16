<?php

use yii\bootstrap4\Html;

/** @var yii\web\View $this */
/** @var app\models\Visit $model */

$this->title = Yii::t('app', 'Изменить визит');
?>

<div class="visit-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
