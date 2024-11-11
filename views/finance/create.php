<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Finance $model */

$this->title = Yii::t('app', 'Добавить операцию');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Финансы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="finance-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
