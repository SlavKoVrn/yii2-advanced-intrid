<?php

namespace common\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property int $id
 * @property int $category
 * @property int $sku
 * @property string $name
 * @property int $price
 * @property int $quantity
 * @property int $length
 * @property int $width
 * @property int $height
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category', 'price', 'quantity', 'length', 'width', 'height'], 'integer'],
            [['sku'], 'string', 'max' => 50],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ид',
            'category' => 'Категория',
            'sku' => 'Артикл',
            'name' => 'Название',
            'price' => 'Цена',
            'quantity' => 'Количество',
            'length' => 'Длина',
            'width' => 'Ширина',
            'height' => 'Высота',
        ];
    }

    /**
     * @return \common\models\Category
     */
    public function getCategoryLink()
    {
        return $this->hasOne(Category::class, ['id' => 'category']);
    }

    public static function getProductPriceMinMax()
    {
        $min = (new Query())
            ->select('MIN(price)')
            ->from('{{%product}}')
            ->one();
        $max = (new Query())
            ->select('MAX(price)')
            ->from('{{%product}}')
            ->one();
        return [
            'min' => $min['MIN(price)'],
            'max' => $max['MAX(price)'],
        ];
    }

    public static function getProductQuantityMinMax()
    {
        $min = (new Query())
            ->select('MIN(quantity)')
            ->from('{{%product}}')
            ->one();
        $max = (new Query())
            ->select('MAX(quantity)')
            ->from('{{%product}}')
            ->one();
        return [
            'min' => $min['MIN(quantity)'],
            'max' => $max['MAX(quantity)'],
        ];
    }

}
