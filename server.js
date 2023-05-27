const express = require('express');

const app = express();


const server = require('http').createServer(app);


const io = require('socket.io')(server, {
    cors: { origin: "*"}
});


io.on('connection', (socket) => {
    console.log('connection');
    socket.on('joinChannel', (channel) => {
        socket.join(channel); // Join the specified room/channel
        console.log(channel);
    });

    socket.on('sendChatToServer', (message) => {
        console.log(message);


        // socket.broadcast.emit('sendChatToClient', message['message']);
        io.to(message['channel']).emit('sendChatToClient', message['message']);
    });


    socket.on('disconnect', (socket) => {
        console.log('Disconnect');
    });
});

server.listen(3000, () => {
    console.log('Server is running');
});