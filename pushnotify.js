document.addEventListener("deviceready", onDeviceReady, false);

    // Cordova is ready
    //
    function onDeviceReady() {
      
   var push = PushNotification.init({
	android: {
		
	},
    browser: {
        pushServiceURL: 'http://push.api.phonegap.com/v1/push'
    },
	ios: {
		alert: "true",
		badge: "true",
		sound: "true"
	},
	windows: {}
});

push.on('registration', function(data) {
	// data.registrationId
	console.log(data.registrationId);
	
});

push.on('notification', function(data) {
	// data.message,
	// data.title,
	// data.count,
	// data.sound,
	// data.image,
	// data.additionalData
	alert(data.title+" Message: " +data.message+ data.additionalData.submessage);
	console.log(date.title);
	console.log(data.message);
	
});

push.on('error', function(e) {
	// e.message
	alert(e);
	console.log(e);
});

       
    }
