<?php

use yii\helpers\Html;
use app\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Client */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Клиенты'), 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Карточка клиента';
\yii\web\YiiAsset::register($this);
?>
<div class="client-view">
    <h1>
        Просмотр клиента
    </h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'mobile_phone',
            'birthday',
            'visitsCount',
	        'created_at:datetime',
            'comment:ntext',
        ],
    ]) ?>
</div>
