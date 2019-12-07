<?php

namespace frontend\modules\frontend\controllers;

use common\models\Category;
use common\models\Product;
use common\models\ProductSearch;

use Yii;
use yii\web\Controller;
use yii\helpers\ArrayHelper;

/**
 * Default controller for the `frontend` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->pagination->route = '';  // https://stackoverflow.com/questions/31703533/yii2-listview-pagination-wrong-url
        $dataProvider->pagination->pageSize = 1;

        $productPriceMaxMin = Product::getProductPriceMinMax();
        $price_min = $productPriceMaxMin['min'];
        $price_max = $productPriceMaxMin['max'];
        $productQuantityMaxMin = Product::getProductQuantityMinMax();
        $quantity_min = $productQuantityMaxMin['min'];
        $quantity_max = $productQuantityMaxMin['max'];

        $categories = ArrayHelper::merge([0=>''],ArrayHelper::map(Category::find()->all(), 'id', 'name'));

        if (Yii::$app->request->isAjax){
            $pjax = Yii::$app->request->get('_pjax');
            if ($pjax == '#list'){
                return $this->renderAjax('_listview', [
                    'dataProvider' => $dataProvider,
                ]);
            } elseif ($pjax == '#search') {
                return $this->renderPartial('_search', [
                    'searchModel' => $searchModel,
                    'categories' => $categories,
                    'price_min' => $price_min,
                    'price_max' => $price_max,
                    'quantity_min' => $quantity_min,
                    'quantity_max' => $quantity_max,
                ]);
            }
        }

        return  $this->render('index',compact(
            'dataProvider',
            'searchModel',
            'categories',
            'price_min',
            'price_max',
            'quantity_min',
            'quantity_max'
        ));

    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionView($id)
    {
        $model = Product::findOne($id);

        return  $this->render('_item',compact(
            'model'
        ));

    }

}
