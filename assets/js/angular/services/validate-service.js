app.service('validateService',function(){
	this.blank=function(value,message,id)
  	{
	    if(value === "" || value === null || typeof value === "undefined")
	    {
	       this.displayMessage('error',message,"Validation Error");
	       this.addErrorTag([id]);
	       return true;
	    }
	    return false;
  	}

  	this.addErrorTag=function(ids)
	{
		angular.forEach(ids,function(element,k){
			$("#"+element).parent('div').addClass('has-error')
	      	$("#"+element).focus(function(){$(this).parent('div').removeClass('has-error')});
		});
	}

	this.displayMessage=function(type,message,title)
  	{
      	switch(type)
      	{
	        case 'info':
	           swal(message);
	           break;
	        case 'error':
	           swal(title,message, "error");
	           break;
	        case 'success':
	           swal(title,message, "success");
	           break;
	        default :
	            alert(message);
	            break;
      	}
  	}

  	this.changeAllUpperCase = function(data)
  	{
  		var final = {};
  		for(var i in data)
  		{
  			if(typeof data[i] === "string")
  				final[i] = data[i].toUpperCase();
  		}
  		return final;
  	}
});