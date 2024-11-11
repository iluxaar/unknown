<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FinanceType $model */

$this->title = Yii::t('app', 'Добавить статью');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Статьи финансов'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="finance-type-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
