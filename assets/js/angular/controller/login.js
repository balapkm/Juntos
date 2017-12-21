app.controller('login',function($scope,validateService,httpService,commonService){
	$scope.formData = {};
	
	commonService.showLoader();
	let loginDetails = commonService.getStorageValue('login_details');
    if(loginDetails !== null)
    {
       window.location.href= "dashboard";
    }

	$scope.formSubmit = function(){
		if(validateService.blank(this.formData['username'],"Username cannot be blank","username")) return false;
    	if(validateService.blank(this.formData['password'],"Password cannot be blank","password")) return false;

    	var service_details = {
	      method_name : "loginAction",
	      controller_name : "Login",
	      data : JSON.stringify($scope.formData)
	    };

    	httpService.callWebService(service_details).then(function(data){
    		if(data === 'Invalid User')
	        {
	            validateService.displayMessage('error',data,'');
	            validateService.addErrorTag(['username','password']);
	        }
	        else
	        {
	            commonService.setStorage('login_details',JSON.stringify(data),3600000);
	            window.location.href = 'dashboard';
	        }
    	})
	}
});