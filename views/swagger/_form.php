<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Apis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="swagger-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'name')->textInput(['maxlength' => 255, 'placeholder' => 'Graph API']) ?>

	<?= $form->field($model, 'description')->textInput(['maxlength' => 255, 'placeholder' => 'The best API in the world!']) ?>

	<?= $form->field($model, 'version')->textInput(['maxlength' => 255, 'placeholder' => '1.0']) ?>

	<?= $form->field($model, 'privacy')->dropDownList([ 'public' => 'Public', 'protected' => 'Protected', 'private' => 'Private', ]) ?>


	<?= $form->field($model, 'swagger_url')->textInput(['maxlength' => 255, 'placeholder' => '']) ?>

	<?= $form->field($model, 'swagger_version')->dropDownList([ '1.1' => '1.1', '1.2' => '1.2', '2.0' => '2.0', ]) ?>

	<div class="form-group">
		<?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
