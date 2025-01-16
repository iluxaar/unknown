<?php

use app\models\Visit;
use kartik\icons\Icon;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\search\VisitSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="inline-search">
    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false,
        'method' => 'get',
        'options' => [
            'data-pjax' => 1,
            'class' => 'form-inline',
        ],
    ]); ?>
    <?= $form->field($model, 'status')
        ->dropDownList(Visit::statusList(), ['prompt' => 'Статус'])->label(false) ?>
    <div class="form-group">
	    <?= $model->dirtyAttributes ? Html::a(Icon::show('times'), Url::canonical(), ['class' => 'btn btn-secondary search-reset-button']) : null ?>
        <?= Html::submitButton(Icon::show('search'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
