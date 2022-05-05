<?php

namespace app\models;

use yii\db\ActiveRecord;

class Req2Form extends ActiveRecord
{
    public $category;
    public $workshop;
    public $company;
    public $sdate;
    public $edate;

    public function rules()
    {
        return [
            [['category', 'workshop', 'company', 'sdate', 'edate'], 'required']
        ];
    }
}
