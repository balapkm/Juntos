var tab_switch_name = 'tab_1';
var serial_no = null;
function select2Focus() {
    $(this).closest('.select2').prev('select').select2('open');
    $(this).closest('.select2-selection').addClass('border-focus');
}

app.controller('DataEntry',function($scope,validateService,httpService,$state,commonService){

	$('#example2,#example3').DataTable();
	$('.select2').select2();
    var yearDate = new Date();

    $('.select2').next('.select2').find('.select2-selection').one('focus', select2Focus).on('blur', function () {
        $(this).one('focus', select2Focus)
        $(this).closest('.select2-selection').removeClass('border-focus');
    })

	$('#datePicker,#datePicker1').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
      todayHighlight : true,
      /*startDate : new Date(yearDate.getFullYear()+'-01-01'),
      endDate : new Date(yearDate.getFullYear()+'-12-31')*/
    });



    $('#datePicker3').datepicker({
        autoclose: true,
        format: " yyyy", // Notice the Extra space at the beginning
        viewMode: "years", 
        minViewMode: "years"
    });

    $('#datePicker3').val(yearDate.getFullYear());
    $('#datePicker').val(yearDate.getFullYear()+'-'+(yearDate.getMonth()+1)+'-'+yearDate.getDate());
    $scope.formData = {};
    $('.content-wrapper').css('background-color','#ecf0f5');
    $('.modal-backdrop').css('display','none');
	$('body').removeClass('modal-open');

	// $("body").niceScroll();
 //    $("body").getNiceScroll().resize();

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

    $scope.addClick = function()
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
            serial_no : "",
            date : ""
        };
        setTimeout(function(){
            $("#serial_no_1").select2().select2("val","");
        })
    }

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
				  title: "Do you want add more data for this serial_no?",
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
                        serial_no : $('#serial_no').val(),
				    	article : "",
				    	color : "",
				    	selection : "",
				    	pieces : "",
				    	sqfeet : "",
				    	remarks : "",
				    	date : $('#datePicker').val()
				    };
                    var yearDate = new Date();
                    setTimeout(function(){
                        $('#datePicker').val(yearDate.getFullYear()+'-'+(yearDate.getMonth()+1)+'-'+yearDate.getDate());
                        $("#description").select2().select2("val","");
                        $("#article").select2().select2("val","");
                        $("#color").select2().select2("val","");
                        $("#selection").select2().select2("val","");
                        $('.select2').next('.select2').find('.select2-selection').one('focus', select2Focus).on('blur', function () {
                            $(this).one('focus', select2Focus)
                            $(this).closest('.select2-selection').removeClass('border-focus');
                        });
                    },100);
				    $scope.$apply();
                    var service_details = {
                      method_name : "getAddTableData",
                      controller_name : "DataEntry",
                      data : JSON.stringify($scope.formData)
                    };
                    
                    httpService.callWebService(service_details).then(function(data){
                        $("#addTableData").html(data);
                        setTimeout(function(){
                            $('#example3').DataTable();
                        },50);
                    });
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
        $scope.formData['yearData'] = $('#datePicker3').val();
    	$scope.searchData = [];
    	$scope.showTable  = false;
        if(validateService.blank($scope.formData['serial_no_1'],"Please Choose serial no","serial_no_1")) return false;
    	if(validateService.blank($scope.formData['yearData'],"Please Choose year","datePicker3")) return false;

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
	    	pieces : (data.pieces),
	    	sqfeet : (data.sqfeet),
	    	remarks : data.remarks,
	    	serial_no_modal : parseInt(data.serial_no),
	    	date : data.date,
	    	id : data.data_entry_id
	    };

        

	    setTimeout(function(){
            $('#description1').select2().val(data.description_id).trigger("change");
            $('#article1').select2().val(data.article_id).trigger("change");
            $('#color1').select2().val(data.color_id).trigger("change");
            $('#selection1').select2().val(data.selection_id).trigger("change");
	    	$("#datePicker1").val(data.date);

            $('.select2').next('.select2').find('.select2-selection').one('focus', select2Focus).on('blur', function () {
                $(this).one('focus', select2Focus);
                $(this).closest('.select2-selection').removeClass('border-focus');
            });
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