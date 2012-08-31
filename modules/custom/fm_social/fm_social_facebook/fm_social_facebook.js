/**
 * 
 */

var appId = '213872101957329';

jQuery(document).ready(function() {
	window.fbAsyncInit = function() {
	    FB.init({ appId: appId, 
	        status: true, 
	        cookie: true,
	        xfbml: true,
	        oauth: true});

	   showLoader(true);
	   
	   // run once with current status and whenever the status changes
	   FB.getLoginStatus(function(response) {
		   if (response.status === 'connected') {
		     // the user is logged in and has authenticated your
		     // app, and response.authResponse supplies
		     // the user's ID, a valid access token, a signed
		     // request, and the time the access token 
		     // and signed request each expire
		     var uid = response.authResponse.userID;
		     var accessToken = response.authResponse.accessToken;
		   } else if (response.status === 'not_authorized') {
		     // the user is logged in to Facebook, 
		     // but has not authenticated your app
		   } else {
		     // the user isn't logged in to Facebook.
		   }
		  });
	   FB.Event.subscribe('auth.statusChange', updateButton);	
	};
	
});



function updateButton(response) {
    button       =   document.getElementById('fb-auth');
    userInfo     =   document.getElementById('user-info');
    
    if (response.authResponse) {
        //user is already logged in and connected
        FB.api('/me', function(info) {
            login(response, info);
        });
        
        button.onclick = function() {
            FB.logout(function(response) {
                logout(response);
            });
        };
    } else {
        //user is not connected to your app or logged out
        button.innerHTML = 'Login';
        button.onclick = function() {
            showLoader(true);
            FB.login(function(response) {
                if (response.authResponse) {
                    FB.api('/me', function(info) {
                        login(response, info);
                    });	   
                } else {
                    //user cancelled login or did not grant authorization
                    showLoader(false);
                }
            }, {scope:'email,user_birthday,status_update,publish_stream,user_about_me'});  	
        }
    }
    
    (function() {
        var e = document.createElement('script'); e.async = true;
        e.src = document.location.protocol 
            + '//connect.facebook.net/en_US/all.js';
        document.getElementById('fb-root').appendChild(e);
    }());
}



function showLoader(status){
    if (status)
        document.getElementById('loader').style.display = 'block';
    else
        document.getElementById('loader').style.display = 'none';
}

