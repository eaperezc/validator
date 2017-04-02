<?php

namespace Tests\Validator\Rules;

use Validator\Validator;
use Validator\Rules\EmailValidator;

class EmailRuleTest extends \PHPUnit_Framework_TestCase
{

    public function testEmailRuleValidatesCorrectEmail()
    {
        $validator = new Validator();

        $data = [
            'email_address' => 'test@example.com'
        ];

        $errors = $validator->validate($data, [
            'email_address' => 'email'
        ]);

        $this->assertTrue($errors);
    }

    public function testEmailRuleReturnsErrorWhenBadEmail()
    {
        $validator = new Validator();

        $data = [
            'email_address' => 'not_an_email'
        ];

        $errors = $validator->validate($data, [
            'email_address' => 'email'
        ]);

        $this->assertEquals($errors, [
            'email_address' => 'email'
        ]);
    }
}
