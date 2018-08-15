app.controller('PoReport',function($scope,validateService,commonService,httpService){
	setTimeout(function(){
		$('#datePicker').daterangepicker({
		      autoUpdateInput: false,
		      locale: {
		          cancelLabel: 'Clear'
		      }
		});
		$('#datePicker').on('apply.daterangepicker', function(ev, picker) {
	      $(this).val(picker.startDate.format('YYYY-MM-DD')+'/'+ picker.endDate.format('YYYY-MM-DD'));
		});

		$('#datePicker').on('cancel.daterangepicker', function(ev, picker) {
		      $(this).val('');
		});
	},500)  

	

	$scope.po_report = {
		report_type : "report_1",
		division : "",
		type : "",
		date_range : "",
		material_id : "",
		supplier_id : "",
		order_ref   : "",
		tax_type : "",
		tax_perc : ""
	}

	$scope.po_report_show = {
		division : true,
		type : true,
		date_range : true,
		material_id : false,
		supplier_id : false,
		order_ref   : false,
		tax_type : false
	}

	
	$scope.chageReportType = function(){
		if($scope.po_report.report_type === "report_1"){
			$scope.po_report_show = {
				division : true,
				type : true,
				date_range : true,
				material_id : false,
				supplier_id : false,
				order_ref : false,
				tax_type : false
			}
		}
		if($scope.po_report.report_type === "report_2"){
			$scope.po_report_show = {
				division : true,
				type : true,
				date_range : true,
				material_id : true,
				supplier_id : false,
				order_ref : false,
				tax_type : false
			}
		}
		if($scope.po_report.report_type === "report_3"){
			$scope.po_report_show = {
				division : true,
				type : true,
				date_range : true,
				material_id : false,
				supplier_id : true,
				order_ref : false,
				tax_type : false
			}
		}
		if($scope.po_report.report_type === "report_4"){
			$scope.po_report_show = {
				division : true,
				type : true,
				date_range : true,
				material_id : false,
				supplier_id : false,
				order_ref : true,
				tax_type : false
			}
		}
		if($scope.po_report.report_type === "report_5"){
			$scope.po_report_show = {
				division : true,
				type : true,
				date_range : true,
				material_id : false,
				supplier_id : false,
				order_ref : false,
				tax_type : true
			}
		}
		setTimeout(function(){
			$('.select2').select2();
			$('#datePicker').daterangepicker({
			      autoUpdateInput: false,
			      locale: {
			          cancelLabel: 'Clear'
			      }
			});
			$('#datePicker').on('apply.daterangepicker', function(ev, picker) {
			      $(this).val(picker.startDate.format('YYYY-MM-DD')+'/'+ picker.endDate.format('YYYY-MM-DD'));
			});

			$('#datePicker').on('cancel.daterangepicker', function(ev, picker) {
			      $(this).val('');
			});
		},100);
	}

	$scope.poDownloadAction = function(){
		$scope.po_report.date_range = $("#datePicker").val();
		if(validateService.blank($scope.po_report['division'],"Please Choose division","division")) return false;
		if(validateService.blank($scope.po_report['type'],"Please Choose type","type")) return false;
		if(validateService.blank($scope.po_report['date_range'],"Please Choose date","datePicker1")) return false;
		
		if($scope.po_report.report_type === "report_2"){
			if(validateService.blank($scope.po_report['material_id'],"Please Choose material","material_id")) return false;
		}
		if($scope.po_report.report_type === "report_3"){
			if(validateService.blank($scope.po_report['supplier_id'],"Please Choose supplier","supplier_id")) return false;
		}
		if($scope.po_report.report_type === "report_4"){
			if(validateService.blank($scope.po_report['order_ref'],"Please Enter Order Reference","order_ref")) return false;
		}
		if($scope.po_report.report_type === "report_5"){
			if(validateService.blank($scope.po_report['tax_type'],"Please Choose tax type","tax_type")) return false;
			if(validateService.blank($scope.po_report['tax_perc'],"Please enter tax percentage","tax_perc")) return false;
		}
		var url = "PoReport/poDownloadAction?";
		for(var i in $scope.po_report){
			url += i+"="+$scope.po_report[i]+"&";
		}
		window.open(url);
	}
})