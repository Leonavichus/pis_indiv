<?php

namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;

class Req1Form extends Model
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
