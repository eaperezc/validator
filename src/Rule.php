<?php

namespace Validator;

/**
 * Abstract class to be inherited by all the 
 * rule validators classes. 
 */
abstract class Rule implements RuleInterface
{
    /**
     * The signature for the validation rule. for example
     * the Required rule would have a "required" signature 
     * and the EntityKey rule "entity_key".
     * 
     * @var string
     */
    protected $signature = null;

    /**
     * Getter for the signature
     * 
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

}
