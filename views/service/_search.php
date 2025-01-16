<?php

use kartik\icons\Icon;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\search\ClientSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="inline-search">
    <?php $form = ActiveForm::begin([
	    'layout' => ActiveForm::LAYOUT_INLINE,
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'price') ?>
    <div class="form-group">
	    <?= $model->dirtyAttributes ? Html::a(Icon::show('times'), Url::canonical(), ['class' => 'btn btn-secondary
	    search-reset-button']) : null ?>
        <?= Html::submitButton(Icon::show('search'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
