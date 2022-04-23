<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "laboratory".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 *
 * @property LabInfo[] $labInfos
 */
class Laboratory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laboratory';
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
        return $this->hasMany(LabInfo::className(), ['id_lab' => 'id']);
    }
}
