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
     * Some rules require a parameter to be able to work, for
     * example the Min or Max rules require the parameter.
     *
     * @var string|number|anything
     */
    protected $parameter = null;

    /**
     * Getter for the signature
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Getter for the parameter
     *
     * @return string
     */
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * Setter for the parameter of the rule
     *
     * @return void
     */
    public function setParameter($value)
    {
        $this->parameter = $value;
    }

}
