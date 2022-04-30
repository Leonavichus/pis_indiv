<?php

namespace app\models;

use yii\db\ActiveRecord;

class Req5Form extends ActiveRecord
{
    public $work;
    public $product;

    public function rules()
    {
        return [
            [['work', 'product'], 'required']
        ];
    }
}
