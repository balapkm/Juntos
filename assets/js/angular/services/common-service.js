app.service('commonService',function($http,$q){
	this.showLoader = function(){
		$('body').removeClass('loaded');
	}

	this.hideLoader = function(){
		$('body').addClass('loaded');
	}

	this.setStorage = function(key,value,millisecond){
	    $.jStorage.set(key, value, {TTL: millisecond})
	}

	this.getStorageValue = function(key){
	    return $.jStorage.get(key);
	}

	this.deleteStorageValue = function(key){
	    $.jStorage.flush();
	    $.jStorage.deleteKey(key);
	}
});