document.addEventListener("deviceready", onDeviceReady, false);

    // Cordova is ready
    //
    function onDeviceReady() {
      
      cordova.plugins.diagnostic.requestLocationAuthorization(function(status){
    switch(status){
        case cordova.plugins.diagnostic.permissionStatus.NOT_REQUESTED:
            console.log("Permission not requested");
            break;
        case cordova.plugins.diagnostic.permissionStatus.GRANTED:
            console.log("Permission granted");
            break;
        case cordova.plugins.diagnostic.permissionStatus.DENIED:
            console.log("Permission denied");
            break;
        case cordova.plugins.diagnostic.permissionStatus.DENIED_ALWAYS:
            console.log("Permission permanently denied");
            break;
    }
}, function(error){
    console.error(error);
});
       
    }

