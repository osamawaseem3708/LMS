<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 *
 * @property int $uid
 * @property string $fname
 * @property string $lname
 * @property date $DOB
 * @property string $gender
 * @property string $password
 * @property string $email
 * @property string $Role
 * @property string $status
 * @property string $address
 * @property string $country
 * @property string $city
 * @property string $contact
 * @property int $semester
 */
class users extends ActiveRecord
{

    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['fname','lname','gender','contact','password','Role', 'status', 'address', 'country','city','email','DOB'], 'required'],
            // email has to be a valid email address
            ['email', 'email']

        ];
    }

}
