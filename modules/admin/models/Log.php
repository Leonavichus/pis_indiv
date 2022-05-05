<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "log".
 *
 * @property int $id
 * @property int $id_product
 * @property int $count
 * @property int $id_sector
 * @property string $date_start
 * @property string|null $date_end
 * @property int|null $isReady
 *
 * @property Product $product
 * @property Sector $sector
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_product', 'count', 'id_sector', 'date_start'], 'required'],
            [['id_product', 'count', 'id_sector', 'isReady'], 'integer'],
            [['date_start', 'date_end'], 'safe'],
            [['id_sector'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['id_sector' => 'id']],
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
            'id_product' => 'Изделие',
            'count' => 'Кол-во',
            'id_sector' => 'Участок',
            'date_start' => 'Дата начала',
            'date_end' => 'Дата конца',
            'isReady' => 'Закончено',
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
}
