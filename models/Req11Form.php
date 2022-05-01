<?php

namespace app\models;

use yii\db\ActiveRecord;

class Req11Form extends ActiveRecord
{
    public $category;
    public $laboratory;
    public $sdate;
    public $edate;

    public function rules()
    {
        return [
            [['category', 'laboratory', 'sdate', 'edate'], 'required']
        ];
    }
}
