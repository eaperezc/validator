<?php

namespace Validator\Rules;

use Validator\Rule;

/**
 * Validates that the value is a boolean
 */
class Boolean extends Rule
{
    protected $signature = 'boolean';

    public function validate($value)
    {
        return is_bool($value);
    }
}
