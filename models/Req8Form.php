<?php

namespace app\models;

use yii\db\ActiveRecord;

class Req8Form extends ActiveRecord
{
    public $sector;
    public $workshop;
    public $company;

    public function rules()
    {
        return [
            [['sector', 'workshop', 'company'], 'required']
        ];
    }
}
