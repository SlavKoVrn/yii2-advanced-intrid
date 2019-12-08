<?php
use yii\widgets\Pjax;
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <?php Pjax::begin([
                'id'=>'search',
                'timeout' => false,
            ]); ?>

            <?= $this->render('_search',compact(
                'searchModel',
                'categories',
                'price_min',
                'price_max',
                'quantity_min',
                'quantity_max'
            )) ?>

            <?php Pjax::end(); ?>

            <?php Pjax::begin([
                'id'=>'list',
                'timeout' => false,
            ]); ?>

            <?= $this->render('_listview',compact(
                'dataProvider'
            )) ?>

            <?php Pjax::end(); ?>

        </div>
    </div>
</div>
