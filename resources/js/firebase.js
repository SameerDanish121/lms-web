import { initializeApp } from "firebase/app";
import { getMessaging, getToken, onMessage } from "firebase/messaging";
importScripts("https://www.gstatic.com/firebasejs/9.6.1/firebase-app-compat.js");
importScripts("https://www.gstatic.com/firebasejs/9.6.1/firebase-messaging-compat.js");

// Your Firebase Configuration
const firebaseConfig = {
    apiKey: "AIzaSyBuZDH46fIIxfGmztOC4UXKScdJx2ghmSE",
    authDomain: "lmsv1-e1686.firebaseapp.com",
    projectId: "lmsv1-e1686",
    storageBucket: "lmsv1-e1686.firebasestorage.app",
    messagingSenderId: "268270464824",
    appId: "1:268270464824:web:c4d213d335ce5c69ca9bcd"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const messaging = getMessaging(app);

// Request Notification Permission
export function requestNotificationPermission() {
    Notification.requestPermission().then(permission => {
        if (permission === "granted") {
            console.log("Notification permission granted.");
            getFCMToken();
        } else {
            console.log("Permission denied.");
            document.getElementById("fcm-token").innerText = "Permission Denied!";
        }
    });
}

// Retrieve and Display FCM Token
export function getFCMToken() {
    getToken(messaging, { vapidKey: "BPSU5Im7Q9TEArjkoOIxYixxdKrGCwITwdJh2Xpa8BEUAMBtKLzmja1A4h_I1g12_kvdMopYYhj5579JcvV4v2U" })
        .then((token) => {
            if (token) {
                console.log("FCM Token:", token);
                document.getElementById("fcm-token").innerText = token;
            } else {
                console.log("No FCM token available.");
                document.getElementById("fcm-token").innerText = "No Token Available!";
            }
        })
        .catch((err) => {
            console.error("Error retrieving token: ", err);
            document.getElementById("fcm-token").innerText = "Error retrieving token!";
        });
}

// Listen for Incoming Notifications
onMessage(messaging, (payload) => {
    console.log("Message received:", payload);
    alert(`New Notification: ${payload.notification.title} - ${payload.notification.body}`);
});

// Automatically request permission when the script loads
requestNotificationPermission();
