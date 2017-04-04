<?php

namespace Tests\Validator\Rules;

use Validator\Validator;

class NumericRuleTest extends \PHPUnit_Framework_TestCase
{

    public function minRuleValuesDataProvider()
    {
        return [
            'numeric'    => [  11,              true ],
            'string'     => [ '11',             true ],
            'invalid'    => [ 'something else', [ 'number' => 'numeric' ] ]
        ];
    }

    /**
     * @dataProvider minRuleValuesDataProvider
     */
    public function testNumericRuleValidationWorksAsExpected($value, $assert_value)
    {
        $validator = new Validator();

        $data = [
            'number' => $value
        ];

        $errors = $validator->validate($data, [
            'number' => 'numeric'
        ]);

        $this->assertEquals($errors, $assert_value);
    }

}
