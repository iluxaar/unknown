<?php

use app\models\FinanceType;
use app\models\Material;
use app\models\User;
use yii\helpers\Html;
use app\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Finance $model */
/** @var app\widgets\ActiveForm $form */
?>

<div class="finance-form">
    <?php $form = ActiveForm::begin(); ?>
	<?= $form->field($model, 'user_id')->select2(User::list()) ?>
    <?= $form->field($model, 'type_id')->select2(FinanceType::list()) ?>
    <?= $form->field($model, 'material_id')->select2(Material::list()) ?>
    <?= $form->field($model, 'sum')->textInput() ?>
    <?= $form->field($model, 'comment')->textarea(['rows' => 3]) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
