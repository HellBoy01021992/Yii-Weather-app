<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class = "row">
   <div class = "col-lg-5">
      <?php $form = ActiveForm::begin(['id' => 'registration-form']); ?>
      <?= $form->field($model, 'location') ?>
      <?= Html::submitButton('Submit', ['class' => 'btn btn-primary',
            'name' => 'registration-button']) ?>
      </div>
      <?php ActiveForm::end(); ?>
   </div>
</div>