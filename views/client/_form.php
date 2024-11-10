<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use app\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Client */
/* @var $form app\widgets\ActiveForm */
?>

<div class="client-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'autocomplete' => 'off']) ?>
    <?= $form->field($model, 'mobile_phone')->widget(MaskedInput::class, [
        'model' => $model,
        'attribute' => 'mobile_phone',
        'mask' => '+7 (999) 999-99-99',
        'options' => [
            'autocomplete' => 'off'
        ],
    ]) ?>
    <?= $form->field($model, 'birthday')->datePicker() ?>
    <?= $form->field($model, 'comment')->textarea(['rows' => 3]) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
