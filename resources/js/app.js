import './bootstrap';
import 'flowbite';
import 'livewire-vite-plugin/resources/js/livewire-hot-reload';


import { initializeApp } from "firebase/app";
import { getMessaging, getToken } from "firebase/messaging";

// TODO: Replace the following with your app's Firebase project configuration
// See: https://firebase.google.com/docs/web/learn-more#config-object
const firebaseConfig = {
    apiKey: "AIzaSyCSpdDfw0_6KDqq_WAs5AGtFjS0iVYSopg",
    authDomain: "lms-mysunrise.firebaseapp.com",
    projectId: "lms-mysunrise",
    storageBucket: "lms-mysunrise.appspot.com",
    messagingSenderId: "126805896019",
    appId: "1:126805896019:web:baedf52c3ca7b46c6dcfa6"
};
// Initialize Firebase
const app = initializeApp(firebaseConfig);


const messaging = getMessaging(app);

getToken(messaging, { vapidKey: 'BK-DZDsFl2C0bpMoWLfFboEDFc-XVuwBExDzvsp2FB4wVP_SsMQketgzJd0sNmiEEiIU9Si5waFf8JzYneKxxh0' }).then((currentToken) => {
    if (currentToken) {
        var laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        axios.post('/send-token-fcm',
            { token_fcm: currentToken },
            { headers: 'X-CSRF-TOKEN', laravelToken })
        console.log(currentToken);
    } else {
        // Show permission request UI
        requestPermission()
        console.log('No registration token available. Request permission to generate one.');
    }
}).catch((err) => {
    console.log('An error occurred while retrieving token. ', err);

});


function requestPermission() {
    console.log('Requesting permission...');
    Notification.requestPermission().then((permission) => {
        if (permission === 'granted') {
            console.log('Notification permission granted.')
        }
    })
}
