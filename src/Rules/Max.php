<?php

namespace Validator\Rules;

use Validator\Rule;

/**
 * Validates that the value is not greather than parameter
 */
class Max extends Rule
{
    protected $signature = 'max';

    public function validate($value)
    {
        return (is_numeric($value) && $value < $this->getParameter());
    }

}
