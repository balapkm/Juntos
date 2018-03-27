var tab_switch_name = 'tab_1';
app.controller('PoMasterEntry',function($scope,httpService,validateService,$state){
	$('#supplier_table,#material_table').DataTable();
	$('.modal-backdrop').css('display','none');
	$('body').removeClass('modal-open');
	$('.select2').select2();
	
	$('#supplier_name_select2').on('select2:select', function (e) {
		value = e.currentTarget.value.split('|');
		if(value[1] === "33")
			$scope.showGst = true;
		else
			$scope.showGst = false;
		$scope.$apply();
	});

	$('.select2').next('.select2').find('.select2-selection').one('focus', select2Focus).on('blur', function () {
        $(this).one('focus', select2Focus)
        $(this).closest('.select2-selection').removeClass('border-focus');
    })
	
	if(tab_switch_name === 'tab_2' || tab_switch_name === 'tab_3' || tab_switch_name === 'tab_4')
	{
		setTimeout(function(){
			$('a[href="#'+tab_switch_name+'"]').trigger('click');
		},100);
	}


	$scope.showGst = true;
	$scope.uof_name = "";
	
	$scope.clearRedMark = function(id)
    {
    	$("#"+id).parent('div').removeClass('has-error');
    }
    
	$scope.supplier_modal = {
		title : "Add Supplier Details",
		button : "Add"
	}
	$scope.material_modal = {
		title : "Add Material Details",
		button : "Add"
	}
	$scope.uof_modal = {
		title : "Add Uof Details",
		button : "Add"
	}

	$scope.reset = function()
	{
		$scope.supplier_form_data = {};
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
			supplier_status : "",
			supplier_address : "",
			alt_supplier_address : "",
			bank_details : ""
		};
	}

	$scope.material_reset = function()
	{
		$scope.material_form_data = {};
		$scope.material_form_data = {
			material_name : "",
			supplier_id : "",
			group : "",
			material_hsn_code : "",
			material_uom : "",
			currency : "INR",
			price_status : "",
			price : "",
			CGST : "",
			SGST : "",
			IGST : "",
			discount_price_status:"",
			discount : ""
		};
	}

	$scope.reset();
	$scope.material_reset();

	$scope.add_supplier = function(){
		$('#supplier_modal').modal('show');
	}

	$scope.add_material_click = function(){
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

	$scope.materialEditClick = function(data){
		$scope.material_modal = {
			title : "Edit Material Details",
			button : "Update"
		}
		$scope.material_form_data = data;

		if(data.state_code === "22")
			$scope.showGst = false;
		else
			$scope.showGst = true;

		setTimeout(function(){
            $('#material_uom').select2().val(data.material_uom).trigger("change");
            $('#supplier_name_select2').select2().val(data.supplier_id+"|"+data.state_code).trigger("change");
	    },100);
		$('#material_modal').modal('show');
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
	    			tab_switch_name = 'tab_1';
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
		if(validateService.blank($scope.supplier_form_data['supplier_name'],"Please Choose Supplier Name","supplier_name")) return false;
    	if(validateService.blank($scope.supplier_form_data['supplier_code'],"Please Choose Supplier Code","supplier_code")) return false;
    	// if(validateService.blank($scope.supplier_form_data['alt_supplier_name'],"Please Choose Supplier name","alt_supplier_name")) return false;
    	if(validateService.blank($scope.supplier_form_data['origin'],"Please enter Origin","origin")) return false;
    	// if(validateService.blank($scope.supplier_form_data['contact_no'],"Please enter contact no","contact_no")) return false;
    	// if(validateService.blank($scope.supplier_form_data['email_id'],"Please enter email id","email_id")) return false;
    	// if(validateService.blank($scope.supplier_form_data['gst_no'],"Please enter GST no","gst_no")) return false;
    	if(validateService.blank($scope.supplier_form_data['state_code'],"Please enter state code","state_code")) return false;
    	if(validateService.blank($scope.supplier_form_data['supplier_tax_status'],"Please enter supplier tax status","supplier_tax_status")) return false;
    	if(validateService.blank($scope.supplier_form_data['supplier_status'],"Please Choose supplier status","supplier_status")) return false;
    	if(validateService.blank($scope.supplier_form_data['supplier_address'],"Please enter supplier addresss","supplier_address")) return false;
    	// if(validateService.blank($scope.supplier_form_data['alt_supplier_address'],"Please Enter remarks","alt_supplier_address")) return false;
    	$scope.supplier_form_data = validateService.changeAllUpperCase($scope.supplier_form_data);
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
    			tab_switch_name = 'tab_1';
    		}
    		else
    		{
    			validateService.displayMessage('error','Failed...',"");
    		}
    	})
	}

	$scope.add_supplier_action = function(){

		if(validateService.blank($scope.supplier_form_data['supplier_name'],"Please Choose Supplier Name","supplier_name")) return false;
    	if(validateService.blank($scope.supplier_form_data['supplier_code'],"Please Choose Supplier Code","supplier_code")) return false;
    	// if(validateService.blank($scope.supplier_form_data['alt_supplier_name'],"Please Choose Supplier name","alt_supplier_name")) return false;
    	if(validateService.blank($scope.supplier_form_data['origin'],"Please enter Origin","origin")) return false;
    	// if(validateService.blank($scope.supplier_form_data['contact_no'],"Please enter contact no","contact_no")) return false;
    	// if(validateService.blank($scope.supplier_form_data['email_id'],"Please enter email id","email_id")) return false;
    	// if(validateService.blank($scope.supplier_form_data['gst_no'],"Please enter GST no","gst_no")) return false;
    	if(validateService.blank($scope.supplier_form_data['state_code'],"Please enter state code","state_code")) return false;
    	if(validateService.blank($scope.supplier_form_data['supplier_tax_status'],"Please enter supplier tax status","supplier_tax_status")) return false;
    	if(validateService.blank($scope.supplier_form_data['supplier_status'],"Please Choose supplier status","supplier_status")) return false;
    	if(validateService.blank($scope.supplier_form_data['supplier_address'],"Please enter supplier addresss","supplier_address")) return false;
    	// if(validateService.blank($scope.supplier_form_data['alt_supplier_address'],"Please Enter remarks","alt_supplier_address")) return false;

    	$scope.supplier_form_data = validateService.changeAllUpperCase($scope.supplier_form_data);
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
    			tab_switch_name = 'tab_1';
    		}
    		else
    		{
    			validateService.displayMessage('error','Failed...Duplicate Entry',"");
    		}
    	})
	}

	$scope.addUof = function()
	{
		$('#add_uof_modal').modal('show');
	}

	$scope.material_master_name      = "";
	$scope.add_material_master_modal = {
		button : "Add",
		title : "Add Material Master"
	}
	$scope.addMaterialMaster = function()
	{
		$('#add_material_master_modal').modal('show');
	}

	$scope.addMaterialMasterAction = function()
	{
		if(validateService.blank($scope.material_master_name,"Please Enter Material name","material_master_name")) return false;

		var data = {
			material_name : $scope.material_master_name.toUpperCase()
		}
		var service_details = {
	      method_name : "addMaterialMasterAction",
	      controller_name : "PoMasterEntry",
	      data : JSON.stringify(data)
	    };
    	httpService.callWebService(service_details).then(function(data){
    		if(data)
    		{
    			$scope.material_reset();
    			$('#modal-backdrop').css('display','none');
    			validateService.displayMessage('success','Added Successfully','');
    			$state.reload();
    			tab_switch_name = 'tab_4';
    		}
    		else
    		{
    			validateService.displayMessage('error','This material already exist..',"");
    		}
    	})
	}

	$scope.addUofAction = function()
	{
		if(validateService.blank($scope.uof_name,"Please Enter Uof name","uof_name")) return false;

		var data = {
			uof_name : $scope.uof_name.toUpperCase()
		}
		var service_details = {
	      method_name : "addUofAction",
	      controller_name : "PoMasterEntry",
	      data : JSON.stringify(data)
	    };
    	httpService.callWebService(service_details).then(function(data){
    		if(data)
    		{
    			$scope.material_reset();
    			$('#modal-backdrop').css('display','none');
    			validateService.displayMessage('success','Added Successfully','');
    			$state.reload();
    			tab_switch_name = 'tab_3';
    		}
    		else
    		{
    			validateService.displayMessage('error','Duplicate',"");
    		}
    	})
	}

	$scope.materialMasterEditClick = function(data)
	{
		$scope.material_master_name = data.material_name;

		$scope.add_material_master_modal = {
			title : "Update Material Details",
			button : "Update",
			material_id : data.material_id
		}
		$('#add_material_master_modal').modal('show');
	}

	$scope.uofEditClick = function(data)
	{
		$scope.uof_name = data.uof_name;

		$scope.uof_modal = {
			title : "Update Uof Details",
			button : "Update",
			uof_id : data.uof_id
		}
		$('#add_uof_modal').modal('show');
	}

	$scope.uofEditClickAction = function()
	{
		if(validateService.blank($scope.uof_name,"Please Enter Uof name","uof_name")) return false;

		var data = {
			uof_name : $scope.uof_name.toUpperCase(),
			uof_id : $scope.uof_modal.uof_id
		}
		var service_details = {
	      method_name : "updateUofAction",
	      controller_name : "PoMasterEntry",
	      data : JSON.stringify(data)
	    };
    	httpService.callWebService(service_details).then(function(data){
    		if(data)
    		{
    			$scope.material_reset();
    			$('#modal-backdrop').css('display','none');
    			validateService.displayMessage('success','Updated Successfully','');
    			$state.reload();
    			tab_switch_name = 'tab_3';
    		}
    		else
    		{
    			validateService.displayMessage('error','This material already exist for this supplier',"");
    		}
    	})
	}

	$scope.materialMasterEditClickAction = function()
	{
		if(validateService.blank($scope.material_master_name,"Please Enter Material name","material_master_name")) return false;

		var data = {
			material_name : $scope.material_master_name.toUpperCase(),
			material_id : $scope.add_material_master_modal.material_id
		}
		var service_details = {
	      method_name : "updateMaterialMasterAction",
	      controller_name : "PoMasterEntry",
	      data : JSON.stringify(data)
	    };
    	httpService.callWebService(service_details).then(function(data){
    		if(data)
    		{
    			$scope.material_reset();
    			$('#modal-backdrop').css('display','none');
    			validateService.displayMessage('success','Updated Successfully','');
    			$state.reload();
    			tab_switch_name = 'tab_4';
    		}
    		else
    		{
    			validateService.displayMessage('error','This material already exist ',"");
    		}
    	})
	}

	// function to add supplier data 
	$scope.add_material_action = function(){

		if(validateService.blank($scope.material_form_data['supplier_id'],"Please Choose supplier name","supplier_name_select2")) return false;
		if(validateService.blank($scope.material_form_data['material_name'],"Please Choose Material Name","material_name")) return false;
    	
    	var supplier_id = $scope.material_form_data['supplier_id'].split('|');
    	if(supplier_id[2] === "REGISTERED")
    	{
    		if(validateService.blank($scope.material_form_data['material_hsn_code'],"Please enter material hsn code","material_hsn_code")) return false;
    	}
    	if(validateService.blank($scope.material_form_data['currency'],"Please enter currency","currency")) return false;
    	if(validateService.blank($scope.material_form_data['group'],"Please Choose Group","group")) return false;
    	if(validateService.blank($scope.material_form_data['material_uom'],"Please enter material uom","material_uom")) return false;
    	if(validateService.blank($scope.material_form_data['price_status'],"Please Choose price status","price_status")) return false;
    	if(validateService.blank($scope.material_form_data['price'],"Please enter price","price")) return false;
    	if(validateService.blank($scope.material_form_data['discount_price_status'],"Please enter discount price status","discount_price_status")) return false;
    	if(validateService.blank($scope.material_form_data['discount'],"Please enter discount","discount")) return false;

    	$scope.material_form_data = validateService.changeAllUpperCase($scope.material_form_data);
		var service_details = {
	      method_name : "addMaterialAction",
	      controller_name : "PoMasterEntry",
	      data : JSON.stringify($scope.material_form_data)
	    };
    	httpService.callWebService(service_details).then(function(data){
    		if(data)
    		{
    			$scope.material_reset();
    			$('#modal-backdrop').css('display','none');
    			validateService.displayMessage('success','Added Successfully','');
    			$state.reload();
    			tab_switch_name = 'tab_2';
    		}
    		else
    		{
    			validateService.displayMessage('error','This material already exist for this supplier',"");
    		}
    	})
	}
	
	$scope.update_material_action = function(){

		if(validateService.blank($scope.material_form_data['supplier_id'],"Please Choose supplier name","supplier_name_select2")) return false;
		if(validateService.blank($scope.material_form_data['material_name'],"Please Choose Material Name","material_name")) return false;
    	if(validateService.blank($scope.material_form_data['material_hsn_code'],"Please enter material hsn code","material_hsn_code")) return false;
    	if(validateService.blank($scope.material_form_data['currency'],"Please enter currency","currency")) return false;
    	if(validateService.blank($scope.material_form_data['group'],"Please Choose Group","group")) return false;
    	if(validateService.blank($scope.material_form_data['material_uom'],"Please enter material uom","material_uom")) return false;
    	if(validateService.blank($scope.material_form_data['price_status'],"Please Choose price status","price_status")) return false;
    	if(validateService.blank($scope.material_form_data['price'],"Please enter price","price")) return false;
    	if(validateService.blank($scope.material_form_data['discount_price_status'],"Please enter discount price status","discount_price_status")) return false;
    	if(validateService.blank($scope.material_form_data['discount'],"Please enter discount","discount")) return false;

    	$scope.material_form_data = validateService.changeAllUpperCase($scope.material_form_data);
		var service_details = {
	      method_name : "updateMaterialAction",
	      controller_name : "PoMasterEntry",
	      data : JSON.stringify($scope.material_form_data)
	    };
	    
    	httpService.callWebService(service_details).then(function(data){
    		if(data)
    		{
    			$scope.material_reset();
    			$('#modal-backdrop').css('display','none');
    			validateService.displayMessage('success','Updated Successfully','');
    			$state.reload();
    			tab_switch_name = 'tab_2';
    		}
    		else
    		{
    			validateService.displayMessage('error','Failed...Duplicate Entry',"");
    		}
    	})
	}

	$scope.materialDeleteClick = function(data){
		$scope.supplier_form_data = data;
		var service_details = {
	      method_name : "deleteMaterialAction",
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

	$scope.uofDeleteClick = function(data){
		var service_details = {
	      method_name : "deleteUofAction",
	      controller_name : "PoMasterEntry",
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
	    			tab_switch_name = 'tab_3';
	    		}
	    		else
	    		{
	    			validateService.displayMessage('error','Failed to delete',"");
	    		}
	    	})
		  }
		});
	}

	$scope.materialMasterDeleteClick = function(data){
		var service_details = {
	      method_name : "deleteMaterialMasterAction",
	      controller_name : "PoMasterEntry",
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
	    			tab_switch_name = 'tab_4';
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

function supplierEditClick(data)
{
	var scope = angular.element($('[ui-view=div1]')).scope();
	scope.supplierEditClick(data);
	scope.$apply();
}

function materialEditClick(data)
{
	var scope = angular.element($('[ui-view=div1]')).scope();
	scope.materialEditClick(data);
	scope.$apply();
}

function supplierDeleteClick(data)
{
	var scope = angular.element($('[ui-view=div1]')).scope();
	scope.supplierDeleteClick(data);
	scope.$apply();
}

function materialDeleteClick(data)
{
	var scope = angular.element($('[ui-view=div1]')).scope();
	scope.materialDeleteClick(data);
	scope.$apply();
}

function uofEditClick(data)
{
	var scope = angular.element($('[ui-view=div1]')).scope();
	scope.uofEditClick(data);
	scope.$apply();
}

function uofDeleteClick(data)
{
	var scope = angular.element($('[ui-view=div1]')).scope();
	scope.uofDeleteClick(data);
	scope.$apply();
}

function materialMasterEditClick(data)
{
	var scope = angular.element($('[ui-view=div1]')).scope();
	scope.materialMasterEditClick(data);
	scope.$apply();
}

function materialMasterDeleteClick(data)
{
	var scope = angular.element($('[ui-view=div1]')).scope();
	scope.materialMasterDeleteClick(data);
	scope.$apply();
}