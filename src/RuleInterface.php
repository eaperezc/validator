<?php

namespace Validator;

/**
 * Interface for all rules
 */
interface RuleInterface
{
    public function getSignature();
    public function getParameter();
    public function setParameter($value);

    public function validate($value);
}
