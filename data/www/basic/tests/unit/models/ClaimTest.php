<?php

namespace tests\unit\models;

use app\models\Claim;
use app\models\ClaimForm;
use Codeception\Test\Unit;

class ClaimTest extends Unit
{
    public function testValidateClaimForm()
    {
        $model = new ClaimForm();
        $model->name = 'JohnDoe';
        $model->phone = '1234567981';
        $model->email = 'john@example.com';

        // Проверяем, что модель валидируется успешно
        $this->assertTrue($model->validate());
    }

    public function testEmptyFields()
    {
        $model = new ClaimForm();

        $model->name = '   ';
        $model->email = '';
        $model->phone = '       ';

        // Проверка, что форма не проходит валидацию
        $this->assertFalse($model->validate());

        // Проверка ошибки для каждого поля
        $this->assertArrayHasKey('name', $model->getErrors());
        $this->assertArrayHasKey('email', $model->getErrors());
        $this->assertArrayHasKey('phone', $model->getErrors());
    }


    public function testInvalidEmail()
    {
        $model = new ClaimForm();
        $model->name = 'John Doe';
        $model->phone = '1234567890';
        // неверный формат email
        $model->email = 'invalid-email';

        $this->assertFalse($model->validate());

        $this->assertArrayHasKey('email', $model->getErrors());
    }

    public function testFieldLengthExceedsMaximum()
    {
        $model = new ClaimForm();
//        $model->name = 'John Doe';
        $model->name = str_repeat('a', 31);
        $model->email = str_repeat('a', 31);
        $model->phone = str_repeat('1', 11);

        $this->assertFalse($model->validate());

        $this->assertArrayHasKey('name', $model->getErrors());
        $this->assertArrayHasKey('email', $model->getErrors());
        $this->assertArrayHasKey('phone', $model->getErrors());
    }

    public function testFieldLengthExceedsMinumum()
    {
        $model = new ClaimForm();
        $model->name = str_repeat('a', 1);
        $model->email = str_repeat('a', 1);
        $model->phone = str_repeat('1', 1);

        $this->assertFalse($model->validate());

        $this->assertArrayHasKey('name', $model->getErrors());
        $this->assertArrayHasKey('email', $model->getErrors());
        $this->assertArrayHasKey('phone', $model->getErrors());
    }

    public function testInvalidCharacters()
    {
        $model = new ClaimForm();

        $model->name = 'John *Doe';
        $model->email = 'invalid.email@ex#ample.com';
        $model->phone = '+899852819';
        $this->assertFalse($model->validate());
        $this->assertArrayHasKey('name', $model->getErrors());
        $this->assertArrayHasKey('email', $model->getErrors());
        $this->assertArrayNotHasKey('phone', $model->getErrors());
    }

    public function testNumericInputInName()
    {
        $model = new ClaimForm();

        $model->name = '12345';

        $this->assertFalse($model->validate());

        $this->assertArrayHasKey('name', $model->getErrors());
    }
    public function testNameOtherChar()
    {
        $model = new ClaimForm();

        $model->name = '*asdfsd';

        $this->assertFalse($model->validate());

        $this->assertArrayHasKey('name', $model->getErrors());
    }

    public function testSaveData()
    {
        $claim = new Claim();
        $model = new ClaimForm();
        $model->name = 'John Doe';
        $model->email = 'johndoe@example.com';
        $model->phone = '+79899852819';

        $claim->name = $model->name;
        $claim->phone = $model->phone;
        $claim->email = $model->email;


        $this->assertTrue($claim->save());
    }

    public function testErrorMessages()
    {
        $model = new ClaimForm();

        $model->name = 'John Doe';
        $model->email = 'invalid-email';
        $model->phone = '123';

        $this->assertFalse($model->validate());
        $this->assertTrue($model->hasErrors('email'));
        $this->assertTrue($model->hasErrors('phone'));
        $this->assertEquals('Email is not a valid email address.', $model->getFirstError('email'));
        $this->assertEquals('Номер телефона должен содержать ровно 10 символов.', $model->getFirstError('phone'));
    }


}
