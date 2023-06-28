$(document).ready(function() {

    Notification.requestPermission().then(perm => {
        if (perm === "granted") {
            new Notification("Test");
        }
    });

});