/**
 * 
 */

jQuery(document).ready(function() {
	window.fbAsyncInit = function() {
	 //   FB.init(Drupal.settings.fb.fb_init_settings);
		
	   showLoader(true);
	   
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
}

function login(response, info){
    if (response.authResponse) {
        var accessToken                                 =   response.authResponse.accessToken;
        button.innerHTML                               = 'Logout';
        showLoader(false);

    }
    
}

function logout(response){
    
}


function showLoader(status){
    if (status)
        document.getElementById('loader').style.display = 'block';
    else
        document.getElementById('loader').style.display = 'none';
}

