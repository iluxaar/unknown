<?php

use yii\helpers\Html;
use app\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\FinanceType $model */

$this->title = 'Просмотр статьи финансов';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Статьи финансов'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="finance-type-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'typeName',
            'name',
        ],
    ]) ?>
</div>
