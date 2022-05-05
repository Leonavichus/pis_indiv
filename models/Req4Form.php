<?php

namespace app\models;

use yii\db\ActiveRecord;

class Req4Form extends ActiveRecord
{
    public $workshop;
    public $company;

    public function rules()
    {
        return [
            [['workshop', 'company'], 'required']
        ];
    }
}
