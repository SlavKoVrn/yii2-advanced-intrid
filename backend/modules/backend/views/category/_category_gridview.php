<?php
use yii\grid\GridView;
?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [

        'name',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
