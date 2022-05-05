<?php

namespace app\models;

use yii\db\ActiveRecord;

class Req14Form extends ActiveRecord
{
    public $category;
    public $workshop;
    public $company;

    public function rules()
    {
        return [
            [['category', 'workshop', 'company'], 'required']
        ];
    }
}
