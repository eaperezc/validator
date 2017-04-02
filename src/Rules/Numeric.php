<?php

namespace Validator\Rules;

use Validator\Rule;

/**
 * Validates that the value is a number
 */
class Numeric extends Rule
{
    protected $signature = 'numeric';

    public function validate($value)
    {
        return !is_numeric($value);
    }
}
