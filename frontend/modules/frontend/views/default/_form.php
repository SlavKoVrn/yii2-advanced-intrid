<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin([
    'options' => [
        'data-pjax' => true
    ],
]); ?>

<?= $form->field($searchModel, 'category')->dropDownList($categories) ?>

<?= $form->field($searchModel, 'sku') ?>

<?= $form->field($searchModel, 'name') ?>

<?= $form->field($searchModel, 'price') ?>

<?= $form->field($searchModel, 'quantity') ?>

<?= $form->field($searchModel, 'length') ?>

<?= $form->field($searchModel, 'width') ?>

<?= $form->field($searchModel, 'height') ?>

<div class="form-group">
    <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

