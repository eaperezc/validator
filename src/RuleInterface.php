<?php

namespace Validator;

/**
 * Interface for all rules
 */
interface RuleInterface
{
    public function getSignature();
    public function validate($value);
}
