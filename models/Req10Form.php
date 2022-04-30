<?php

namespace app\models;

use yii\db\ActiveRecord;

class Req10Form extends ActiveRecord
{
    public $product;

    public function rules()
    {
        return [
            [['product'], 'required']
        ];
    }
}
