<?php

use app\models\Service;
use yii\helpers\Html;
use app\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\VisitProcedure $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="visit-procedure-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'service_id')->select2(Service::list()) ?>
	<?= $form->field($model, 'sum')->textInput() ?>
    <?= $form->field($model, 'anatomical_zone')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'material')->textarea(['rows' => 5]) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
