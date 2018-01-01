var tab_switch_name = 'tab_1';
app.controller('MasterEntry',function($scope,httpService,validateService,$state){
	$('#table1,#table2,#table3,#table4').DataTable();
	$('.modal-backdrop').css('display','none');
	$('body').removeClass('modal-open');

	// $("body").niceScroll();
 //    $("body").getNiceScroll().resize();

	setTimeout(function(){
		$('a[href="#'+tab_switch_name+'"]').trigger('click');
	},100);
	$('.content-wrapper').css('background-color','#ecf0f5');

	$scope.formData = {
		field1 : ""
	};
	$scope.modal    = {};

	$scope.addClick = function(tab_name){
		if(tab_name === 'Description')
		{
			$scope.modal = {
				title : "Add New Description",
				field_name : "Enter Description",
				button : "Add",
				tab_name : "Description"
			}
			$scope.formData = {};
		}
		if(tab_name === 'Article')
		{
			$scope.modal = {
				title : "Add New Article",
				field_name : "Enter Article",
				button : "Add",
				tab_name : "Article"
			}
			$scope.formData = {};
		}
		if(tab_name === 'Selection')
		{
			$scope.modal = {
				title : "Add New Selection",
				field_name : "Enter Selection",
				button : "Add",
				tab_name : "Selection"
			}
			$scope.formData = {};
		}
		if(tab_name === 'Color')
		{
			$scope.modal = {
				title : "Add New Color",
				field_name : "Enter Color",
				button : "Add",
				tab_name : "Color"
			}
			$scope.formData = {};
		}
		$('#modal-default').modal('show');
	}

	$scope.addAction = function(tab_name){

		$scope.formData.tab_name = tab_name;

		if(tab_name === 'Description')
		{
			$scope.formData.column_name = 'description_name';
			$scope.formData.table_name  = 'description_details';
			tab_switch_name = 'tab_1';
		}

		if(tab_name === 'Article')
		{
			$scope.formData.column_name = 'article_name';
			$scope.formData.table_name  = 'article_details';
			tab_switch_name = 'tab_2';
		}

		if(tab_name === 'Selection')
		{
			$scope.formData.column_name = 'selection_name';
			$scope.formData.table_name  = 'selection_details';
			tab_switch_name = 'tab_3';
		}

		if(tab_name === 'Color')
		{
			$scope.formData.column_name = 'color_name';
			$scope.formData.table_name  = 'color_details';
			tab_switch_name = 'tab_4';
		}

		if(validateService.blank($scope.formData['field1'],"Please Enter some Value","field1")) return false;

		var service_details = {
	      method_name : "addAction",
	      controller_name : "MasterEntry",
	      data : JSON.stringify($scope.formData)
	    };
	    
    	httpService.callWebService(service_details).then(function(data){
    		if(data)
    		{
    			$('#modal-backdrop').css('display','none');
    			validateService.displayMessage('success','Added Successfully','');
    			$state.reload();
    		}
    		else
    		{
    			validateService.displayMessage('error','Duplicate Entry',"");
    		}
    	})
	}

	$scope.editClick = function(tab_name,value,id){
		if(tab_name === 'Description')
		{
			$scope.modal = {
				title : "Edit Description",
				field_name : "Enter Description",
				button : "Update",
				tab_name : "Description"
			}
		}

		$scope.formData = {
			field1 : value,
			field2 : id
		}

		if(tab_name === 'Article')
		{
			$scope.modal = {
				title : "Edit Article",
				field_name : "Enter Article",
				button : "Update",
				tab_name : "Article"
			}
		}

		if(tab_name === 'Selection')
		{
			$scope.modal = {
				title : "Edit Selection",
				field_name : "Enter Selection",
				button : "Update",
				tab_name : "Selection"
			}
		}

		if(tab_name === 'Color')
		{
			$scope.modal = {
				title : "Edit Color",
				field_name : "Enter Color",
				button : "Update",
				tab_name : "Color"
			}
		}
		$('#modal-default').modal('show');
	}

	$scope.deleteClick = function(tab_name,id){
		if(tab_name === 'Description')
		{
			$scope.formData.field1      = id;
			$scope.formData.column_id   = 'description_id';
			$scope.formData.table_name  = 'description_details';
			tab_switch_name = 'tab_1';
		}

		if(tab_name === 'Article')
		{
			$scope.formData.field1      = id;
			$scope.formData.column_id   = 'article_id';
			$scope.formData.table_name  = 'article_details';
			tab_switch_name = 'tab_2';
		}

		if(tab_name === 'Selection')
		{
			$scope.formData.field1      = id;
			$scope.formData.column_id   = 'selection_id';
			$scope.formData.table_name  = 'selection_details';
			tab_switch_name = 'tab_3';
		}

		if(tab_name === 'Color')
		{
			$scope.formData.field1      = id;
			$scope.formData.column_id   = 'color_id';
			$scope.formData.table_name  = 'color_details';
			tab_switch_name = 'tab_4';
		}

		var service_details = {
	      method_name : "deleteAction",
	      controller_name : "MasterEntry",
	      data : JSON.stringify($scope.formData)
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

	$scope.editAction = function(tab_name){
		$scope.formData.tab_name = tab_name;

		if(tab_name === 'Description')
		{
			$scope.formData.column_name = 'description_name';
			$scope.formData.column_id   = 'description_id';
			$scope.formData.table_name  = 'description_details';
			tab_switch_name = 'tab_1';
		}

		if(tab_name === 'Article')
		{
			$scope.formData.column_name = 'article_name';
			$scope.formData.column_id   = 'article_id';
			$scope.formData.table_name  = 'article_details';
			tab_switch_name = 'tab_2';
		}

		if(tab_name === 'Selection')
		{
			$scope.formData.column_name = 'selection_name';
			$scope.formData.column_id   = 'selection_id';
			$scope.formData.table_name  = 'selection_details';
			tab_switch_name = 'tab_3';
		}

		if(tab_name === 'Color')
		{
			$scope.formData.column_name = 'color_name';
			$scope.formData.column_id   = 'color_id';
			$scope.formData.table_name  = 'color_details';
			tab_switch_name = 'tab_4';
		}

		if(validateService.blank($scope.formData['field1'],"Please Enter some Value","field1")) return false;

		var service_details = {
	      method_name : "editAction",
	      controller_name : "MasterEntry",
	      data : JSON.stringify($scope.formData)
	    };
	    
    	httpService.callWebService(service_details).then(function(data){
    		if(data)
    		{
    			$('#modal-backdrop').css('display','none');
    			validateService.displayMessage('success','Updated Successfully','');
    			$state.reload();
    		}
    		else
    		{
    			validateService.displayMessage('error','Failed to update',"");
    		}
    	})
	}
});

function editClick(tab_name,value,id)
{
	var scope = angular.element($('[ui-view=div1]')).scope();
	scope.editClick(tab_name,value,id);
	scope.$apply();
}

function deleteClick(tab_name,id)
{
	var scope = angular.element($('[ui-view=div1]')).scope();
	scope.deleteClick(tab_name,id);
	scope.$apply();
}