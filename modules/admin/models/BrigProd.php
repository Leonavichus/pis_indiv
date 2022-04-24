<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "brig_prod".
 *
 * @property int $id
 * @property int $id_product
 * @property int $id_workers
 *
 * @property Product $product
 * @property Workers $workers
 */
class BrigProd extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brig_prod';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_product', 'id_workers'], 'required'],
            [['id_product', 'id_workers'], 'integer'],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['id_product' => 'id']],
            [['id_workers'], 'exist', 'skipOnError' => true, 'targetClass' => Workers::className(), 'targetAttribute' => ['id_workers' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_product' => 'Id Product',
            'id_workers' => 'Id Workers',
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
     * Gets query for [[Workers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkers()
    {
        return $this->hasOne(Workers::className(), ['id' => 'id_workers']);
    }
}
