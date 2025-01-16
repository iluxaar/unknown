<?php

use app\models\Client;
use app\widgets\DropdownActionColumn;
use yii\helpers\Html;
use app\widgets\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\search\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Клиенты');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="client-index">
	<?php Pjax::begin(); ?>
        <?= $this->render('_search', [
            'model' => $searchModel,
        ]) ?>
        <?= Html::a(
            Yii::t('app', 'Новый клиент'),
            ['create'],
            ['class' => 'float-right btn btn-success modal-ajax-link']
        ) ?>
        <?= GridView::widget(config: [
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'attribute' => 'name',
                    'format'=>'raw',
                    'value' => static function (Client $model) {
                        return Html::a($model->name, ['visit/index', 'clientId' => $model->id], ['data-pjax' => 0]);
                    },
                ],
                'mobile_phone',
                [
                    'attribute' => 'birthday',
                    'filter' => false,
                ],
                'created_at:datetime',
                'comment:ntext',
                [
                    'class' => DropdownActionColumn::class,
                    'items' => static function (Client $model) {
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
    <?php Pjax::end(); ?>
</div>
