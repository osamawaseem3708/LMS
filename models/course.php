<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 *
 * @property int $cid
 * @property string $cname
 * @property string $category
 * @property string $description
 * @property string $create_date
 * @property int $uid
 * @property string $batch
 * @property string $status
 * @property string $credit_hours
 * @property string $offer_semester

 */
class course extends ActiveRecord
{

    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['cname','category','description','create_date','uid','batch', 'status', 'credit_hours','offer_semester'], 'required']
            // email has to be a valid email address

        ];
    }

}
