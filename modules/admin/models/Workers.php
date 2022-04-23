<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "workers".
 *
 * @property int $id
 * @property string $fullname
 * @property int $id_post
 * @property int $id_sector
 * @property int $id_brigade
 *
 * @property BrigProd[] $brigProds
 * @property Brigade $brigade
 * @property LabInfo[] $labInfos
 * @property Post $post
 * @property Sector $sector
 */
class Workers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname', 'id_post', 'id_sector', 'id_brigade'], 'required'],
            [['id_post', 'id_sector', 'id_brigade'], 'integer'],
            [['fullname'], 'string', 'max' => 255],
            [['id_brigade'], 'exist', 'skipOnError' => true, 'targetClass' => Brigade::className(), 'targetAttribute' => ['id_brigade' => 'id']],
            [['id_post'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['id_post' => 'id']],
            [['id_sector'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['id_sector' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'Fullname',
            'id_post' => 'Id Post',
            'id_sector' => 'Id Sector',
            'id_brigade' => 'Id Brigade',
        ];
    }

    /**
     * Gets query for [[BrigProds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrigProds()
    {
        return $this->hasMany(BrigProd::className(), ['id_workers' => 'id']);
    }

    /**
     * Gets query for [[Brigade]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrigade()
    {
        return $this->hasOne(Brigade::className(), ['id' => 'id_brigade']);
    }

    /**
     * Gets query for [[LabInfos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabInfos()
    {
        return $this->hasMany(LabInfo::className(), ['id_workers' => 'id']);
    }

    /**
     * Gets query for [[Post]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'id_post']);
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
