<?php

use yii\helpers\Html;
use app\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var app\form\LoginForm $model */

$this->title = 'Авторизация';
?>
<div class="form-security security-registration">
    <h3>
        Регистрация
    </h3>
	<?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_VERTICAL,
    ]); ?>
	<?= $form->field($model, 'name') ?>
	<?= $form->field($model, 'email') ?>
	<?= $form->field($model, 'mobile_phone')->widget(MaskedInput::class, [
		'model' => $model,
		'attribute' => 'mobile_phone',
		'mask' => '+7 (999) 999-99-99',
		'options' => [
			'autocomplete' => 'off'
		],
	]) ?>
    <div class="form-group">
		<?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary']) ?>
    </div>
    <div class="text-left">
	    <?= Html::a('Вход в систему', ['/security/login']) ?>
    </div>
	<?php ActiveForm::end(); ?>
</div>
