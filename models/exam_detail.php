<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 *
 * @property int $eid
 * @property string $question
 * @property string $correct_answer
 * @property string $option1
 * @property string $option2
 * @property string $option3

 */
class exam_detail extends ActiveRecord
{

    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['eid','question','correct_answer','option1','option2','option3'], 'required']


        ];
    }

}
