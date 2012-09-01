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
   FB_JS.initFinal(response);
   FB_JS.authResponseChange(response);
   
}

function login(response, info){
}

function logout(response){
    
}


function showLoader(status){
    if (status)
        document.getElementById('loader').style.display = 'block';
    else
        document.getElementById('loader').style.display = 'none';
}

