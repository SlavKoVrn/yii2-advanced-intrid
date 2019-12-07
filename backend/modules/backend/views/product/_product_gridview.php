<?php
use yii\helpers\Html;
use yii\grid\GridView;
?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        [
            'attribute'=>'category',
            'content' => function($model){
                return $model->categoryLink->name;
            },
            'filter'=>Html::activeDropDownList(
                $searchModel,
                'category',
                $categories,
                []
            ),
        ],
        'sku',
        'name',
        'price',
        'quantity',
        'length',
        'width',
        'height',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
