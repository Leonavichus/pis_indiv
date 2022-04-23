<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "sector".
 *
 * @property int $id
 * @property int $name
 * @property int $id_workshop
 *
 * @property Log[] $logs
 * @property ProdWork[] $prodWorks
 * @property Workers[] $workers
 * @property Workshop $workshop
 */
class Sector extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sector';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id_workshop'], 'required'],
            [['name', 'id_workshop'], 'integer'],
            [['id_workshop'], 'exist', 'skipOnError' => true, 'targetClass' => Workshop::className(), 'targetAttribute' => ['id_workshop' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'id_workshop' => 'Id Workshop',
        ];
    }

    /**
     * Gets query for [[Logs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLogs()
    {
        return $this->hasMany(Log::className(), ['id_sector' => 'id']);
    }

    /**
     * Gets query for [[ProdWorks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdWorks()
    {
        return $this->hasMany(ProdWork::className(), ['id_sector' => 'id']);
    }

    /**
     * Gets query for [[Workers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkers()
    {
        return $this->hasMany(Workers::className(), ['id_sector' => 'id']);
    }

    /**
     * Gets query for [[Workshop]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkshop()
    {
        return $this->hasOne(Workshop::className(), ['id' => 'id_workshop']);
    }
}
