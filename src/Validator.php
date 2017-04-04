<?php

namespace Validator;

/**
* Object that will serve as the entry point to run
* all validator rules that are requested.
*/
class Validator
{
    /**
     * Rules classes list. Every rule that is defined in this
     * array are the default validation rules that are available.
     * To add more, use the addRule() method.
     *
     * @var array
     */
    private $rules = [
        '\Validator\Rules\Required',
        '\Validator\Rules\Boolean',
        '\Validator\Rules\Email',
        '\Validator\Rules\Numeric',
        '\Validator\Rules\Min',
        '\Validator\Rules\Max'
    ];

    /**
     * Internal variable to hold the map for the available rules.
     * The map structure will be something like this:
     *      [
     *          'required': new \Validator\Rules\Required(),
     *          'boolean': new \Validator\Rules\Boolean(),
     *          ... (any other $rule)
     *      ]
     *
     * @var array
     */
    private $rule_map = [];

    /**
     * Facade method to call the validate functionality.
     *
     * @param array $data   The data to validate as an array
     * @param array $rules  The rules to validate as 'column' => 'rule'
     * @return void
     */
    public static function check($data, $rules)
    {
        $validator = new self;
        return $validator->validate($data, $rules);
    }

    /**
     * This will initialize the rules map with the validation
     * objects that are available for the check.
     *
     * @return void
     */
    private function setupRulesMap()
    {
        foreach ($this->rules as $rule_class) {
            $rule_obj = new $rule_class;
            $this->rule_map[$rule_obj->getSignature()] = $rule_obj;
        }
    }

    /**
     * Validates the data with the current available validation
     * rules. Will return an array of the errors if any or true
     * if all the validation rules passed.
     *
     * @param array $data       The data to validate as an array
     * @param array $rules      The rules to validate as 'column' => 'rule'
     * @return boolean|array    true if validation pass, array of errors if not
     */
    public function validate($data, $rules)
    {
        $errors = [];

        $this->setupRulesMap();

        foreach ($rules as $column => $validation_pipes) {

            $validation_array = explode('|', $validation_pipes);
            foreach ($validation_array as $rule) {

                // This is because some rules need a parameter fo work
                // for examples the Min or Max rules need the value to check with
                $rule_array = explode(':', $rule);
                if (sizeof($rule_array) > 1) {
                    // get the values ($rule is overwritten)
                    $rule = $rule_array[0]; // name of the rule
                    $rule_param = $rule_array[1]; // parameter for the rule
                    $this->rule_map[$rule]->setParameter($rule_param);
                }

                // if the value is not set we set is as null so the
                // required validation can come in and check
                $value = isset($data[$column]) ? $data[$column] : null;

                // Here we will check the rules
                if (isset($this->rule_map[$rule])
                    && !$this->rule_map[$rule]->validate($value)) {
                    // Get the errors that came from the validation
                    $errors[$column] = $rule;
                }
            }
        }
        // Return the array of errors from the validation
        // or true if everything passed
        return empty($errors) ? true : $errors;
    }
}
