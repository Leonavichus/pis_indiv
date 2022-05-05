<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "workshop".
 *
 * @property int $id
 * @property string $name
 * @property int $id_company
 *
 * @property Company $company
 * @property Sector[] $sectors
 */
class Workshop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workshop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id_company'], 'required'],
            [['id_company'], 'integer'],
            [['name'], 'string', 'max' => 40],
            [['id_company'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['id_company' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'id_company' => 'Компания',
        ];
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'id_company']);
    }

    /**
     * Gets query for [[Sectors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSectors()
    {
        return $this->hasMany(Sector::className(), ['id_workshop' => 'id']);
    }
}
