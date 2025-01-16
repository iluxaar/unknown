<?php

use app\models\PaymentMethod;
use app\widgets\DropdownActionColumn;
use yii\helpers\Html;
use app\widgets\GridView;

/** @var yii\web\View $this */
/** @var app\search\PaymentMethodSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Способы оплаты');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-index">
    <p class="text-right">
	    <?= Html::a(Yii::t('app', 'Добавить'), ['create'], ['class' => 'btn btn-success modal-ajax-link']) ?>
    </p>
    <?= GridView::widget([
        'id' => 'modal-ajax-grid',
        'dataProvider' => $dataProvider,
        'columns' => [
	        [
		        'attribute' => 'name',
	        ],
	        [
		        'class' => DropdownActionColumn::class,
		        'items' => static function (PaymentMethod $model) {
			        return [
				        [
					        'label' => 'Редактировать',
					        'url' => ['update', 'id' => $model->id],
					        'linkOptions' => [
						        'class' => 'modal-ajax-link',
					        ],
				        ],
				        [
					        'label' => 'Удалить',
					        'url' => ['delete', 'id' => $model->id],
					        'linkOptions' => [
						        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
						        'data-method' => 'post',
					        ]
				        ],
			        ];
		        },
	        ],
        ],
    ]) ?>
</div>
