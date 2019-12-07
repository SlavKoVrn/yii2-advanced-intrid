<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(['timeout' => false]); ?>

    <?= $this->render('_category_gridview',[
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]) ?>

    <?php Pjax::end(); ?>
</div>
