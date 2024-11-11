<?php

use app\models\FinanceType;
use yii\helpers\Html;
use app\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\FinanceType $model */
/** @var app\widgets\ActiveForm $form */
?>

<div class="finance-type-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'type')->dropDownList(FinanceType::typesMap()) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
