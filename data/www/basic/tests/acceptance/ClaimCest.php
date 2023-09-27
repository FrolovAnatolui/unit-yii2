<?php

namespace tests\acceptance;

use AcceptanceTester;
use app\models\ClaimForm;

class ClaimCest
{
    public function _before(AcceptanceTester $I)
    {

    }

    public function _after(AcceptanceTester $I)
    {

    }

    public function tryToSubmitClaimForm(AcceptanceTester $I)
    {
        $I->amOnPage('/claim'); // Переходим на страницу с формой
        $I->see('Отправить', 'button'); // Проверяем, что есть кнопка "Отправить"
        $I->fillField('input[name="ClaimForm[name]"]', 'John Doe'); // Заполняем поле "Имя"
        $I->fillField('input[name="ClaimForm[email]"]', 'john@example.com'); // Заполняем поле "Email"
        $I->fillField('input[name="ClaimForm[phone]"]', '1234567890'); // Заполняем поле "Телефон"
        $I->click('Отправить'); // Нажимаем на кнопку "Отправить"
        $I->see('Вы ввели следующую информацию:'); // Проверяем, что увидели подтверждение
    }
}
