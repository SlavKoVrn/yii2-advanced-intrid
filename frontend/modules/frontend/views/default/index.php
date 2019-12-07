<?php
use yii\widgets\Pjax;
$js =<<<JS
    $(function(){
        $('#search').unbind('submit');
        $('#search').on('pjax:success', function (e, xhr, settings){
            $.pjax.reload({'container':'#list','timeout':false,'async':false});
            window.slider_loading.hide();
            window.slider_button.show();
            window.slider_ids.forEach(function(item, i, arr) {
                item();
            });
          }
        );
    });
JS;
$this->registerJS($js,$this::POS_READY);
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
