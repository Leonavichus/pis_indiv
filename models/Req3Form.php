<?php

namespace app\models;

use yii\db\ActiveRecord;

class Req3Form extends ActiveRecord
{
    public $post;
    public $workshop;
    public $company;

    public function rules()
    {
        return [
            [['post', 'workshop', 'company'], 'required']
        ];
    }
}
