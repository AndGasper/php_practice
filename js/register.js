const BASE_URL = "data.php?action="
function registerClient() {
    const registerRequest = new XMLHttpRequest(); // make a new instance
    registerRequest.open("POST", `${BASE_URL}register_client`); // *.open(METHOD, URL);


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