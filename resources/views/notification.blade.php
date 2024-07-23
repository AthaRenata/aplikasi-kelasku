<div class="container">
    <div>Notification data will receive here if the app is open and focused.</div>
    <div class="message" style="min-height: 80px;"></div>
    <div>Device Token: </div>
</div>

<script src="https://www.gstatic.com/firebasejs/9.14.0/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.14.0/firebase-messaging-compat.js"></script>

<script>
    const firebaseConfig = {
    apiKey: "AIzaSyB8U4Xt3uF2H79OJrdSUug9f-g9iXoAsZs",
    authDomain: "project1-5df9d.firebaseapp.com",
    projectId: "project1-5df9d",
    storageBucket: "project1-5df9d.appspot.com",
    messagingSenderId: "31753506273",
    appId: "1:31753506273:web:189b843cc13ebf13c696a0",
    measurementId: "G-8180WQEBRP"
};
const app = firebase.initializeApp(firebaseConfig)
const messaging = firebase.messaging()

messaging.getToken({ vapidKey: "BFOgcFYg2TynmRrR8MPyLMu-xpxzK5lbOZUx-kFso46Z4WKipI5k0h3uTGEM-Jl_a1Xwmc7VCroGs-7Abz6iOPQ" })

messaging.onMessage((payload) => {
    console.log('Message received ', payload);
    const messagesElement = document.querySelector('.message')
    const dataHeaderElement = document.createElement('h5')
    const dataElement = document.createElement('pre')
    dataElement.style = "overflow-x: hidden;"
    dataHeaderElement.textContent = "Message Received:"
    dataElement.textContent = JSON.stringify(payload, null, 2)
    messagesElement.appendChild(dataHeaderElement)
    messagesElement.appendChild(dataElement)
})
</script>