app.controller('dashboard',function($scope,commonService){

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

    $("body").niceScroll();
    $("body").getNiceScroll().resize();

    $scope.logOut = function()
    {
    	commonService.deleteStorageValue('login_details');
    	window.location.href = 'login';
    }
});