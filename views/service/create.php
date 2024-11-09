<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Service $model */

$this->title = Yii::t('app', 'Добавить услугу');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Услуги'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-create">
    <h1>
        Добавить услугу
    </h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
