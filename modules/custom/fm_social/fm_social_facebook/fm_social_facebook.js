/**
 * 
 */

jQuery(document).ready(function() {
	window.fbAsyncInit = function() {
	    FB.init(Drupal.settings.fb.fb_init_settings);
		
	   showLoader(true);
	   
	   // run once with current status and whenever the status changes
	   FB.getLoginStatus(updateButton);
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

                    var data = {
                    	    'event_type': 'session_change',
                    	    'is_anonymous': Drupal.settings.fb.is_anonymous
                    	  };

                    	  data.fbu = FB.getUserID();

                    	  FB_JS.ajaxEvent(data.event_type, data);
                    	  
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
        
        userInfo.innerHTML                             = '<img src="https://graph.facebook.com/' + info.id + '/picture">' + info.name
                                                         + "<br /> Your Access Token: " + accessToken;
        button.innerHTML                               = 'Logout';
        showLoader(false);
        document.getElementById('other').style.display = "block";

    }
    
}

function logout(response){
    userInfo.innerHTML                             =   "";
    document.getElementById('debug').innerHTML     =   "";
    document.getElementById('other').style.display =   "none";
    showLoader(false);
}


function showLoader(status){
    if (status)
        document.getElementById('loader').style.display = 'block';
    else
        document.getElementById('loader').style.display = 'none';
}

