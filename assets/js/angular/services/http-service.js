app.service('httpService',function($http,$q,commonService){

	this.url = 'Service';

	this.callWebService = function(data){
		var deferred = $q.defer();
		var config = {
			headers : {
				'Content-Type' : 'application/x-www-form-urlencoded'
			}
		};
		let loginDetails = commonService.getStorageValue('login_details');
	    if(loginDetails !== null)
	    {
	       loginDetails         = JSON.parse(loginDetails);
	       data['session_id']   = loginDetails['session_id'];
	    }
		var data = $.param(data);
		$http.post(this.url, data, config).then(function(response){
			if(response.data['status_code'] === 1)
			{
				commonService.deleteStorageValue('login_details');
				window.location.href = "login";
			}
			else
			{
				deferred.resolve(response.data['data']);
			}
		});
		return deferred.promise;
	}
});