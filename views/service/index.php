<?php

use app\models\Service;
use app\widgets\DropdownActionColumn;
use yii\helpers\Html;
use app\widgets\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\search\ServiceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Процедуры');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index">
	<?php Pjax::begin(); ?>
        <?= $this->render('_search', [
            'model' => $searchModel,
        ]) ?>
        <?= Html::a(
            Yii::t('app', 'Добавить'),
            ['create'],
            ['class' => 'float-right btn btn-success modal-ajax-link']
        ) ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'attribute' => 'name',
                ],
                'price:decimal',
                [
                    'class' => DropdownActionColumn::class,
                    'items' => static function (Service $model) {
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
