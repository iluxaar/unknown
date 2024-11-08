<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Visit $model */

$this->title = Yii::t('app', 'Добавить запись');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Записи'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
