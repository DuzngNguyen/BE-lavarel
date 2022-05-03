// import { initializeApp } from "firebase/app";
import firebase from 'firebase/compat/app';
import 'firebase/compat/auth';
import 'firebase/compat/firestore';
import '@firebase/messaging';

var InitFirebase = {
    messaging : null,
    init : function ()
    {
        // this.load()
        this.config();
        this.getDeviceToken()
    },
    config() {
        let _this = this;
        const firebaseConfig = {
            apiKey: "AIzaSyDOqhN-wHuUClSL3naPHP-2bk9E7m31CHQ",
            authDomain: "cms-123code.firebaseapp.com",
            projectId: "cms-123code",
            storageBucket: "cms-123code.appspot.com",
            messagingSenderId: "474348213288",
            appId: "1:474348213288:web:d57a15568e20e0c68b511d",
            measurementId: "G-05BPNFDQS9"
        }

        if (!firebase.apps.length) {
            firebase.initializeApp(firebaseConfig);
        }

        // let messaging = null;
        try {
            if (firebase.messaging.isSupported()) {
                _this.messaging = firebase.messaging();
                _this.messaging.usePublicVapidKey("Your Sender ID");
            }
        } catch (e) {}
        console.log('--------------: messaging: ', _this.messaging)
    },
    getDeviceToken()
    {
        $(".js-get-drive").click( function (event){
            event.preventDefault()
            console.log('------------- OK lấy drive')
        })
        // messaging.onMessage(function(payload) {
        //     const noteTitle = payload.notification.title;
        //     const noteOptions = {
        //         body: payload.notification.body,
        //         icon: payload.notification.icon,
        //     };
        //     new Notification(noteTitle, noteOptions);
        // });
    },

    getDrive()
    {
        let _this = this;
        _this.messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function(token) {
                console.log(token);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: URL_GET_DEVICE,
                    type: 'POST',
                    data: {
                        token: token
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        alert('Token saved successfully.');
                    },
                    error: function (err) {
                        console.log('User Chat Token Error'+ err);
                    },
                });

            }).catch(function (err) {
            console.log('User Chat Token Error'+ err);
        });
    }
}

export default InitFirebase;
