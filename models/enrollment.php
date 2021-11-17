<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 *
 * @property int $eid
 * @property int $uid
 * @property int $cid
 * @property int $tid
 * @property int $hrs
 * @property string $status
 * @property date $date_enroll

 */
class enrollment extends ActiveRecord
{

    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['uid','cid','status','date_enroll','tid','hrs'], 'required']

        ];
    }

}
