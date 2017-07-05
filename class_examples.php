<?

class SimpleClass {
    
    // property declaration 
    public $var = 'Some value';
    
    // method declaration
    public function displayVar() {
        
        echo $this->var; 
    }
}

$simpleClassInstance = new SimpleClass(); 


// class instance 
// echo($simpleClassInstance->var);
echo $simpleClassInstance->displayVar();
 
 

?>