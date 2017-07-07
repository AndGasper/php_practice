const BASE_URL = "data.php?action="
function registerClient() {
    console.log("Register client function"); 
    const clientInformationForm = document.getElementById("new_customer_info");
    debugger;
    const clientData = new FormData();
    
    console.log("client data", clientData); 


    const registerRequest = new XMLHttpRequest(); // make a new instance; Should be ready state 0; 
    
    // Verification of XMLHttpRequest cleint's readyState(s) 

    console.log(`Ready state AFTER new XMLHttpRequest() BUT BEFORE XMLHttpRequest.open(): ${registerRequest.readyState}`); 
    // Output - Ready state AFTER new XMLHttpRequest() BUT BEFORE XMLHttpRequest.open(): 0
    

    registerRequest.open("POST", `${BASE_URL}register_client`); // XMLHttpRequest.open(METHOD, URL);
    console.log(`Ready state AFTER XMLHttpRequest.open() BUT BEFORE XMLHttpRequest.send(): ${registerRequest.readyState}`); 
    // Output - Ready state AFTER XMLHttpRequest.open() BUT BEFORE XMLHttpRequest.send(): 1

    
    registerRequest.send("Bleep bloop"); 
    console.log(`Ready state AFTER XMLHttpRequest.send("Bleep bloop"): ${registerRequest.readyState}`);
    // Output - Ready state AFTER XMLHttpRequest.send("Bleep bloop"): 1
    
    registerRequest.onprogress = function() {
        console.log(`Ready state DURING the 'transaction' of a request: ${registerRequest.readyState}`); 
        // Output - Ready state DURING the 'transaction' of a request: 3
    };

    registerRequest.onload = function() {
        console.log(`Ready state AFTER the 'transaction' of a request: ${registerRequest.readyState}`); 
        // Output - Ready state AFTER the 'transaction' of a request: 4
    };

    registerRequest.onreadystatechange = function() {
        console.log("Inside XMLHttpRequest.onreadystatechange anonymous function"); 
        if (registerRequest.readyState === 4) {
            console.log(`registerRequest.response:, ${registerRequest.response}`); 
            // Output - registerRequest.response:, {"debug":[]}
        } else {
            console.log(`Ready state while we wait: ${registerRequest.readyState}`);
            console.log("I'm still waiting... \n-Crosseyed and Painless, Talking Heads");
        };
    }; 



    // according to the header in Postman:
    // "Content-Type -> text/html; charset=UTF-8"
    // Put I could have sworn I set it to JSON...
    // According to documentation, my options are "document" or an empty string, if I am reading the MDN documentation correctly
    registerRequest.responseType = ''; // set the expected response type as JSON
    

}

/*
$.ajax({
    data: student,
    dataType: "json",
    method: "POST",
    url: "data.php?action=insert",
    success: function(response) {
        // code
    }, 
    error: function(response) {
        // code
    }
    
});
*/

/**
 * Notes
 * 0 - UNSENT: Client has been created. open() not called yet.
 * 1 - OPENED: open() has been called.
 * 2 - HEADERS_RECEIVED: send() has been called.
 * 3 - LOADING: Downloading; responseText holds partial data.
 * 4 - The operation is complete. 
 */
