<?php

namespace Tests\Validator\Rules;

use Validator\Validator;

class MinRuleTest extends \PHPUnit_Framework_TestCase
{

    public function minRuleValuesDataProvider()
    {
        return [
            'valid values'      => [ '11',     '10',      true ],
            'valid decimal'     => [ '0.02',   '0.01',    true ],
            'valid negative'    => [ '-10',    '-20',     true ],
            'wrong values'      => [ '11',     '12',      [ 'number' => 'min' ] ],
            'wrong decimal'     => [ '0.1',    '0.2',     [ 'number' => 'min' ] ],
            'wrong negative'    => [ '-10',    '-5',      [ 'number' => 'min' ] ],
            'equal values'      => [ '3',      '3',       [ 'number' => 'min' ] ]
        ];
    }

    /**
     * @dataProvider minRuleValuesDataProvider
     */
    public function testMinRuleValidationWorksAsExpected($value, $min, $assert_value)
    {
        $validator = new Validator();

        $data = [
            'number' => $value
        ];

        $errors = $validator->validate($data, [
            'number' => 'min:' . $min
        ]);

        $this->assertEquals($errors, $assert_value);
    }

}
