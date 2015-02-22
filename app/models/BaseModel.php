<?php

Abstract class BaseModel extends Eloquent {
        
        protected $validationMessage;
        
        public function getValidationMessage() {
            return $this->validationMessage;
        }
        
        public function validation() {
            $validator = 
                    Validator::make($this->attributes, $this->validationRules);
            if ($validator->fails()) {
                $this->validationMessage = $validator->messages();
                return false;
            }
            return true;
        }
        
}
