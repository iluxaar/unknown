<?php

use app\models\PaymentMethod;
use yii\helpers\Html;
use app\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\VisitProcedure $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="visit-procedure-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'payment_method_id')->select2(PaymentMethod::list()) ?>
	<?= $form->field($model, 'sum')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
