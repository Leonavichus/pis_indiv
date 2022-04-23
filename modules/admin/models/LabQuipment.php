<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "lab_quipment".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 *
 * @property LabInfo[] $labInfos
 */
class LabQuipment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lab_quipment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 40],
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
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[LabInfos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabInfos()
    {
        return $this->hasMany(LabInfo::className(), ['id_quipment' => 'id']);
    }
}
