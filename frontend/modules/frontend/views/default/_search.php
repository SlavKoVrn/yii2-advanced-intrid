<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use slavkovrn\ionslider\IonSliderWidget;
?>
<div class="product-search">

    <?php $form = ActiveForm::begin([
        'method'=>'get',
        'options' => [
            'data-pjax' => true,
        ]
    ]);
    ?>

    <?= $form->field($searchModel, 'name')->textInput() ?>

    <?= $form->field($searchModel, 'category')->dropDownList($categories) ?>

    <div class="form-group">
        <div class="col-sm-4"><?= $form->field($searchModel, 'width')->textInput() ?></div>
        <div class="col-sm-4"><?= $form->field($searchModel, 'length')->textInput() ?></div>
        <div class="col-sm-4"><?= $form->field($searchModel, 'height')->textInput() ?></div>
    </div>
    <?= $form->field($searchModel, 'price')->widget(IonSliderWidget::class,[
        'min' => $price_min,
        'max' => $price_max,
        'from' => $price_min,
        'to' => $price_max,
        'button' => 'search_button',
    ])->label('Цена') ?>

    <?= $form->field($searchModel, 'quantity')->widget(IonSliderWidget::class,[
        'min' => $quantity_min,
        'max' => $quantity_max,
        'from' => $quantity_min,
        'to' => $quantity_max,
        'button' => 'search_button',
    ])->label('Количество') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', [
            'id' => 'search_button',
            'class' => 'btn btn-primary'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
