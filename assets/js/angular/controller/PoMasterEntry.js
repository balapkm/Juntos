var tab_switch_name = 'tab_1';
var otherTypeValue = "";
app.controller('PoMasterEntry',function($scope,httpService,validateService,$state,commonService){
	
	
	$('.modal-backdrop').css('display','none');
	$('body').removeClass('modal-open');commonService
	setTimeout(function(){
		$('body').css('padding-right','0px');
		$('#supplier_name').editableSelect();
	},1000);
	$('.select2').select2();

	$scope.showUnRegTaxComp = true;
	$('#supplier_name_select2').on('select2:select', function (e) {
		value = e.currentTarget.value.split('|');
		if(value[1] === "33")
			$scope.showGst = true;
		else
			$scope.showGst = false;
		
		$scope.showUnRegTaxComp = true;
		if(value[2] === 'UNREGISTERED')
		{
			$scope.showUnRegTaxComp = false;
		}
		$scope.$apply();
	});

	$scope.addNewMaterialNameInput = false;
	$scope.otherTypeValue = "";

	$('.select2').next('.select2').find('.select2-selection').one('focus', select2Focus).on('blur', function () {
        $(this).one('focus', select2Focus)
        $(this).closest('.select2-selection').removeClass('border-focus');
    })
	
	if(tab_switch_name === 'tab_2' || tab_switch_name === 'tab_3' || tab_switch_name === 'tab_4' || tab_switch_name === 'tab_5')
	{
		setTimeout(function(){
			$('a[href="#'+tab_switch_name+'"]').trigger('click');
			if(tab_switch_name === 'tab_5')
			{
				$scope.otherTypeValue = otherTypeValue;
				$scope.otherTypeValueChange();
			}
		},100);
	}

	setTimeout(function(){
		$scope.otherTypeValue = "GROUP";
		$scope.otherTypeValueChange();
	},500);

	$scope.changeMaterialNameDetails = function(id)
	{
		// $scope.clearRedMark(id);
		if($scope.material_form_data.material_name === 'ADD_NEW')
		{
			$scope.addNewMaterialNameInput = true;
		}
		else
		{
			$scope.addNewMaterialNameInput = false;
		}
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

	$scope.otherTypeArray = [];
	$scope.otherTypeValueShow = false;
	$scope.otherMasterModal = {
		title : "Add Other Master Details",
		button : "Add"
	}
	$scope.supplierNameSearchDetails = {};
	$scope.otherTypeValueChange = function()
	{
		$scope.otherTypeValueShow = false;
		$scope.otherTypeArray = [];
		if($scope.otherTypeValue === "")
			return false;
		var data = {
			otherTypeValue : $scope.otherTypeValue
		};
		var service_details = {
	      method_name : "getOtherMasterData",
	      controller_name : "PoMasterEntry",
	      data : JSON.stringify(data)
	    };
	    
    	httpService.callWebService(service_details).then(function(data){
    		if(data)
    		{
    			setTimeout(function(){
    				$('#other_master_id').DataTable({
    					iDisplayLength: 100
    				});
    			},100);
    			
    			$scope.otherTypeValueShow = true;
    			$scope.otherTypeArray = data;
    		}
    		else
    		{
    			validateService.displayMessage('error','Failed...',"");
    		}
    	})
	}

	$scope.addOtherMasterClick = function()
	{
		$scope.otherMasterModal = {
			title : "Add Other Master Details",
			button : "Add"
		}
		$('#other_master_modal').modal('show');
	}

	$scope.other_master_name = "";
	$scope.addOtherMasterClickAction = function()
	{
		if(validateService.blank($scope.other_master_name,"Please Enter Other Name","other_master_name")) return false;

		var data = {
			type  : $scope.otherTypeValue,
			name : $scope.other_master_name
		};
		var service_details = {
	      method_name : "addOtherMasterClickAction",
	      controller_name : "PoMasterEntry",
	      data : JSON.stringify(data)
	    };
	    
    	httpService.callWebService(service_details).then(function(data){
    		if(data)
    		{
    			$('#modal-backdrop').css('display','none');
    			validateService.displayMessage('success','Added Successfully','');
    			$state.reload();
    			tab_switch_name = 'tab_5';
    			otherTypeValue = $scope.otherTypeValue;
    		}
    		else
    		{
    			validateService.displayMessage('error','Duplicate Entry',"");
    		}
    	})
	}

	$scope.editOtherMasterClick = function(data)
	{
		$scope.other_master_name = data.name;
		$scope.other_master_id = data.other_master_id;
		$scope.other_master_type = data.type;
		$scope.otherMasterModal = {
			title : "Edit Other Master Details",
			button : "Update"
		}
		$('#other_master_modal').modal('show');
	}

	$scope.editOtherMasterClickAction = function()
	{
		if(validateService.blank($scope.other_master_name,"Please Enter Other Name","other_master_name")) return false;

		var data = {
			type  : $scope.other_master_type,
			name : $scope.other_master_name,
			other_master_id : $scope.other_master_id
		};
		var service_details = {
	      method_name : "editOtherMasterClickAction",
	      controller_name : "PoMasterEntry",
	      data : JSON.stringify(data)
	    };
	    
    	httpService.callWebService(service_details).then(function(data){
    		if(data)
    		{
    			$('#modal-backdrop').css('display','none');
    			validateService.displayMessage('success','Updated Successfully','');
    			$state.reload();
    			tab_switch_name = 'tab_5';
    			otherTypeValue = $scope.otherTypeValue;
    		}
    		else
    		{
    			validateService.displayMessage('error','Duplicate Entry...',"");
    		}
    	})
	}
	$scope.supplierNameDetailsShow  = false;
	$scope.materialNameDetailsShow  = false;
	$scope.materialMasterNameDetailsShow  = false;

	var supplier_table_dataTable_id; 
	var material_table_dataTable_id; 

	$scope.load_supplier_table = function(){
		supplier_table_dataTable_id = $('#supplier_table,#mm_table,#uom_table').DataTable({
			iDisplayLength: 100,
	        dom: 'Brfrtip',
	        buttons: [
	            'copy', 
	            'csv',
	            {
			        extend: 'excel',
			        exportOptions: {
			            columns: 'th:not(:last-child)'
			        }
		}]});
	}

	$scope.load_material_table = function(){
		material_table_dataTable_id = $('#material_table').DataTable({
			iDisplayLength: 100,
	        dom: 'Brfrtip',
	        buttons: [
	            'copy', 
	            {
			        extend: 'csv',
			        exportOptions: {
			            columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13]
			        }
			    },
	            {
			        extend: 'excel',
			        exportOptions: {
			            columns: [1,2,3,4,5,6,7,8,9,10,11,12,13]
			        }
			    }]});
	}

	setTimeout(function(){
		$scope.load_supplier_table();$scope.load_material_table();
	},500)
	
	$scope.search_supplier_name = function(){
		supplier_table_dataTable_id.destroy();
		$scope.supplierNameDetailsShow = false;
		$scope.supplierNameDetails = {};
		var service_details = {
	      method_name : "supplierNameSearchDetails",
	      controller_name : "PoMasterEntry",
	      data : JSON.stringify($scope.supplierNameSearchDetails)
	    };
	    
    	httpService.callWebService(service_details).then(function(data){
    		$scope.supplierNameDetailsShow = true;
    		$scope.supplierNameDetails  = data;
    		setTimeout(function(){$scope.load_supplier_table();},500)
    	})

	}
	$scope.materialNameSearchDetails = {};
	
	$scope.search_material_name = function(){
		material_table_dataTable_id.destroy();
		$scope.materialNameDetailsShow = false;
		$scope.materialNameDetails = {};
		var service_details = {
	      method_name : "materialNameSearchDetails",
	      controller_name : "PoMasterEntry",
	      data : JSON.stringify($scope.materialNameSearchDetails)
	    };
	    
    	httpService.callWebService(service_details).then(function(data){
    		$scope.materialNameDetailsShow = true;
    		$scope.materialNameDetails  = data;
    		setTimeout(function(){$scope.load_material_table();},500)
    	})
	}

	$scope.materialMasterNameSearchDetails = {};
	$scope.search_material_master_name = function(){
		supplier_table_dataTable_id.destroy();
		$scope.materialMasterNameDetailsShow = false;
		$scope.materialMasterNameDetails = {};
		var service_details = {
	      method_name : "materialMasterNameSearchDetails",
	      controller_name : "PoMasterEntry",
	      data : JSON.stringify($scope.materialMasterNameSearchDetails)
	    };
	    
    	httpService.callWebService(service_details).then(function(data){
    		$scope.materialMasterNameDetailsShow = true;
    		$scope.materialMasterNameDetails  = data;
    		setTimeout(function(){$scope.load_supplier_table();},500)
    	})
	}

	$scope.deleteOtherMasterClickAction = function(data){
		var service_details = {
	      method_name : "deleteOtherMasterClickAction",
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
	    			tab_switch_name = 'tab_5';
	    			otherTypeValue = $scope.otherTypeValue;
	    		}
	    		else
	    		{
	    			validateService.displayMessage('error','Failed to delete',"");
	    		}
	    	})
		  }
		});
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
		$scope.supplier_modal = {
			title : "Add Supplier Details",
			button : "Add"
		}
		$('#supplier_modal').modal('show');
	}

	$scope.showBasedOnSupplierStatus = true;
	$scope.supplierChangeInAdd = function()
	{
		if($scope.supplier_form_data.supplier_status == 'REGISTERED')
		{
			$scope.showBasedOnSupplierStatus = true;
			$scope.supplier_form_data.supplier_tax_status = 'TAX';
		}
		else
		{
			$scope.showBasedOnSupplierStatus = false;
			$scope.supplier_form_data.supplier_tax_status = 'NON_TAX';
		}
	}
	$scope.getAllMasterMaterialDetails = [];
	$scope.add_material_click = function(){
		$scope.material_modal = {
			title : "Add Material Details",
			button : "Add"
		}
		$scope.getAllMasterMaterialDetails = [];
		$scope.material_form_data.currency = "INR";
		$scope.material_form_data.discount_price_status = "PERCENTAGE";
		$scope.material_form_data.discount = 0;
		var service_details = {
	      method_name : "getAllMasterMaterialDetails",
	      controller_name : "PoMasterEntry",
	      data : JSON.stringify({})
	    };
		httpService.callWebService(service_details).then(function(data){
    		if(data)
    		{
    			$('#material_modal').modal('show');
    			
    			setTimeout(function(){$scope.getAllMasterMaterialDetails = data;$scope.$apply();$('#material_name_select2').editableSelect();},1000);
    			
    		}
    	})
		
	}

	$scope.get_all_master_material_list = function(){
		commonService.showLoader();
		setTimeout(function(){commonService.hideLoader();},30000);
		$scope.getAllMasterMaterialDetails = [];
		var service_details = {
	      method_name : "getAllMasterMaterialDetails",
	      controller_name : "PoMasterEntry",
	      data : JSON.stringify({})
	    };
		httpService.callWebService(service_details).then(function(data){
    		if(data)
    		{
    			setTimeout(function(){$scope.getAllMasterMaterialDetails = data;$scope.$apply();$('#material_name_select2').editableSelect();});
    		}
    	})
	}

	$scope.supplierEditClick = function(data){
		$scope.supplier_modal = {
			title : "Edit Supplier Details",
			button : "Update"
		}
		$('#supplier_name').val(data.supplier_name);
		$scope.supplier_form_data = data;
		$('#supplier_modal').modal('show');
	}

	$scope.materialEditClick = function(data){
		$scope.material_modal = {
			title : "Edit Material Details",
			button : "Update"
		}

		$scope.material_form_data = data;
		if(data.state_code === "33")
			$scope.showGst = true;
		else
			$scope.showGst = false;
		setTimeout(function(){
            $('#material_uom').select2().val(data.material_uom).trigger("change");
            $('#group').select2().val(data.group).trigger("change");
            $('#material_name_select2').val(data.material_master_name);
            $('#supplier_name_select2').select2().val(data.supplier_id+"|"+data.state_code+"|"+data.supplier_status).trigger("change");
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
		$scope.supplier_form_data['supplier_name'] = $('#supplier_name').val();
		if(validateService.blank($scope.supplier_form_data['supplier_name'],"Please Choose Supplier Name","supplier_name")) return false;
    	if(validateService.blank($scope.supplier_form_data['supplier_code'],"Please Choose Supplier Code","supplier_code")) return false;
    	// if(validateService.blank($scope.supplier_form_data['alt_supplier_name'],"Please Choose Supplier name","alt_supplier_name")) return false;
    	if(validateService.blank($scope.supplier_form_data['origin'],"Please enter Origin","origin")) return false;
    	// if(validateService.blank($scope.supplier_form_data['contact_no'],"Please enter contact no","contact_no")) return false;
    	// if(validateService.blank($scope.supplier_form_data['email_id'],"Please enter email id","email_id")) return false;
    	// if(validateService.blank($scope.supplier_form_data['gst_no'],"Please enter GST no","gst_no")) return false;
    	// if(validateService.blank($scope.supplier_form_data['state_code'],"Please enter state code","state_code")) return false;
    	// if(validateService.blank($scope.supplier_form_data['supplier_tax_status'],"Please enter supplier tax status","supplier_tax_status")) return false;
    	if(validateService.blank($scope.supplier_form_data['supplier_status'],"Please Choose supplier status","supplier_status")) return false;
    	if(validateService.blank($scope.supplier_form_data['supplier_address'],"Please enter supplier addresss","supplier_address")) return false;
    	// if(validateService.blank($scope.supplier_form_data['alt_supplier_address'],"Please Enter remarks","alt_supplier_address")) return false;

    	if($scope.supplier_form_data['supplier_status'] === 'REGISTERED')
    	{
    		if(validateService.blank($scope.supplier_form_data['gst_no'],"Please enter GST no","gst_no")) return false;
    		if(validateService.blank($scope.supplier_form_data['state_code'],"Please enter state code","state_code")) return false;
    		if(validateService.blank($scope.supplier_form_data['supplier_tax_status'],"Please enter supplier tax status","supplier_tax_status")) return false;
    	}
    	
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
		$scope.supplier_form_data['supplier_name'] = $('#supplier_name').val();
		if(validateService.blank($scope.supplier_form_data['supplier_name'],"Please Enter Supplier Name","supplier_name")) return false;
    	if(validateService.blank($scope.supplier_form_data['supplier_code'],"Please Choose Supplier Code","supplier_code")) return false;
    	// if(validateService.blank($scope.supplier_form_data['alt_supplier_name'],"Please Choose Supplier name","alt_supplier_name")) return false;
    	if(validateService.blank($scope.supplier_form_data['origin'],"Please enter Origin","origin")) return false;
    	// if(validateService.blank($scope.supplier_form_data['contact_no'],"Please enter contact no","contact_no")) return false;
    	// if(validateService.blank($scope.supplier_form_data['email_id'],"Please enter email id","email_id")) return false;
    	// if(validateService.blank($scope.supplier_form_data['gst_no'],"Please enter GST no","gst_no")) return false;
    	// if(validateService.blank($scope.supplier_form_data['state_code'],"Please enter state code","state_code")) return false;
    	// if(validateService.blank($scope.supplier_form_data['supplier_tax_status'],"Please enter supplier tax status","supplier_tax_status")) return false;
    	if(validateService.blank($scope.supplier_form_data['supplier_status'],"Please Choose supplier status","supplier_status")) return false;
    	if(validateService.blank($scope.supplier_form_data['supplier_address'],"Please enter supplier addresss","supplier_address")) return false;
    	// if(validateService.blank($scope.supplier_form_data['alt_supplier_address'],"Please Enter remarks","alt_supplier_address")) return false;

    	if($scope.supplier_form_data['supplier_status'] === 'REGISTERED')
    	{
    		if(validateService.blank($scope.supplier_form_data['gst_no'],"Please enter GST no","gst_no")) return false;
    		if(validateService.blank($scope.supplier_form_data['state_code'],"Please enter state code","state_code")) return false;
    		if(validateService.blank($scope.supplier_form_data['supplier_tax_status'],"Please enter supplier tax status","supplier_tax_status")) return false;
    	}

    	if($scope.supplier_form_data['payment_type'] === 'OTHER')
    	{
    		$scope.supplier_form_data['payment_type'] = $scope.supplier_form_data['other_payment_type'];
    		delete $scope.supplier_form_data['other_payment_type'];
    	}
    	
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
		$scope.material_form_data['material_name'] = $('#material_name_select2').val().toUpperCase();
		if(validateService.blank($scope.material_form_data['supplier_id'],"Please Choose supplier name","supplier_name_select2")) return false;
		if(validateService.blank($scope.material_form_data['material_name'],"Please Choose Material Name","material_name")) return false;
    	
    	var supplier_id = $scope.material_form_data['supplier_id'].split('|');
    	if(supplier_id[2] === "REGISTERED")
    	{
    		if(validateService.blank($scope.material_form_data['material_hsn_code'],"Please enter material hsn code","material_hsn_code")) return false;
    	}

    	/*if($scope.material_form_data['material_name'] === 'ADD_NEW')
    	{
    		if(validateService.blank($scope.material_form_data['add_material_name'],"Please Enter Material Name","add_material_name")) return false;
    	}*/
    	if($scope.material_form_data['currency'] === 'OTHERS')
    	{
    		$scope.material_form_data['currency'] = $scope.material_form_data['add_currency'];
    		delete $scope.material_form_data['add_currency'];
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
    		if(data.insert_condition)
    		{
    			swal({
				  title: "Do you want add more?",
				  text: "Same data will retain..",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if(!willDelete){
				  	$scope.material_reset();
	    			$('#modal-backdrop').css('display','none');
	    			validateService.displayMessage('success','Added Successfully','');
	    			$state.reload();
	    			tab_switch_name = 'tab_2';
				  }
				  else
				  {
				  	if(data.newMaterial)
				  	{
				  		$('#material_name_select2').val("");
				  		$('#material_name_add ul').append('<li value="'+data.material_name+'|'+data.material_id+'" class="es-visible">'+data.material_name+'</li>');
				  	}
				  	$scope.material_form_data['material_name'] = "";
				  	$scope.material_form_data['price'] = "";
				  	$scope.$apply();
				  }
				});
    			
    		}
    		else
    		{
    			$scope.material_form_data['discount'] = 0;
    			validateService.displayMessage('error','This material already exist for this supplier / Duplicate Entry of Material Master',"");
    		}
    	})
	}
	
	$scope.update_material_action = function(){
		$scope.material_form_data['material_name'] = $('#material_name_select2').val().toUpperCase();
		if(validateService.blank($scope.material_form_data['supplier_id'],"Please Choose supplier name","supplier_name_select2")) return false;
		if(validateService.blank($scope.material_form_data['material_name'],"Please Choose Material Name","material_name")) return false;

    	delete $scope.material_form_data['$$hashKey'];
    	console.log($scope.material_form_data);
    	var supplier_id = $scope.material_form_data['supplier_id'].split('|');
    	if(supplier_id[2] === "REGISTERED")
    	{
    		if(validateService.blank($scope.material_form_data['material_hsn_code'],"Please enter material hsn code","material_hsn_code")) return false;
    	}

    	if($scope.material_form_data['material_name'] === 'ADD_NEW')
    	{
    		if(validateService.blank($scope.material_form_data['add_material_name'],"Please Enter Material Name","add_material_name")) return false;
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