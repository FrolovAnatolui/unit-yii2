<?php

namespace app\models;

use yii\base\Model;

class ClaimForm extends Model
{
    public $name;
    public $email;
    public $phone;

    public function rules()
    {
//        return [
//            [['name', 'email','phone'], 'required'],
//            ['email', 'email']
//        ];
        return [
            [['name', 'email', 'phone'], 'required'],
            ['email', 'email'],
            [['name', 'email'], 'string', 'max' => 30,'min' => 3],
            [['name'], 'match', 'pattern' => '/^[a-zA-Z]+( [a-zA-Z]+)*$/'],
            ['email', 'unique', 'targetClass' => 'app\models\Claim', 'message' => 'Этот email уже используется.'],
            ['phone', 'validatePhoneNumber'],
        ];
    }


    public function validatePhoneNumber($attribute, $params)
    {
        $expectedLength = 10;

        if (strlen($this->$attribute) !== $expectedLength) {
            $this->addError($attribute, 'Номер телефона должен содержать ровно ' . $expectedLength . ' символов.');
        }
    }
}