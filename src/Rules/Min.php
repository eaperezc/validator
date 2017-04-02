<?php

namespace Validator\Rules;

use Validator\Rule;

/**
 * Validates that the value is not less than parameter
 */
class Min extends Rule
{
    protected $signature = 'min';

    public function validate($value)
    {
        return (!is_numeric($value) && $value < $this->getParameter());
    }

}
