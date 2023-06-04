
/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');
   
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({
        apiKey: "AIzaSyBTS-VxV58VjlZKgQeJ6TKmdUYq2cKWBFE",
        authDomain: "laravel-notification-38e38.firebaseapp.com",
        projectId: "laravel-notification-38e38",
        storageBucket: "laravel-notification-38e38.appspot.com",
        messagingSenderId: "306945239752",
        appId: "1:306945239752:web:e6616143604a4219b1d3fd",
        measurementId: "G-X1BNGPRKV0"
    });
  
/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );
    /* Customize notification here */
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Socket-io.svg/100px-Socket-io.svg.png",
    };
  
    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );
});