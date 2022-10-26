<?php
namespace App\Http\Requests;

 class Validation {
    private string $input;
    private string $inputName;
    private array $errors = [];
    
   public function required():self{
    if(empty($this->input)){
        $this->errors[$this->inputName][__FUNCTION__]= "{$this->inputName} is required";
    
    }return $this;

    }
    public function string():self{
        if(! is_string($this->input)){
            $this->errors[$this->inputName][__FUNCTION__] = "{$this->inputName} is not strimg";
        }
        return $this;

    }
    public function between(int $min ,int $max):self{
        if(!(strlen($this->input)>=$min && strlen($this->input)<=$max)){

            $this->errors[$this->inputName][__FUNCTION__] = "{$this->inputName} is must be between{$min},{$max}";
        } return $this;

    }
    // public function regex(string $pattern,$message=null)  :self
    // {
    //     // print_r($pattern);var_dump($this->getInput());die;
    //     if(! preg_match($pattern,$this->input)){
    //         $this->errors[$this->inputName][__FUNCTION__] = $message ?? "{$this->inputName} invalid";
    //     }
    //     return $this;
    // }
    public function unique(){

    }
    public function exist(){

    }
    public function confirm_password($pass_confirm):self{
        if($this->input !==$pass_confirm){
            $this->errors[$this->inputName][__FUNCTION__] = "{$this->inputName} is invalid"; 
        }return $this;

    }
    public function in(array $values):self{
        if( ! in_array($this->input,$values)){
            $this->errors[$this->inputName][__FUNCTION__] = "{$this->inputName} is invalid";
        }return $this;

    }
    public function numeric(){
        if(! is_numeric($this->input)){
            $this->errors[$this->inputName][__FUNCTION__] = "{$this->inputName} is not number";
        }

    return $this;
    }
    public function digits($digits){
        if( strlen($this->input !==$digits)){
            $this->errors[$this->inputName][__FUNCTION__] = "{$this->inputName} is invalid"; 
        }

        return $this;
        }
    
    


    /**
     * Get the value of input
     */ 
    public function getInput()
    {
        return $this->input;
    }

    /**
     * Set the value of inputName
     *
     * @return  self
     */ 
    public function setInputName($inputName)
    {
        $this->inputName = $inputName;

        return $this;
    }
 /**
     * Set the value of input
     *
     * @return  self
     */ 
    public function setInput($input)
    {
        // var_dump($input);die;
        $this->input = $input;

        return $this;
    }
    /**
     * Get the value of errors
     */ 
    public function getErrors()
    {
        return $this->errors;
    }
    public function getError($inputName){
        if(isset($this->errors[$inputName])){
            foreach($this->errors[$inputName] as $error){
                return $error;
            }
        }
        return null;
    }
    public function getErrorMessage(string $inputName)
    {
        return "<p class='text-danger font-weight-bold' > ".$this->getError($inputName)." </p>";
    }

   
 }