/**
 * 
 */

jQuery(document).ready(function() {
	window.fbAsyncInit = function() {
	    FB.init(Drupal.settings.fb.fb_init_settings);
		
	   //showLoader(true);
	   
	   // run once with current status and whenever the status changes
	   FB.getLoginStatus(updateButton);
	   FB.Event.subscribe('auth.statusChange', updateButton);	
	};
	
});


function updateButton(response) {
   FB_JS.initFinal(response);
   FB_JS.authResponseChange(response);
     
    button       =   document.getElementById('fb-auth');
    userInfo     =   document.getElementById('user-info');
    
    if (response.authResponse) {
        //user is already logged in and connected
        FB.api('/me', function(info) {
            login(response, info);
        });
        
    } else {
        //user is not connected to your app or logged out
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
}

function login(response, info){
    if (response.authResponse) {
        //showLoader(false);
    }
    
}

function logout(response){
    
}


function showLoader(status){
   if(status) {
	   jQuery('.forgot_password').hide();
		jQuery('.login').hide();
		jQuery('.facebook_connecting').show();
   } else {
	   jQuery('.forgot_password').hide();
		jQuery('.login').show();
		jQuery('.facebook_connecting').hide(); 
   }
}

