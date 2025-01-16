<?php

use app\models\Visit;
use yii\helpers\Html;
use app\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Visit $model */
/** @var app\widgets\ActiveForm $form */
?>

<div class="visit-form">
    <?php $form = ActiveForm::begin(); ?>
	<?= $form->field($model, 'status')->select2(Visit::statusList(), ['placeholder' => false], ['allowClear' =>
		false, 'minimumResultsForSearch' => -1]) ?>
    <?= $form->field($model, 'visit_datetime')->dateTimePicker() ?>
    <?= $form->field($model, 'complaint')->textarea(['rows' => 5]) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
