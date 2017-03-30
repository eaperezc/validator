<?php

namespace Validator\Rules;

use Validator\Rule;

/**
 * Validates that the value is an entity key
 */
class EntityKey extends Rule
{
    protected $signature = 'entity_key';

    /**
     * Regular expression to validate default entity keys
     * @var string
     */
    protected $regex = '/^[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])[0-9]{10}$/';

    public function validate($value)
    {
        if (!is_string($value) || !preg_match($this->regex, $value) ) {
            return true;
        }
        return false;
    }
}
