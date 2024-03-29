const express = require('express');
const fs = require('fs');

const app = express();

var cnt = 0
const options = {
    key: fs.readFileSync('certificates/key.pem'),
    cert: fs.readFileSync('certificates/cert.pem')
};
const server = require('http').createServer(options,app);


const io = require('socket.io')(server, {
    cors: { origin: "*"}
});


io.on('connection', (socket) => {
    console.log('connection');
    cnt += 1;
    socket.on('joinChannel', (channel) => {
        socket.join(channel); // Join the specified room/channel
        console.log(channel);
    });

    socket.on('sendChatToServer', (message) => {
        console.log(message);


        // socket.broadcast.emit('sendChatToClient', message['message']);
        io.to(message['channel']).emit('sendChatToClient', message);
    });


    socket.on('disconnect', (socket) => {
        console.log('Disconnect');
        cnt -= 1;
    });
});

server.listen(3000, () => {
    console.log('Server is running');
});