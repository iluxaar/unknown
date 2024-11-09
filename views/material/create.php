<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Material $model */

$this->title = Yii::t('app', 'Добавить материал');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Материалы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-create">
    <h1>
        Добавить материал
    </h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
