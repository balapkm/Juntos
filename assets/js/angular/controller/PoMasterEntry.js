app.controller('PoMasterEntry',function($scope,httpService,validateService,$state){
	$('#supplier_table,#material_table').DataTable();
	$('.modal-backdrop').css('display','none');
	$('body').removeClass('modal-open');
	$('.select2').select2();
	
	$('#supplier_name_select2').on('select2:select', function (e) {
		value = e.currentTarget.value.split('|');
		if(value[1] === "22")
			$scope.showGst = false;
		else
			$scope.showGst = true;
		$scope.$apply();
	});

	$scope.reset();
	$scope.material_reset();
	$scope.showGst = true;
	$scope.supplier_form_data = {};
	$scope.material_form_data = {};


	$scope.supplier_modal = {
		title : "Add Supplier Details",
		button : "Add"
	}
	$scope.material_modal = {
		title : "Add Material Details",
		button : "Add"
	}

	$scope.reset = function()
	{
		$scope.supplier_form_data = {
			supplier_name : "",
			supplier_code : "",
			alt_supplier_name : "",
			origin : "",
			contact_no : "",
			email_id : "",
			gst_no : "",
			state_code : "",
			supplier_tax_status : "",
			supplier_address : "",
			alt_supplier_address : ""
		};
	}

	$scope.material_reset = function()
	{
		$scope.material_form_data = {
			supplier_id : "",
			material_name : "",
			group : "",
			material_hsn_code : "",
			material_uom : "",
			currency : "",
			price_status : "",
			price : "",
			CGST : "",
			SGST : "",
			IGST : ""
			discount : ""
		};
	}

	$scope.add_supplier = function(){
		$('#supplier_modal').modal('show');
	}

	$scope.add_material_action = function(){
		$('#material_modal').modal('show');
	}

	$scope.supplierEditClick = function(data){
		$scope.supplier_modal = {
			title : "Edit Supplier Details",
			button : "Update"
		}
		$scope.supplier_form_data = data;
		$('#supplier_modal').modal('show');
	}

	$scope.supplierDeleteClick = function(data){
		$scope.supplier_form_data = data;
		var service_details = {
	      method_name : "deleteSupplierAction",
	      controller_name : "PoMasterEntry",
	      data : JSON.stringify($scope.supplier_form_data)
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
	    		}
	    		else
	    		{
	    			validateService.displayMessage('error','Failed to delete',"");
	    		}
	    	})
		  }
		});
	}

	$scope.update_supplier_action = function(){
		var service_details = {
	      method_name : "updateSupplierAction",
	      controller_name : "PoMasterEntry",
	      data : JSON.stringify($scope.supplier_form_data)
	    };
	    
    	httpService.callWebService(service_details).then(function(data){
    		if(data)
    		{
    			$scope.reset();
    			$('#modal-backdrop').css('display','none');
    			validateService.displayMessage('success','Updated Successfully','');
    			$state.reload();
    		}
    		else
    		{
    			validateService.displayMessage('error','Failed...',"");
    		}
    	})
	}

	$scope.add_supplier_action = function(){
		var service_details = {
	      method_name : "addSupplierAction",
	      controller_name : "PoMasterEntry",
	      data : JSON.stringify($scope.supplier_form_data)
	    };
	    
    	httpService.callWebService(service_details).then(function(data){
    		if(data)
    		{
    			$scope.reset();
    			$('#modal-backdrop').css('display','none');
    			validateService.displayMessage('success','Added Successfully','');
    			$state.reload();
    		}
    		else
    		{
    			validateService.displayMessage('error','Failed...',"");
    		}
    	})
	}
	
});

function supplierEditClick(data)
{
	var scope = angular.element($('[ui-view=div1]')).scope();
	scope.supplierEditClick(data);
	scope.$apply();
}

function supplierDeleteClick(data)
{
	var scope = angular.element($('[ui-view=div1]')).scope();
	scope.supplierDeleteClick(data);
	scope.$apply();
}