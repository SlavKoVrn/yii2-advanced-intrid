<?php
use yii\widgets\ListView;
?>
<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'options' => [
        'data-pjax' => true,
    ],
    'itemView' => function ($model, $key, $index, $widget) {
        return $this->render('_item',['model' => $model]);
    },
    'layout' => "<div class='col-xs-12'>{pager}</div>{items}<div class='col-xs-12'>{pager}</div>",
]) ?>

