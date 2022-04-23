<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "work_prod".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 *
 * @property ProdWork[] $prodWorks
 */
class WorkProd extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'work_prod';
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
     * Gets query for [[ProdWorks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdWorks()
    {
        return $this->hasMany(ProdWork::className(), ['id_work' => 'id']);
    }
}
