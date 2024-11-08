<?php

use yii\helpers\Html;
use app\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var app\form\UserForm $model */
/** @varapp\widgets\ActiveForm $form */
?>

<div class="user-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'mobile_phone')->widget(MaskedInput::class, [
		'model' => $model,
		'attribute' => 'mobile_phone',
		'mask' => '+7 (999) 999-99-99',
		'options' => [
			'autocomplete' => 'off'
		],
	]) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
