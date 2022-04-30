<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "lab_info".
 *
 * @property int $id
 * @property int $id_product
 * @property int $id_quipment
 * @property int $id_workers
 * @property int $id_lab
 * @property string|null $date_start
 * @property string|null $date_end
 *
 * @property Laboratory $lab
 * @property Product $product
 * @property LabQuipment $quipment
 * @property Workers $workers
 */
class LabInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lab_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_product', 'id_quipment', 'id_workers', 'id_lab'], 'required'],
            [['id_product', 'id_quipment', 'id_workers', 'id_lab'], 'integer'],
            [['date_start', 'date_end'], 'safe'],
            [['id_quipment'], 'exist', 'skipOnError' => true, 'targetClass' => LabQuipment::className(), 'targetAttribute' => ['id_quipment' => 'id']],
            [['id_lab'], 'exist', 'skipOnError' => true, 'targetClass' => Laboratory::className(), 'targetAttribute' => ['id_lab' => 'id']],
            [['id_workers'], 'exist', 'skipOnError' => true, 'targetClass' => Workers::className(), 'targetAttribute' => ['id_workers' => 'id']],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['id_product' => 'id']],
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
            'id_quipment' => 'Id Quipment',
            'id_workers' => 'Id Workers',
            'id_lab' => 'Id Lab',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
        ];
    }

    /**
     * Gets query for [[Lab]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLab()
    {
        return $this->hasOne(Laboratory::className(), ['id' => 'id_lab']);
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
     * Gets query for [[Quipment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuipment()
    {
        return $this->hasOne(LabQuipment::className(), ['id' => 'id_quipment']);
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
