<?php

namespace App\Service;

use Datto\JsonRpc\Evaluator;
use Opis\JsonSchema\Validator;

 /**
 * Abs
 */
 abstract class AbstractEvaluator implements Evaluator
 {
        public $arguments = [];

        /**
         * [evaluate description]
         * @param  string $method    [description]
         * @param  [type] $arguments [description]
         * @return [type]            [description]
         */
        abstract public function evaluate($method, $arguments);

        /**
         * [schemaValidator description]
         * @param  string $schema [description]
         * @return [type]         [description]
         */
        public function schemaValidator(string $schema): bool
        {   
            $schemaObject = \json_decode($schema); 

            if(! $schemaObject instanceof \stdClass){
                return false;
            }
            
            return (new Validator)
                ->dataValidation((object) $this->arguments, $schemaObject)
                ->isValid();
        }
 }