<?php

use app\models\Client;
use app\models\Service;
use app\models\User;
use app\models\Visit;
use yii\helpers\Html;
use app\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Visit $model */
/** @var app\widgets\ActiveForm $form */
?>

<div class="visit-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'user_id')->select2(User::list()) ?>
	<?= $form->field($model, 'client_id')->select2(Client::list()) ?>
	<?= $form->field($model, 'service_id')->select2(Service::list()) ?>
    <?= $form->field($model, 'visit_datetime')->dateTimePicker() ?>
	<?= $form->field($model, 'status')->select2(Visit::statusList()) ?>
    <?= $form->field($model, 'comment')->textarea(['rows' => 3]) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
