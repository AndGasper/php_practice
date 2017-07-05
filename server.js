const http = require('http');
const PORT = 8001;
function serverCreation(request, response) {
    console.log("server creation callback");
    console.log("This was this request:", request);
}

const server = http.createServer(serverCreation);

server.listen(PORT, () => {
    console.log(`Bleep bloop. Listening on: ${PORT}`);
}); 

// TODO mimic Apache's file serving with Node
