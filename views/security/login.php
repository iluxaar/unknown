<?php

use yii\helpers\Html;
use app\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\form\LoginForm $model */

$this->title = 'Авторизация';
?>
<div class="form-mini security-login">
    <h3>
        Вход в систему
    </h3>
	<?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_VERTICAL,
    ]); ?>
	
	<?= $form->field($model, 'email') ?>
	
	<?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
		<?= Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
    </div>
    <div class="text-left">
		<?= Html::a('Регистрация', ['/security/registration']) ?>
    </div>
	
	<?php ActiveForm::end(); ?>
</div>
