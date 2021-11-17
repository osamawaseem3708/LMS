<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 *
 * @property int $aid
 * @property int $sid
 * @property int $qid
 * @property int $eid
 * @property string $answer

 */
class attemptquiz extends ActiveRecord
{

    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['sid','qid','eid','answer'], 'required']


        ];
    }

}
