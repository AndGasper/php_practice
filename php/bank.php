<?php
 
class Customer {
    // Properties 
    /**
    * Name (public) - Your name isn't exactly privileged information
    * SSN (private) - Hmm, I just listed this because you typically have to give one
    * Address (protected) - 
    * Phone number (private) 
    * Account Number
    */
    protected $name;
    private $ssn;
    protected $address;

    public function __construct($customerName, $ssn, $address) {
        $this->name = $customerName; // testing to see that they don't have to be the same
        $this->ssn = $ssn;
        $this->address = $address;
    }
}

// If I do not specify arugments here in the delcaration, I get a bunch of errors
$a = new Customer('Bill', '1', '8 Penny Lane'); 



class BankBranch {
    // Properties 
    /**
    *  Branch id, customer list 
    */
    // Methods
    /* 
    *   - Transfer funds => Intra and inter
    *   - New customer => Make a new customer
    *   - Remove customer 
    */ 

}

class BankCorp {

}



?>