app.service('httpService',function($http,$q,commonService){

	this.url = 'Service';

	this.callWebService = function(data,type,url){
		type     = (typeof type === 'undefined')?'data':'full';
		this.url = (typeof url  === 'undefined')?this.url:url;
		var deferred = $q.defer();
		var config = {
			headers : {
				'Content-Type' : 'application/x-www-form-urlencoded'
			}
		};
		var loginDetails = commonService.getStorageValue('login_details');
	    if(loginDetails !== null)
	    {
	       loginDetails         = JSON.parse(loginDetails);
	       data['session_id']   = loginDetails['session_id'];
	    }
		var data = $.param(data);
		var This = this;
		$http.post(this.url, data, config).then(function(response){
			response.data  = JSON.parse(This.decompress(response.data));
			if(response.data['status_code'] === 1)
			{
				commonService.deleteStorageValue('login_details');
				window.location.href = "login";
			}
			else
			{
				if(type === 'full')
				{
					deferred.resolve(response.data);
				}
				else
				{
					deferred.resolve(response.data['data']);
				}
			}
		});
		return deferred.promise;
	}

	this.decompress = function(str) {
       return unescape((new JXG.Util.Unzip(JXG.Util.Base64.decodeAsArray(str))).unzip()[0][0]);
  	};
});