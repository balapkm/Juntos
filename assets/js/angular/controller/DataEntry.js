var tab_switch_name = 'tab_1';
var serial_no = null;
app.controller('DataEntry',function($scope,validateService,httpService,$state,commonService){

	$('#example2').DataTable();
	$('.select2').select2();
	$('#datePicker,#datePicker1').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $scope.formData = {};
    
    $('.modal-backdrop').css('display','none');
	$('body').removeClass('modal-open');

	$("body").niceScroll();
    $("body").getNiceScroll().resize();

	if(tab_switch_name === 'tab_2')
	{
		setTimeout(function(){
			$('a[href="#'+tab_switch_name+'"]').trigger('click');
			$scope.formData['serial_no_1'] = serial_no;
			$("#serial_no_1").select2().select2("val",serial_no);
			$scope.searchAction();
		},100);
	}
	
    $scope.showTable = false;
    $scope.searchData=[];

    $scope.formData = {
    	leather : "",
    	query   : "",
    	description : "",
    	article : "",
    	color : "",
    	selection : "",
    	pieces : "",
    	sqfeet : "",
    	remarks : "",
    	serial_no : "",
    	date : "",
    	serial_no_1 : ""
    };

    $scope.addAction = function()
    {
    	$scope.formData['date']      = $('#datePicker').val();
    	$scope.formData['serial_no'] = $('#serial_no').val();

    	if(validateService.blank($scope.formData['date'],"Please Choose date","datePicker")) return false;
    	if(validateService.blank($scope.formData['leather'],"Please Choose leather","leather")) return false;
    	if(validateService.blank($scope.formData['query'],"Please Choose query","query")) return false;
    	if(validateService.blank($scope.formData['leather'],"Please Choose leather","leather")) return false;
    	if(validateService.blank($scope.formData['description'],"Please Choose description","description")) return false;
    	if(validateService.blank($scope.formData['article'],"Please Choose article","article")) return false;
    	if(validateService.blank($scope.formData['color'],"Please Choose color","color")) return false;
    	if(validateService.blank($scope.formData['selection'],"Please Choose selection","selection")) return false;
    	if(validateService.blank($scope.formData['pieces'],"Please Enter pieces","pieces")) return false;
    	if(validateService.blank($scope.formData['sqfeet'],"Please Enter sqfeet","sqfeet")) return false;
    	if(validateService.blank($scope.formData['remarks'],"Please Enter remarks","remarks")) return false;

    	var service_details = {
	      method_name : "addAction",
	      controller_name : "DataEntry",
	      data : JSON.stringify($scope.formData)
	    };
	    
    	httpService.callWebService(service_details).then(function(data){
    		if(data)
    		{
    			swal({
				  title: "Do You Want Add More data for this serial_no?",
				  text: "",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if(willDelete)
				  {
			    	$scope.formData = {
				    	leather : "",
				    	query   : "",
				    	description : "",
				    	article : "",
				    	color : "",
				    	selection : "",
				    	pieces : "",
				    	sqfeet : "",
				    	remarks : "",
				    	date : ""
				    };
				    $('#datePicker').val("");
				    $("#description").select2().select2("val","");
			    	$("#article").select2().select2("val","");
			    	$("#color").select2().select2("val","");
			    	$("#selection").select2().select2("val","");
				    $scope.$apply();
				  }
				  else
				  {
				  	$('#modal-backdrop').css('display','none');
	    			validateService.displayMessage('success','Added Successfully','');
	    			$state.reload();
	    			tab_switch_name = 'tab_1';
				  }
				});
    		}
    		else
    		{
    			validateService.displayMessage('error','Insertion Failed',"");
    		}
    	})
    }

    $scope.clearRedMark = function(id)
    {
    	$("#"+id).parent('div').removeClass('has-error');
    }

    $scope.searchAction = function()
    {
    	$scope.searchData = [];
    	$scope.showTable  = false;
    	if(validateService.blank($scope.formData['serial_no_1'],"Please Choose serial no","serial_no_1")) return false;

    	var service_details = {
	      method_name : "searchAction",
	      controller_name : "DataEntry",
	      data : JSON.stringify($scope.formData)
	    };
    	commonService.showLoader();
    	httpService.callWebService(service_details).then(function(data){
    		commonService.hideLoader();
    		$scope.searchData = data; 
    		$scope.showTable  = true;
    		setTimeout(function(){$('#example2').DataTable()},100);
    	})
    }

    $scope.updateAddClick = function()
    {
    	$scope.modal = {
    		"title" : "Add DataEntry in "+$scope.formData['serial_no_1'],
    		"button" : "Add"
    	};
    	$scope.formData.serial_no_modal = $scope.formData['serial_no_1'];
    	$('#modal-default').modal('show');
    }

    $scope.addUpdateAction = function()
    {

    	$scope.formData['date']      = $('#datePicker1').val();
    	$scope.formData['serial_no'] = $('#serial_no_modal').val();

    	if(validateService.blank($scope.formData['date'],"Please Choose date","datePicker1")) return false;
    	if(validateService.blank($scope.formData['leather'],"Please Choose leather","leather1")) return false;
    	if(validateService.blank($scope.formData['query'],"Please Choose query","query1")) return false;
    	if(validateService.blank($scope.formData['leather'],"Please Choose leather","leather1")) return false;
    	if(validateService.blank($scope.formData['description'],"Please Choose description","description1")) return false;
    	if(validateService.blank($scope.formData['article'],"Please Choose article","article1")) return false;
    	if(validateService.blank($scope.formData['color'],"Please Choose color","color1")) return false;
    	if(validateService.blank($scope.formData['selection'],"Please Choose selection","selection1")) return false;
    	if(validateService.blank($scope.formData['pieces'],"Please Enter pieces","pieces1")) return false;
    	if(validateService.blank($scope.formData['sqfeet'],"Please Enter sqfeet","sqfeet1")) return false;
    	if(validateService.blank($scope.formData['remarks'],"Please Enter remarks","remarks1")) return false;

    	var service_details = {
	      method_name : "addAction",
	      controller_name : "DataEntry",
	      data : JSON.stringify($scope.formData)
	    };
	    
    	httpService.callWebService(service_details).then(function(data){
    		if(data)
    		{
    			$('#modal-backdrop').css('display','none');
    			validateService.displayMessage('success','Added Successfully','');
    			$state.reload();
    			tab_switch_name = 'tab_2';
    			serial_no = $scope.formData['serial_no'];

    		}
    		else
    		{
    			validateService.displayMessage('error','Insertion Failed',"");
    		}
    	})
    }

    $scope.editClick = function(data){
    	$scope.formData = {
	    	leather : data.leather,
	    	query   : data.query,
	    	pieces : parseInt(data.pieces),
	    	sqfeet : parseInt(data.sqfeet),
	    	remarks : data.remarks,
	    	serial_no_modal : parseInt(data.serial_no),
	    	date : data.date,
	    	id : data.data_entry_id
	    };

	    setTimeout(function(){
	    	$("#description1").select2().select2("val",data.description_id);
	    	$("#article1").select2().select2("val",data.article_id);
	    	$("#color1").select2().select2("val",data.color_id);
	    	$("#selection1").select2().select2("val",data.selection_id);
	    	$("#datePicker1").val(data.date);
	    },100)
	    
	    

	    $scope.modal = {
    		"title" : "Update DataEntry in "+$scope.formData['serial_no_modal'],
    		"button" : "Update"
    	};
    	$('#modal-default').modal('show');
    }

    $scope.editUpdateAction = function()
    {
    	$scope.formData['date']      = $('#datePicker1').val();
    	$scope.formData['serial_no'] = $('#serial_no_modal').val();

    	if(validateService.blank($scope.formData['date'],"Please Choose date","datePicker1")) return false;
    	if(validateService.blank($scope.formData['leather'],"Please Choose leather","leather1")) return false;
    	if(validateService.blank($scope.formData['query'],"Please Choose query","query1")) return false;
    	if(validateService.blank($scope.formData['leather'],"Please Choose leather","leather1")) return false;
    	if(validateService.blank($scope.formData['description'],"Please Choose description","description1")) return false;
    	if(validateService.blank($scope.formData['article'],"Please Choose article","article1")) return false;
    	if(validateService.blank($scope.formData['color'],"Please Choose color","color1")) return false;
    	if(validateService.blank($scope.formData['selection'],"Please Choose selection","selection1")) return false;
    	if(validateService.blank($scope.formData['pieces'],"Please Enter pieces","pieces1")) return false;
    	if(validateService.blank($scope.formData['sqfeet'],"Please Enter sqfeet","sqfeet1")) return false;
    	if(validateService.blank($scope.formData['remarks'],"Please Enter remarks","remarks1")) return false;
    	var service_details = {
	      method_name : "editAction",
	      controller_name : "DataEntry",
	      data : JSON.stringify($scope.formData)
	    };
	    
    	httpService.callWebService(service_details).then(function(data){
    		if(data)
    		{
    			$('#modal-backdrop').css('display','none');
    			validateService.displayMessage('success','Updated Successfully','');
    			$state.reload();
    			tab_switch_name = 'tab_2';
    			serial_no = $scope.formData['serial_no'];
    		}
    		else
    		{
    			validateService.displayMessage('error','Updated Failed',"");
    		}
    	})
    }

    $scope.deleteClick = function(data){
    	serial_no = data['serial_no'];
		var service_details = {
	      method_name : "deleteAction",
	      controller_name : "DataEntry",
	      data : JSON.stringify(data)
	    };

		swal({
		  title: "Are you sure?",
		  text: "Once deleted, you will not be able to recover this imaginary file!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if(willDelete){
	    	httpService.callWebService(service_details).then(function(data){
	    		if(data)
	    		{
	    			validateService.displayMessage('success','Deleted Successfully','');
	    			$state.reload();
	    			tab_switch_name = 'tab_2';
	    		}
	    		else
	    		{
	    			validateService.displayMessage('error','Failed to delete',"");
	    		}
	    	})
		  }
		});
	}

});