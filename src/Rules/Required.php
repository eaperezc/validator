<?php

namespace Validator\Rules;

use Validator\Rule;

/**
 * Validates that the value is not null or not set
 */
class Required extends Rule
{
    protected $signature = 'required';

    public function validate($value)
    {
        return (isset($value) && !is_null($value));
    }
}
