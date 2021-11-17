<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 *
 * @property int $ccid
 * @property string $name
 * @property string $ccstatus

 */
class coursecategory extends ActiveRecord
{

//    public function rules()
//    {
//        return [
//            // name, email, subject and body are required
//            [['ccid','name','status'], 'required']
//            // email has to be a valid email address
//
//        ];
//    }

}
