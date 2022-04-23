<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "prod_work".
 *
 * @property int $id_product
 * @property int $id_work
 * @property int $id_sector
 *
 * @property Product $product
 * @property Sector $sector
 * @property WorkProd $work
 */
class ProdWork extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prod_work';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_product', 'id_work', 'id_sector'], 'required'],
            [['id_product', 'id_work', 'id_sector'], 'integer'],
            [['id_sector'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['id_sector' => 'id']],
            [['id_work'], 'exist', 'skipOnError' => true, 'targetClass' => WorkProd::className(), 'targetAttribute' => ['id_work' => 'id']],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['id_product' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_product' => 'Id Product',
            'id_work' => 'Id Work',
            'id_sector' => 'Id Sector',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'id_product']);
    }

    /**
     * Gets query for [[Sector]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSector()
    {
        return $this->hasOne(Sector::className(), ['id' => 'id_sector']);
    }

    /**
     * Gets query for [[Work]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWork()
    {
        return $this->hasOne(WorkProd::className(), ['id' => 'id_work']);
    }
}
