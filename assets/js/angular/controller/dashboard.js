app.controller('dashboard',function($scope,commonService,validateService,httpService){

    commonService.showLoader();
	$scope.loginDetails     = commonService.getStorageValue('login_details');
    if($scope.loginDetails === null)
    {
       window.location.href= "login";
    }
    else
    {
    	$scope.loginDetails = JSON.parse($scope.loginDetails);
        commonService.hideLoader();
    }

    $('.content-wrapper').css('background-color','#fff');

    $scope.formData = {
        field1 : "",
        field2 : "",
        field3 : ""
    }

    /*$("body").niceScroll();
    $("body").getNiceScroll().resize();*/

    $scope.logOut = function()
    {
    	commonService.deleteStorageValue('login_details');
    	window.location.href = 'login';
    }

    $scope.showChangePasswordModal = function()
    {
        $('#changePassword').modal('show');
    }

    $scope.changeAction = function()
    {
        if(validateService.blank($scope.formData['field1'],"Please Enter Old PassWord","field1")) return false;
        if(validateService.blank($scope.formData['field2'],"Please Enter New PassWord","field2")) return false;
        if(validateService.blank($scope.formData['field3'],"Please Enter Confirm PassWord","field3")) return false;

        if($scope.formData['field2'] !== $scope.formData['field3'])
        {
            validateService.displayMessage('error',"New password and Confirm passWord doesn't match","Validation Error");
            validateService.addErrorTag(['field3']);
        }

        var service_details = {
          method_name : "changePassword",
          controller_name : "Dashboard",
          data : JSON.stringify($scope.formData)
        };
        
        httpService.callWebService(service_details).then(function(data){
            if(data)
            {
                validateService.displayMessage('success','Password Updated SuccessFully','');
                $('#changePassword').modal('hide');
                $scope.formData = {
                    field1 : "",
                    field2 : "",
                    field3 : ""
                }
            }
            else
            {
                validateService.displayMessage('error','Old Password Wrong','');
                validateService.addErrorTag(['field1']);
            }
        });
    }
});