app.controller('PoReport',function($scope,validateService,commonService,httpService){
	
	$('#datePicker').daterangepicker({
	      autoUpdateInput: false,
	      locale: {
	          cancelLabel: 'Clear'
	      }
	});

	$scope.po_report = {
		report_type : "report_1",
		division : "",
		type : "",
		date_range : "",
		material_id : "",
		supplier_id : ""
	}

	$scope.po_report_show = {
		division : true,
		type : true,
		date_range : true,
		material_id : false,
		supplier_id : false
	}

	$('#datePicker').on('apply.daterangepicker', function(ev, picker) {
	      $(this).val(picker.startDate.format('YYYY-MM-DD')+'/'+ picker.endDate.format('YYYY-MM-DD'));
	});

	$('#datePicker').on('cancel.daterangepicker', function(ev, picker) {
	      $(this).val('');
	});

	$scope.chageReportType = function(){
		if($scope.po_report.report_type === "report_1"){
			$scope.po_report_show = {
				division : true,
				type : true,
				date_range : true,
				material_id : false
			}
		}
		if($scope.po_report.report_type === "report_2"){
			$scope.po_report_show = {
				division : false,
				type : false,
				date_range : true,
				material_id : true
			}
		}
		if($scope.po_report.report_type === "report_3"){
			$scope.po_report_show = {
				division : false,
				type : false,
				date_range : true,
				material_id : false,
				supplier_id : true
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
		if($scope.po_report.report_type === "report_1"){
			if(validateService.blank($scope.po_report['division'],"Please Choose division","division")) return false;
			if(validateService.blank($scope.po_report['type'],"Please Choose type","type")) return false;
			if(validateService.blank($scope.po_report['date_range'],"Please Choose date","datePicker1")) return false;
		}
		if($scope.po_report.report_type === "report_2"){
			if(validateService.blank($scope.po_report['date_range'],"Please Choose date","datePicker1")) return false;
			if(validateService.blank($scope.po_report['material_id'],"Please Choose material","material_id")) return false;
		}
		if($scope.po_report.report_type === "report_3"){
			if(validateService.blank($scope.po_report['date_range'],"Please Choose date","datePicker1")) return false;
			if(validateService.blank($scope.po_report['supplier_id'],"Please Choose supplier","supplier_id")) return false;
		}
		var url = "PoReport/poDownloadAction?";
		for(var i in $scope.po_report){
			url += i+"="+$scope.po_report[i]+"&";
		}
		window.open(url);
	}
})