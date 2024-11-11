<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FinanceType $model */

$this->title = Yii::t('app', 'Изменить статью');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Статьи финансов'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Изменить');
?>
<div class="finance-type-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
