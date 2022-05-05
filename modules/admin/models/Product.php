<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $id_category
 *
 * @property BrigProd[] $brigProds
 * @property Category $category
 * @property LabInfo[] $labInfos
 * @property Log[] $logs
 * @property ProdWork[] $prodWorks
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id_category'], 'required'],
            [['description'], 'string'],
            [['id_category'], 'integer'],
            [['name'], 'string', 'max' => 40],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'id']],
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
            'description' => 'Описание',
            'id_category' => 'Категория',
        ];
    }

    /**
     * Gets query for [[BrigProds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrigProds()
    {
        return $this->hasMany(BrigProd::className(), ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'id_category']);
    }

    /**
     * Gets query for [[LabInfos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabInfos()
    {
        return $this->hasMany(LabInfo::className(), ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Logs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLogs()
    {
        return $this->hasMany(Log::className(), ['id_product' => 'id']);
    }

    /**
     * Gets query for [[ProdWorks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdWorks()
    {
        return $this->hasMany(ProdWork::className(), ['id_product' => 'id']);
    }
}
