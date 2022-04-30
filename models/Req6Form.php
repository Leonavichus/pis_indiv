<?php

namespace app\models;

use yii\db\ActiveRecord;

class Req6Form extends ActiveRecord
{
    public $sector;
    public $workshop;

    public function rules()
    {
        return [
            [['sector', 'workshop'], 'required']
        ];
    }
}
