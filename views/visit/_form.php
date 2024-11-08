<?php

use app\models\Client;
use app\models\Service;
use app\models\User;
use app\models\Visit;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
use yii\helpers\Html;
use app\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Visit $model */
/** @var app\widgets\ActiveForm $form */
?>

<div class="visit-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'user_id')->widget(Select2::class, [
	    'data' => User::list(),
	    'options' => ['placeholder' => ''],
	    'pluginOptions' => [
		    'allowClear' => true
	    ],
    ]) ?>
	<?= $form->field($model, 'client_id')->widget(Select2::class, [
		'data' => Client::list(),
		'options' => ['placeholder' => ''],
		'pluginOptions' => [
			'allowClear' => true
		],
	]) ?>
	<?= $form->field($model, 'service_id')->widget(Select2::class, [
		'data' => Service::list(),
		'options' => ['placeholder' => ''],
		'pluginOptions' => [
			'allowClear' => true
		],
	]) ?>
    <?= $form->field($model, 'visit_datetime')->widget(DateTimePicker::class, [
	    'type' => DateTimePicker::TYPE_INPUT,
	    'pluginOptions' => [
		    'autoclose' => true,
		    'format' => 'dd.mm.yyyy hh:ii'
	    ]
    ]) ?>
	<?= $form->field($model, 'status')->widget(Select2::class, [
		'data' => Visit::statusList(),
        'hideSearch' => true,
		'pluginOptions' => [
			'allowClear' => false
		],
	]) ?>
    <?= $form->field($model, 'comment')->textarea(['rows' => 3]) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
