<?php

namespace Tests\Validator\Rules;

use Validator\Validator;

class RequiredRuleTest extends \PHPUnit_Framework_TestCase
{

    public function testRequiredRuleValidatesCorrectly()
    {
        $validator = new Validator();

        $data = [
            'something' => 'required',
            'other'     => 'not_required'
        ];

        $errors = $validator->validate($data, [
            'something' => 'required'
        ]);

        $this->assertTrue($errors);

        $errors = $validator->validate([], [
            'something' => 'required'
        ]);

        $this->assertEquals($errors, [ 'something' => 'required' ]);
    }

    public function testTheRequiredValidatorTogetherWithAnotherOne()
    {
        $validator = new Validator();

        $errors = $validator->validate([], [
            'email_address' => 'email|required'
        ]);

        $this->assertEquals($errors, [
            'email_address' => 'required'
        ]);
    }
}
