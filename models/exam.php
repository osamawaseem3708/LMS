<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 *
 * @property int $exam_id
 * @property int $cid
 * @property date $sdate
 * @property date $edate
 * @property date $end_time
 * @property date $start_time
 * @property int $tid
 * @property string $estatus
 * @property string $title
 * @property int $semester
 * @property int $timelimit
 * @property int $total_question

 */
class exam extends ActiveRecord
{

    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['sdate','edate','tid','estatus', 'title', 'semester','cid','total_question','timelimit'], 'required']


        ];
    }

}
