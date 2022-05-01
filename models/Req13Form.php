<?php

namespace app\models;

use yii\db\ActiveRecord;

class Req13Form extends ActiveRecord
{
    public $product;
    public $category;
    public $laboratory;
    public $sdate;
    public $edate;

    public function rules()
    {
        return [
            [['product', 'category', 'laboratory', 'sdate', 'edate'], 'required']
        ];
    }
}
