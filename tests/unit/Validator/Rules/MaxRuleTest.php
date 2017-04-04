<?php

namespace Tests\Validator\Rules;

use Validator\Validator;

class MaxRuleTest extends \PHPUnit_Framework_TestCase
{

    public function maxRuleValuesDataProvider()
    {
        return [
            'valid values'      => [ '10',     '11',      true ],
            'valid decimal'     => [ '0.01',   '0.02',    true ],
            'valid negative'    => [ '-20',    '-10',     true ],
            'wrong values'      => [ '12',     '11',      [ 'number' => 'max' ] ],
            'wrong decimal'     => [ '0.2',    '0.1',     [ 'number' => 'max' ] ],
            'wrong negative'    => [ '-5',     '-15',     [ 'number' => 'max' ] ],
            'equal values'      => [ '3',      '3',       [ 'number' => 'max' ] ]
        ];
    }

    /**
     * @dataProvider maxRuleValuesDataProvider
     */
    public function testMaxRuleValidationWorksAsExpected($value, $max, $assert_value)
    {
        $validator = new Validator();

        $data = [ 'number' => $value ];

        $errors = $validator->validate($data, [
            'number' => 'max:' . $max
        ]);

        $this->assertEquals($errors, $assert_value);
    }

}
