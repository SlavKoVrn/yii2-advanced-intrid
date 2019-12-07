<?php
use yii\helpers\Url;

$href = Url::to(['default/view', 'id'=>$model->id]);

$style =<<<STYLE
    .boxShadow {
        width: 80%;
        max-width: 550px;
        margin: 2em auto;
        padding: 1em;
        box-shadow: 0 0 10px 5px rgba(221, 221, 221, 1);
    }
STYLE;
$this->registerCss($style);
?>

<a href="<?=$href ?>">
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 boxShadow" >
        Наименование:<?= $model->name ?><br/>
        Категория:<?= $model->categoryLink->name ?><br/>
        Цена:<?= $model->price ?><br/>
        Количество:<?= $model->quantity ?><br/>
        Длина:<?= $model->length ?><br/>
        Ширина:<?= $model->width ?><br/>
        Высота:<?= $model->height ?><br/>
    </div>
</a>
