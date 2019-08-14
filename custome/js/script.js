	$( window ).on("load", function() {
		$('<div class="loading"></div>').appendTo('body');
		if( typeof $(".container").attr("newTitle") !== "undefined"){ setTimeout(function(){ $('div.loading').remove(); }, 1000);
	}
});

$(document).ready(function() {
	$("body").on("contextmenu",function(){return false;});
	if( typeof $(".container").attr("newTitle") !== "undefined"){$(document).attr("title", $(".container").attr("newTitle"));}
	$('#myModal').on('hidden.bs.modal',function(e){$(".modal-title").text("AVX");$(".modal-body").html("Loading...");$(this).removeData();});
	$('#myModal').on('show.bs.modal',function(e){$(".modal-title").text("AVX");$(".modal-body").html("Loading...");});	
	$.ajaxSetup({cache:false}); 
	$("select").select2({});
	var source 		= "https://www.youtube.com/embed/videoseries?list=PLd6TpzqvlAzyZjAWtIJxkGy397n-9kcMl";
	var sourcez 	= "https://www.youtube.com/embed/videoseries?list=PLx0sYbCqOb8TBPRdmBHs5Iftvv9TPboYG";
	var full_src 	= "<iframe width='100%' height='auto' src='" +source+"' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>";
	$('.framming_place').html(full_src);

	
	function dtTables_complete(){
		$('div.loading').remove();
		$.notify('DONE!', {type: "success"},
		{
			allow_dismiss: false,	
			placement: {
				from: 'top',
				align: 'right',
				type: "success"
			}
		});		
	}
	/* !function */
	function info_sukses(){
		var a = $(".modal-title").html("Infromasi");
		var b = $(".modal-body").html("<h1 class='text-success text-center'> <i class='fa fa-check-circle fa-fw fa-5x'></i></h1><h1 class='text-success text-center'>SUKSES</h1><h4 class='text-center'>Data berhasil disimpan.</h4><div class='modal-footer'><button type='button' class='btn btn-default' data-dismiss='modal'>Close</button></div>");
		return a + b;
	}	
	function info_gagal(){
		var a = $(".modal-title").html("Infromasi");
		var b = $(".modal-body").html("<h1 class='text-danger text-center'><i class='fa fa-exclamation-circle fa-fw fa-5x'></i></h1><h1 class='text-danger text-center'>GAGAL</h1><h4 class='text-center'>Data tidak lengkap atau kode sudah terdaftar.</h4><div class='modal-footer'><button type='button' class='btn btn-default' data-dismiss='modal'>Close</button></div>");
		return a + b;
	}	
	function xhr_fail(textStatus){
		return  xhr_fail(textStatus);
	}
	function printThis(avxId,n){
		switch(n){
			case 'amplopCtr':
				var url_result	= "../print/konterstr/" +avxId + ".avx";
			break;			
			case 'amplopRtl':
				var url_result	= "../print/toko/" +avxId + ".avx";
			break;			
			case 'spg':
				var url_result	= "../print/spg/" +avxId + ".avx";
			break;			
			case 'tat':
				var url_result	= "../print/tat/" +avxId + ".avx";
			break;		
			case 'retur':
				var url_result	= "../print/retur/" +avxId + ".avx";
			break;			
			case 'rekrut':
				var url_result	= "../print/rekrut/" +avxId + ".avx";
			break;	
			case 'paklaring':
				var url_result	= "../print/paklaring/" +avxId + ".avx";
			break;
			default:
				var url_result	= "../print/konterstr/" +avxId + ".avx";
		}
		var params  = 'width='+screen.width;
				params += ', height='+screen.height;
				params += ', top=0, left=0'
				params += ', directories=0'
				params += ', toolbar=0'
				params += ', location=0'
				params += ', titlebar=0'
				params += ', resizable=0'
				params += ', menubar=0'
				params += ', scrollbars=1'
				params += ', status=0';
				params += ', fullscreen=1';					
		var newwin = window.open(url_result,'window_print', params, true);	
		return false	
	}		

	/* !Tabel amplop konter */
	var tblMasKonter 	= $("#tbl_master_konter").DataTable({
		"dom"							: "<'#headKonter'><'row'<'#encapsulate.col-md-2'l><'clearFix col-md-7'<'#wrapinhead'B>><'clearFix col-md-3' f>>t <'row'<'col-md-6' i><'col-md-6' p>>",
		"lengthMenu"			: [[15,20,30],[15,20,30]],			
		"pagingType"			: "full",
		"scrollY"					: "calc(100vh - 430px)",
		"fixedHeader"			: true,
		"scrollCollapse"	: false,
		"select"					: true,
		"buttons"					: [
			{
				"extend"		: "selectAll",
				"text"			: "<i class='fa fa-check-square-o fa-fw fa-lg'></i>All",
				"className"	: "btn btn-md btn-default"				
			}, 
			{
				"extend"			: "selectNone",
				"text"			: "<i class='fa fa-square-o fa-fw fa-lg'></i>",
				"className"	: "btn btn-md btn-default"				
			}, 
			{
				"extend"		: "copyHtml5",
				"titleAttr"	: "Copy",
				"className"	: "btn btn-md btn-info"
			}, 
			{
				"extend"		: "excelHtml5",
				"titleAttr"	: "Excel",
				"className"	: "btn btn-md btn-success"
			}, 
			{
				"extend"		: "csvHtml5",
				"titleAttr"	: "CSV",
				"className"	: "btn btn-md btn-danger"
			},
			{
				"extend"		: "pdfHtml5",
				"titleAttr"	: "PDF",
				"className"	: "btn btn-md btn-warning"
			}, 
			{
				"text"			: '<i class="fa fa-plus fa-fw fa-lg"></i>Add',
				"className"	: 'btn btn-md btn-default',
				"action"		: function(){
					$('#myModal').modal('show'); 
					var avxId 	= 0;				
					var url 		= $("#tbl_master_konter").attr("act");
					var request = $.ajax({
						url			: url,
						method	: "POST",
						data		:	{
							postAvxId		: avxId, 
							jenis_aksi	:'konter_baru'
						},
						success:function(data) {
							$(".modal-title").html('Buat Data Konter Baru').show();
							$(".modal-body").html(data).show();
						}
					});
					request.fail(function(jqXHR, textStatus){
						 xhr_fail(textStatus);
					});	
				}
			}, 
			{
				"extend"		: 'selectedSingle',
				"text"			: '<i class="fa fa-pencil fa-fw fa-lg"></i>Edit',
				"className"	: 'btn btn-md btn-default',
				"action"		: function() {
					var dtxi 	= tblMasKonter.rows({selected: true}).indexes();
					var x 		= tblMasKonter.cells( dtxi, 1).data().toArray(); // x adalah array.
					var avxId = x.toString();
					$('#myModal').modal('show'); 
					var url 		= $("#tbl_master_konter").attr("act");
					var request = $.ajax({
						url			: url,
						method	:"POST",
						data		: {
							postAvxId		: avxId,
							jenis_aksi	: "konter_edit"
						},
						success:function(data){
							$(".modal-title").html('Edit Data Konter').show();
							$(".modal-body").html(data).show();
						}
					});
					request.fail(function(jqXHR, textStatus){
						xhr_fail(textStatus);
					});	
				}
			},
			{
				"extend"		: 'selected',
				"text"			: '<i class="fa fa-print fa-fw fa-lg"></i>',
        "className"	: 'btn btn-md btn-primary',
				"action"		: function() {
					var dtxi 	= tblMasKonter.rows({selected: true}).indexes();
					var x 		= tblMasKonter.cells( dtxi, 1 ).data().toArray(); // x adalah array.
					printThis(x,'amplopCtr');		
				}
			}
		],				
		"columnDefs"			: [		
			{
				"targets"		: [0],
				"visible"		: true,
				"sortable"	: true
			},
			{
        "orderable"	: true,
        "className"	: "select-checkbox",
        "targets"		:  [0]
      }	
		],			
		"select"		: {
			"style"		: "single", 
			//"selector": "td:last-child",	// jika Selector diaktifkan, pada combobox bisa diselect. not rows click.
    },		
		"order"	: [[ 5, 'asc' ]],			
		"ajax"	: 
		{
			"url" 	: $("#tbl_master_konter").attr("dtTblCtr"),
			"type"	: "GET",
			"data"	: {"getdata" : "konter_read"}
		},
		"initComplete": function( settings, json ) {dtTables_complete();},
		"footerCallback": function ( tfoot, data, start, end, display ) {
			var api = this.api(), data;
			//var query = dataTable.search();
			// Total over all pages
			gttl_aktif = api
				.rows()
				.column( 5 )
				.data()
				.filter( function (value, index) {
					var query = "AKTIF";
					return value == query ? true : false;
			}).length;
			
			gttl_naktif = api
				.rows()
				.column( 5 )
				.data()
				.filter( function (value, index) {
					return value == "TIDAK" ? true : false;
			}).length;
			
			// Total over this page
			row_aktif = api
				.rows()
				.column( 5, { page: 'current'} )
				.data()
				.filter( function (value, index) {
					return value == "AKTIF" ? true : false;
				}).length;	
				
			row_naktif = api
				.rows()
				.column( 5, { page: 'current'} )
				.data()
				.filter( function (value, index) {
					return value == "TIDAK" ? true : false;
			}).length;
			// Update footer
			//$( api.column( 1 ).footer() ).html(row_aktif +' Toko Aktif ( dari Total '+ gttl_aktif +' toko aktif)');
			
				$('tr:eq(0) th:eq(2)', api.table().footer()).html(row_aktif);
				$('tr:eq(1) th:eq(2)', api.table().footer()).html(gttl_aktif);
				$('tr:eq(0) th:eq(4)', api.table().footer()).html(row_naktif);
				$('tr:eq(1) th:eq(4)', api.table().footer()).html(gttl_naktif);
		}		
	});		

	var konter_head 	= "<h1 class='page-header' id='head6'><i class='fa fa-envelope'></i> Amplop Konter </h1>";	
	if( typeof $("div#headKonter") !== "undefined"){ $("div#headKonter").html(konter_head) }
	$(document).on("click", "#next_konter_edit", function next_konter_edit(){
		var kd_konter	= $("#kd_konter").val();
		var nm_konter = $("#nm_konter").val();
		var alamat1 	= $("#alamat1").val();
		var alamat2 	= $("#alamat2").val();
		var alamat3 	= $("#alamat3").val();
		var kota	    = $("#kota").val();
		var sts_ctr	  = $("#sts_ctr").val();
		var url	    	= $(this).attr("modact");
		var request   = $.ajax({
			url			: url,
			method	: "GET",
			data		: { kd_konter:kd_konter, nm_konter:nm_konter, alamat1:alamat1, alamat2:alamat2, alamat3:alamat3, kota:kota, sts_ctr:sts_ctr, action:'konter_edit' },
			success	: function(data){					
				if(data == "sukses")
				{	
					tblMasKonter.ajax.reload();
					info_sukses();
				}	
				else
				{
					tblMasKonter.ajax.reload();
					info_gagal();
				}		
			}
		});
		request.fail(function(jqXHR, textStatus){ xhr_fail(textStatus);});
	});	
	$(document).on("click", "#next_konter_baru", function next_konter_baru(){
		var kd_konter	= $("#kd_konter").val();
		var nm_konter = $("#nm_konter").val();
		var alamat1 	= $("#alamat1").val();
		var alamat2 	= $("#alamat2").val();
		var alamat3 	= $("#alamat3").val();
		var kota	    = $("#kota").val();
		var url	    	= $(this).attr("modact");		
		var request   = $.ajax({
			url			: url,
			method	: "GET",
			data		: { kd_konter:kd_konter, nm_konter:nm_konter, alamat1:alamat1, alamat2:alamat2, alamat3:alamat3, kota:kota, action:'konter_create' },
			success	: function(data){			
				if(data == "sukses")
				{	
					tblMasKonter.ajax.reload();
					info_sukses();
				}	
				else
				{
					tblMasKonter.ajax.reload();
					info_gagal();
				}	
			}
		});
		request.fail(function(jqXHR, textStatus){ xhr_fail(textStatus);});
	});	
	tblMasKonter.on( 'order.dt search.dt', function(){
		tblMasKonter.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
			cell.innerHTML = i+1;
		});
  }).draw();	
	/* !Tabel amplop toko */
	var tblMasToko	= $("#tbl_master_toko").DataTable({
		"dom"							: "<'#headToko'><'row'<'#encapsulate.col-md-2'l><'clearFix col-md-7'<'#wrapinhead'B>><'clearFix col-md-3' f>>t <'row'<'col-md-6' i><'col-md-6' p>>",
		"lengthMenu"			: [[15,20,30],[15,20,30]],			
		"pagingType"			: "full",
		"scrollY"					: "calc(100vh - 380px)",
		"fixedHeader"			: true,
		"scrollCollapse"	: false,
		"select"					: true,
		"buttons"					: [
			{
				"extend"		: "selectAll",
				"text"			: "<i class='fa fa-check-square-o fa-fw fa-lg'></i>All",
				"className"	: "btn btn-md btn-default"				
			}, 
			{
				"extend"			: "selectNone",
				"text"			: "<i class='fa fa-square-o fa-fw fa-lg'></i>",
				"className"	: "btn btn-md btn-default"				
			}, 
			{
				"extend"		: "copyHtml5",
				"titleAttr"	: "Copy",
				"className"	: "btn btn-md btn-info"
			}, 
			{
				"extend"		: "excelHtml5",
				"titleAttr"	: "Excel",
				"className"	: "btn btn-md btn-success"
			}, 
			{
				"extend"		: "csvHtml5",
				"titleAttr"	: "CSV",
				"className"	: "btn btn-md btn-danger"
			},
			{
				"extend"		: "pdfHtml5",
				"titleAttr"	: "PDF",
				"className"	: "btn btn-md btn-warning"
			}, 
			{
				"text"			: '<i class="fa fa-plus fa-fw fa-lg"></i>Add',
				"className"	: 'btn btn-md btn-default',
				"action"		: function(){
					$('#myModal').modal('show'); 
					var avxId 	= 0;				
					var url 		= $("#tbl_master_toko").attr("act");
					var request = $.ajax({
						url			: url,
						method	: "POST",
						data		:	{
							postAvxId		: avxId, 
							jenis_aksi	:'toko_baru'
						},
						success:function(data) {
							$(".modal-title").html('Buat Data Toko Baru').show();
							$(".modal-body").html(data).show();
						}
					});
					request.fail(function(jqXHR, textStatus){
						 xhr_fail(textStatus);
					});	
				}
			}, 
			{
				"extend"		: 'selectedSingle',
				"text"			: '<i class="fa fa-pencil fa-fw fa-lg"></i>Edit',
				"className"	: 'btn btn-md btn-default',
				"action"		: function() {
					var dtxi 	= tblMasToko.rows({selected: true}).indexes();
					var x 		= tblMasToko.cells( dtxi, 1).data().toArray(); // x adalah array.
					var avxId = x.toString();
					$('#myModal').modal('show'); 
					var url 		= $("#tbl_master_toko").attr("act");
					var request = $.ajax({
						url			: url,
						method	:"POST",
						data		: {
							postAvxId		: avxId,
							jenis_aksi	: "toko_edit"
						},
						success:function(data){
							$(".modal-title").html('Edit Data Toko').show();
							$(".modal-body").html(data).show();
						}
					});
					request.fail(function(jqXHR, textStatus){
						 xhr_fail(textStatus);
					});	
				}
			},
			{
				"extend"		: 'selected',
				"text"			: '<i class="fa fa-print fa-fw fa-lg"></i>',
        "className"	: 'btn btn-md btn-primary',
				"action"		: function() {
					var dtxi 	= tblMasToko.rows({selected: true}).indexes();
					var x 		= tblMasToko.cells( dtxi, 1 ).data().toArray(); // x adalah array.
					printThis(x,'amplopRtl');		
				}
			}
		],				
		"columnDefs"			: [		
			{
				"targets"		: [0,1],
				"visible"		: true,
				"sortable"	: false
			},
			{
        "orderable"	: false,
        "className"	: "select-checkbox",
        "targets"		:  [0]
      }	
		],			
		"select"		: {
			"style"		: "os"
    },		
		"order"	: [[ 2, 'asc' ]],						
		"ajax": 
		{
			"url" 	: $("#tbl_master_toko").attr("dtTblRtl"),
			"type": "GET",
			"data": {"getdata" : "toko_read"}
		},
		"initComplete": function( settings, json ) {dtTables_complete();}				
	});	
	var toko_head		= "<h1 class='page-header' id='head1'><i class='fa fa-envelope'></i> Amplop Toko Retail </h1>";	
	if( typeof $("div#headToko") !== "undefined"){ $("div#headToko").html(toko_head) }
	$(document).on("click", "#next_toko_edit", function next_toko_edit(){
		var kd_toko		= $("#kd_toko").val();
		var nm_toko 	= $("#nm_toko").val();
		var alamat1 	= $("#alamat1").val();
		var alamat2 	= $("#alamat2").val();
		var alamat3 	= $("#alamat3").val();
		var kota	    = $("#kota").val();
		var url	    	= $("#next_toko_edit").attr("modact");	
		var request   = $.ajax({
			url			: url,
			method	: "GET",
			data		: { kd_toko:kd_toko, nm_toko:nm_toko, alamat1:alamat1, alamat2:alamat2, alamat3:alamat3, kota:kota, action:'toko_edit' },
			success	: function(data){			
				if(data == "sukses")
				{	
					tblMasToko.ajax.reload();
					info_sukses();
				}	
				else
				{
					tblMasToko.ajax.reload();
					info_gagal();
				}	
			}
		});
		request.fail(function(jqXHR, textStatus){ xhr_fail(textStatus);});
	});
	$(document).on("click", "#next_toko_baru", function next_toko_baru(){
		var kd_toko		= $("#kd_toko").val();
		var nm_toko 	= $("#nm_toko").val();
		var alamat1 	= $("#alamat1").val();
		var alamat2 	= $("#alamat2").val();
		var alamat3 	= $("#alamat3").val();
		var kota	    = $("#kota").val();			
		var url	    	= $("#next_toko_baru").attr("modact");	
		var request   = $.ajax({
			url			: url,
			method	: "GET",
			data		: { kd_toko:kd_toko, nm_toko:nm_toko, alamat1:alamat1, alamat2:alamat2, alamat3:alamat3, kota:kota, action:'toko_create' },
			success	: function(data){			
				if(data == "sukses")
				{	
					tblMasToko.ajax.reload();
					info_sukses();
				}	
				else
				{
					tblMasToko.ajax.reload();
					info_gagal();
				}	
			}
		});
		request.fail(function(jqXHR, textStatus){ xhr_fail(textStatus);});
	});	
	$(document).on("click",".toko_edit",function toko_edit(){	
		var avxId 	= $(this).attr("id");				
		var url 		= $("#tbl_master_toko").attr("act");
		var request = $.ajax({
			url			: url,
			method	: "POST",
			data		: { postAvxId:avxId, jenis_aksi	: "toko_edit" },
			success	: function(data)
			{
				$(".modal-title").html('Alamat Konter').show();
				$(".modal-body").html(data).show();
			}
		});
		request.fail(function(jqXHR, textStatus){ xhr_fail(textStatus); });
	}); 	
	$(document).on("click",".toko_print",function toko_print(){	
		var x = $(this).attr("id");
		printThis(x,'amplopRtl');	
	}); 
	/* !Tabel master rekrut */
	var tblMasRekrut	= $("#tbl_master_rekrut").DataTable({
		"dom"							: "<'#headRekrut'><'row'<'#encapsulate.col-md-2'l><'clearFix col-md-7'<'#wrapinhead'B>><'clearFix col-md-3' f>>t <'row'<'col-md-6' i><'col-md-6' p>>",
		"lengthMenu"			: [[15,20,30],[15,20,30]],			
		"pagingType"			: "full",
		"scrollY"					: "calc(100vh - 380px)",
		"fixedHeader"			: true,
		"scrollCollapse"	: false,
		"select"					: true,
		"buttons"					: [
			{
				"extend"		: "selectAll",
				"text"			: "<i class='fa fa-check-square-o fa-fw fa-lg'></i>All",
				"className"	: "btn btn-md btn-default"				
			}, 
			{
				"extend"			: "selectNone",
				"text"			: "<i class='fa fa-square-o fa-fw fa-lg'></i>",
				"className"	: "btn btn-md btn-default"				
			}, 
			{
				"extend"		: "copyHtml5",
				"titleAttr"	: "Copy",
				"className"	: "btn btn-md btn-info"
			}, 
			{
				"extend"		: "excelHtml5",
				"titleAttr"	: "Excel",
				"className"	: "btn btn-md btn-success"
			}, 
			{
				"extend"		: "csvHtml5",
				"titleAttr"	: "CSV",
				"className"	: "btn btn-md btn-danger"
			},
			{
				"extend"		: "pdfHtml5",
				"titleAttr"	: "PDF",
				"className"	: "btn btn-md btn-warning"
			}, 
			{
				"extend"		: 'selected',
				"text"			: '<i class="fa fa-print fa-fw fa-lg"></i>',
        "className"	: 'btn btn-md btn-primary',
				"action"		: function() {
					var dtxi 	= tblMasRekrut.rows({selected: true}).indexes();
					var x 		= tblMasRekrut.cells( dtxi, 1 ).data().toArray(); // x adalah array.
					printThis(x,'rekrut');		
				}
			}
		],				
		"columnDefs"			: [		
			{
				"targets"		: [0,1],
				"visible"		: true,
				"sortable"	: false
			},
			{
        "orderable"	: false,
        "className"	: "select-checkbox",
        "targets"		:  [0]
      }	
		],			
		"select"		: {
		"style"			: "os", 
    },		
		"order"	: [[ 2, 'asc' ]],			
		"ajax"	: 
		{
			"url" 	: $("#tbl_master_rekrut").attr("dtTblRekrut"),
			"type"	: "GET",
			"data"	: {"getdata" : "rekrut_read"}
		},
		"initComplete": function( settings, json ) {dtTables_complete();}				
	});		
	var rekrut_head 		= "<h1 class='page-header' id='head3'><i class='fa fa-envelope'></i> Surat Rekrut SPG <small class='sub-header'> Permohonanan Minta SPG baru</small></h1>";	
	if( typeof $("div#headRekrut") !== "undefined"){ $("div#headRekrut").html(rekrut_head) }
	
	/* !Tabel master surat tugas spg */
	var tblMasSpg   = $("#tbl_master_spg").DataTable({
		"dom"							: "<'#headSpg'><'row'<'#encapsulate.col-md-2'l><'clearFix col-md-7'<'#wrapinhead'B>><'clearFix col-md-3' f>>t <'row'<'col-md-6' i><'col-md-6' p>>",
		"lengthMenu"			: [[15,20,30],[15,20,30]],			
		"pagingType"			: "full",
		"scrollY"					: "calc(100vh - 380px)",
		"scrollX"					: "calc(100vw - 380px)",
		"fixedHeader"			: true,
		"scrollCollapse"	: true,
		"select"					: true,
		//"fixedColumns"		: {"leftColumns"	: 4},
		"fixedColumns"		: true,
colReorder: true,
		"buttons"					: [
			"colvis",
			{
				"extend"		: "selectAll",
				"text"			: "<i class='fa fa-check-square-o fa-fw fa-lg'></i>All",
				"className"	: "btn btn-md btn-default"				
			}, 
			{
				"extend"			: "selectNone",
				"text"			: "<i class='fa fa-square-o fa-fw fa-lg'></i>",
				"className"	: "btn btn-md btn-default"				
			}, 
			{
				"extend"		: "copyHtml5",
				"titleAttr"	: "Copy",
				"className"	: "btn btn-md btn-info"
			}, 
			{
				"extend"		: "excelHtml5",
				"titleAttr"	: "Excel",
				"className"	: "btn btn-md btn-success"
			}, 
			{
				"extend"		: "csvHtml5",
				"titleAttr"	: "CSV",
				"className"	: "btn btn-md btn-danger"
			},
			{
				"extend"		: "pdfHtml5",
				"titleAttr"	: "PDF",
				"className"	: "btn btn-md btn-warning"
			}, 
			{
				"text"			: '<i class="fa fa-plus fa-fw fa-lg"></i>Add',
				"className"	: 'btn btn-md btn-default',
				"action"		: function(){
					$('#myModal').modal('show'); 
					var avxId 	= 0;				
					var url 		= $("#tbl_master_spg").attr("act");
					var request = $.ajax({
						url			: url,
						method	: "POST",
						data		:	{
							postAvxId		: avxId, 
							jenis_aksi	:'spg_baru'
						},
						success:function(data) {
							$(".modal-title").html('Buat Data SPG Baru').show();
							$(".modal-body").html(data).show();
						}
					});
					request.fail(function(jqXHR, textStatus){
						 xhr_fail(textStatus);
					});	
				}
			}, 
			{
				"extend"		: 'selectedSingle',
				"text"			: '<i class="fa fa-pencil fa-fw fa-lg"></i>Edit',
				"className"	: 'btn btn-md btn-default',
				"action"		: function() {
					var dtxi 	= tblMasSpg.rows({selected: true}).indexes();
					var x 		= tblMasSpg.cells( dtxi, 1).data().toArray(); // x adalah array.
					var avxId = x.toString();
					$('#myModal').modal('show'); 
					var url 		= $("#tbl_master_spg").attr("act");
					var request = $.ajax({
						url			: url,
						method	:"POST",
						data		: {
							postAvxId		: avxId,
							jenis_aksi	: "spg_edit"
						},
						success:function(data){
							$(".modal-title").html('Edit Data SPG').show();
							$(".modal-body").html(data).show();
						}
					});
					request.fail(function(jqXHR, textStatus){
						 xhr_fail(textStatus);
					});	
				}
			},
			{
				"extend"		: 'selected',
				"text"			: '<i class="fa fa-print fa-fw fa-lg"></i>',
        "className"	: 'btn btn-md btn-primary',
				"action"		: function() {
					var dtxi 	= tblMasSpg.rows({selected: true}).indexes();
					var x 		= tblMasSpg.cells( dtxi, 1 ).data().toArray(); // x adalah array.
					printThis(x,'spg');		
				}
			}
		],				
		"columnDefs"			: [		
			{
        "orderable"	: false,
        "className"	: "select-checkbox",
        "targets"		:  [0],
				"visible"		: true
      },
			{
				"targets"		: [1,4,6,7],
				"visible"		: false
			},
			{
				"targets"		: [8,9],
				"className"		: "text-center"
			}        
		],			
		"select"		: {
			"style"		: "os"
    },		
		"order"	: [[ 1, 'desc' ]],						
		"ajax": 
		{
			"url" 	: $("#tbl_master_spg").attr("dtTblSpg"),
			"type"	: "GET",
			"data"	: {"getdata" : "spg_read"}
		},
		"initComplete": function( settings, json ) {dtTables_complete();}				
	});		
	var spg_head 		= "<h1 class='page-header' id='head7'><i class='fa fa-envelope'></i> Surat Tugas SPG <small class='sub-header'> Penempatan SPG Baru </small></h1>";	
	if( typeof $("div#headSpg") !== "undefined"){ $("div#headSpg").html(spg_head) }
 	$(document).on("click", "#next_spg_baru", function next_spg_baru(){
		var no_surat 	= $("#no_surat").val();
		var tgl_surat = $("#tgl_surat").val();
		var tgl_tugas = $("#tgl_tugas").val();
		var nama 	    = $("#nama").val();
		var alamat 	  = $("#alamat").val();
		var ttl 	    = $("#ttl").val();
		var nohp	    = $("#nohp").val();
		var norek	    = $("#norek").val();
		var bca_an	  = $("#bca_an").val();
		var kd_toko	  = $("#kd_konter").val();
		var jenis	  	= $("#jenis_spg").val();
		var status	  = $("#status_spg").val();
		var url	    	= $(this).attr("modact");	
		var request   = $.ajax({
			url			: url,
			method	: "GET",
			data		: { no_surat:no_surat, tgl_tugas:tgl_tugas, tgl_surat:tgl_surat,nama:nama, alamat:alamat, ttl:ttl, nohp:nohp, norek:norek,bca_an:bca_an, kd_toko:kd_toko,jenis:jenis,status:status, action:'spg_create' },
			success	: function(data)
			{
				if(data == "sukses")
				{	
					tblMasSpg.ajax.reload();
					tblMasterSpg.ajax.reload();
					info_sukses();
				}	
				else
				{
					tblMasSpg.ajax.reload();
					tblMasterSpg.ajax.reload();
					info_gagal();
				}	
			}
		});
		request.fail(function(jqXHR, textStatus){ xhr_fail(textStatus);});
	});	
	$(document).on("click", "#next_spg_edit", function next_spg_edit(){
		var no_surat 	= $("#no_surat").val();
		var tgl_surat = $("#tgl_surat").val();
		var tgl_tugas = $("#tgl_tugas").val();
		var nama 	    = $("#nama").val();
		var alamat 	  = $("#alamat").val();
		var ttl 	    = $("#ttl").val();
		var nohp	    = $("#nohp").val();
		var norek	    = $("#norek").val();
		var bca_an	  = $("#bca_an").val();
		var kd_toko	  = $("#kd_konter").val();
		var jenis	  	= $("#jenis_spg").val();
		var status	  = $("#status_spg").val();
		var tgl_keluar= $("#tgl_keluar").val();
		var url	    	= $(this).attr("modact");	
		var request   = $.ajax({
			url				: url,
			method		: "GET",
			data			: { no_surat:no_surat, tgl_tugas:tgl_tugas, tgl_surat:tgl_surat,nama:nama, alamat:alamat, ttl:ttl, nohp:nohp, norek:norek,bca_an:bca_an, kd_toko:kd_toko,jenis:jenis,status:status,tgl_keluar:tgl_keluar, action:'spg_update' },
			success		: function(data)
			{
				if(data == "sukses")
				{	
					tblMasSpg.ajax.reload();
					info_sukses();
				}	
				else
				{
					tblMasSpg.ajax.reload();
					info_gagal();
				}	
			}
		});
		request.fail(function(jqXHR, textStatus){ xhr_fail(textStatus);});
	});	
	$(document).on("change", "#status_spg", function status_spg(){
		$("#cont_tgl_keluar").html('<label class="control-label col-sm-3 text-danger" for="tgl_keluar">Tanggal (re-sign)</label><div class="col-sm-9"><input type="text" name="tgl_keluar" id="tgl_keluar" class="form-control"></div>');
		$('#tgl_keluar').datetimepicker({format:'DD-MM-YYYY'});
	});	

	/* !Tabel master retur */
	var tblMasRtr   = $("#tbl_master_retur").DataTable({	
		"dom"							: "<'#headRtr'><'row'<'#encapsulate.col-md-2'l><'clearFix col-md-7'<'#wrapinhead'B>><'clearFix col-md-3' f>>t <'row'<'col-md-6' i><'col-md-6' p>>",
		"lengthMenu"			: [[15,20,30],[15,20,30]],			
		"pagingType"			: "full",
		"scrollY"					: "calc(100vh - 380px)",
		"fixedHeader"			: true,
		"scrollCollapse"	: false,
		"select"					: true,
		"buttons"					: [
			{
				"extend"		: "selectAll",
				"text"			: "<i class='fa fa-check-square-o fa-fw fa-lg'></i>All",
				"className"	: "btn btn-md btn-default"				
			}, 
			{
				"extend"			: "selectNone",
				"text"			: "<i class='fa fa-square-o fa-fw fa-lg'></i>",
				"className"	: "btn btn-md btn-default"				
			}, 
			{
				"extend"		: "copyHtml5",
				"titleAttr"	: "Copy",
				"className"	: "btn btn-md btn-info"
			}, 
			{
				"extend"		: "excelHtml5",
				"titleAttr"	: "Excel",
				"className"	: "btn btn-md btn-success"
			}, 
			{
				"extend"		: "csvHtml5",
				"titleAttr"	: "CSV",
				"className"	: "btn btn-md btn-danger"
			},
			{
				"extend"		: "pdfHtml5",
				"titleAttr"	: "PDF",
				"className"	: "btn btn-md btn-warning"
			}, 
			{
				"text"			: '<i class="fa fa-plus fa-fw fa-lg"></i>Add',
				"className"	: 'btn btn-md btn-default',
				"action"		: function(){
					$('#myModal').modal('show'); 
					var avxId 	= 0;				
					var url 		= $("#tbl_master_retur").attr("act");
					var request = $.ajax({
						url			: url,
						method	: "POST",
						data		:	{
							postAvxId		: avxId, 
							jenis_aksi	:'retur_baru'
						},
						success:function(data) {
							$(".modal-title").html('Buat Data Retur Baru').show();
							$(".modal-body").html(data).show();
						}
					});
					request.fail(function(jqXHR, textStatus){
						 xhr_fail(textStatus);
					});	
				}
			}, 
			{
				"extend"		: 'selectedSingle',
				"text"			: '<i class="fa fa-pencil fa-fw fa-lg"></i>Edit',
				"className"	: 'btn btn-md btn-default',
				"action"		: function() {
					var dtxi 	= tblMasRtr.rows({selected: true}).indexes();
					var x 		= tblMasRtr.cells( dtxi, 1).data().toArray(); // x adalah array.
					var avxId = x.toString();
					$('#myModal').modal('show'); 
					var url 		= $("#tbl_master_retur").attr("act");
					var request = $.ajax({
						url			: url,
						method	:"POST",
						data		: {
							postAvxId		: avxId,
							jenis_aksi	: "retur_edit"
						},
						success:function(data){
							$(".modal-title").html('Edit Data Retur').show();
							$(".modal-body").html(data).show();
						}
					});
					request.fail(function(jqXHR, textStatus){
						 xhr_fail(textStatus);
					});	
				}
			},
			{
				"extend"		: 'selected',
				"text"			: '<i class="fa fa-print fa-fw fa-lg"></i>',
        "className"	: 'btn btn-md btn-primary',
				"action"		: function() {
					var dtxi 	= tblMasRtr.rows({selected: true}).indexes();
					var x 		= tblMasRtr.cells( dtxi, 1 ).data().toArray(); // x adalah array.
					printThis(x,'retur');		
				}
			}
		],				
		"columnDefs"			: [		
			{
        "orderable"	: false,
        "className"	: "select-checkbox",
        "targets"		:  [0],
				"visible"		: true
      },
			{
				"targets"		: [1,5],
				"visible"		: false
			}
		],			
		"select"		: {
			"style"		: "os"
    },		
		"order"	: [[ 2, 'desc' ]],						
		"ajax": 
		{
			"url" : $("#tbl_master_retur").attr("dtTblRtr"),
			"type": "GET",
			"data": {"getdata" : "retur_read"}
		},
		"initComplete": function( settings, json ) {dtTables_complete();}				
	});		
	var ret_head 		= "<h1 class='page-header' id='head2'><i class='fa fa-car'></i> Surat Tugas Retur <small class='sub-header'> Tarik Ke Kantor </small></h1>";	
	if( typeof $("div#headRtr") !== "undefined"){ $("div#headRtr").html(ret_head) }
	$(document).on("click", "#next_retur_baru", function next_retur_baru(){
		var no_surat 	= $("#no_surat").val();
		var tgl_surat = $("#tgl_surat").val();
		var nama 	    = $("#nama").val();
		var nohp	    = $("#nohp").val();
		var kd_toko	  = $("#kd_konter").val();
		var ekspedisi  = $("#ekspedisi").val();
		var url	    	= $(this).attr("modact");	
		var request   = $.ajax({
			url			: url,
			method	: "GET",
			data		: { no_surat:no_surat, tgl_surat:tgl_surat, nama:nama, nohp:nohp, kd_toko:kd_toko,ekspedisi:ekspedisi, action:'retur_create' },
			success		: function(data)
			{
				if(data == "sukses")
				{	
					tblMasRtr.ajax.reload();
					info_sukses();
				}	
				else
				{
					tblMasRtr.ajax.reload();
					info_gagal();
				}	
			}
		});
		request.fail(function(jqXHR, textStatus){ xhr_fail(textStatus);});
	});	
	$(document).on("click", "#next_retur_edit", function next_retur_edit(){
		var no_surat 	= $("#no_surat").val();
		var tgl_surat = $("#tgl_surat").val();
		var nama 	    = $("#nama").val();
		var nohp	    = $("#nohp").val();
		var kd_toko	  = $("#kd_konter").val();
		var ekspedisi = $("#ekspedisi").val();
		var url	    	= $(this).attr("modact");	
		var request   = $.ajax({
			url			: url,
			method	: "GET",
			data		: {no_surat:no_surat, tgl_surat:tgl_surat, nama:nama, nohp:nohp, kd_toko:kd_toko,ekspedisi:ekspedisi, action:'retur_edit'},
			success	: function(data)
			{
				if(data == "sukses")
				{	
					tblMasRtr.ajax.reload();
					info_sukses();
				}	
				else
				{
					tblMasRtr.ajax.reload();
					info_gagal();
				}	
			}
		});request.fail(function(jqXHR, textStatus){ xhr_fail(textStatus);});
	});	
 
	/* !Tabel master tat */
	var tblMasTAT   = $("#tbl_master_tat").DataTable({
		"dom"							: "<'#headTAT'><'row'<'#encapsulate.col-md-2'l><'clearFix col-md-7'<'#wrapinhead'B>><'clearFix col-md-3' f>>t <'row'<'col-md-6' i><'col-md-6' p>>",
		"lengthMenu"			: [[15,20,30],[15,20,30]],			
		"pagingType"			: "full",
		"scrollY"					: "calc(100vh - 380px)",
		"fixedHeader"			: true,
		"scrollCollapse"	: false,
		"select"					: true,
		"buttons"					: [
			{
				"extend"		: "selectAll",
				"text"			: "<i class='fa fa-check-square-o fa-fw fa-lg'></i>All",
				"className"	: "btn btn-md btn-default"				
			}, 
			{
				"extend"			: "selectNone",
				"text"			: "<i class='fa fa-square-o fa-fw fa-lg'></i>",
				"className"	: "btn btn-md btn-default"				
			}, 
			{
				"extend"		: "copyHtml5",
				"titleAttr"	: "Copy",
				"className"	: "btn btn-md btn-info"
			}, 
			{
				"extend"		: "excelHtml5",
				"titleAttr"	: "Excel",
				"className"	: "btn btn-md btn-success"
			}, 
			{
				"extend"		: "csvHtml5",
				"titleAttr"	: "CSV",
				"className"	: "btn btn-md btn-danger"
			},
			{
				"extend"		: "pdfHtml5",
				"titleAttr"	: "PDF",
				"className"	: "btn btn-md btn-warning"
			}, 
			{
				"text"			: '<i class="fa fa-plus fa-fw fa-lg"></i>Add',
				"className"	: 'btn btn-md btn-default',
				"action"		: function(){
					$('#myModal').modal('show'); 
					var avxId 	= 0;				
					var url 		= $("#tbl_master_tat").attr("act");
					var request = $.ajax({
						url			: url,
						method	: "POST",
						data		:	{
							postAvxId		: avxId, 
							jenis_aksi	:'tat_baru'
						},
						success:function(data) {
							$(".modal-title").html('Buat Data TAT Baru').show();
							$(".modal-body").html(data).show();
						}
					});
					request.fail(function(jqXHR, textStatus){
						 xhr_fail(textStatus);
					});	
				}
			}, 
			{
				"extend"		: 'selectedSingle',
				"text"			: '<i class="fa fa-pencil fa-fw fa-lg"></i>Edit',
				"className"	: 'btn btn-md btn-default',
				"action"		: function() {
					var dtxi 	= tblMasTAT.rows({selected: true}).indexes();
					var x 		= tblMasTAT.cells( dtxi, 1).data().toArray(); // x adalah array.
					var avxId = x.toString();
					$('#myModal').modal('show'); 
					var url 		= $("#tbl_master_tat").attr("act");
					var request = $.ajax({
						url			: url,
						method	:"POST",
						data		: {
							postAvxId		: avxId,
							jenis_aksi	: "tat_edit"
						},
						success:function(data){
							$(".modal-title").html('Edit Data TAT').show();
							$(".modal-body").html(data).show();
						}
					});
					request.fail(function(jqXHR, textStatus){
						 xhr_fail(textStatus);
					});	
				}
			},
			{
				"extend"		: 'selected',
				"text"			: '<i class="fa fa-print fa-fw fa-lg"></i>',
        "className"	: 'btn btn-md btn-primary',
				"action"		: function() {
					var dtxi 	= tblMasTAT.rows({selected: true}).indexes();
					var x 		= tblMasTAT.cells( dtxi, 1 ).data().toArray(); // x adalah array.
					printThis(x,'tat');		
				}
			}
		],				
		"columnDefs"			: [		
			{
        "orderable"	: false,
        "className"	: "select-checkbox",
        "targets"		:  [0],
				"visible"		: true
      },
			{
				"targets"		: [1,6],
				"visible"		: false
			}
		],			
		"select"		: {
			"style"		: "os"
    },		
		"order"	: [[ 2, 'desc' ]],						
		"ajax": 
		{
			"url" : $("#tbl_master_tat").attr("dtTblTat"),
			"type": "GET",
			"data": {"getdata" : "tat_read"}
		},
		"initComplete": function( settings, json ) {dtTables_complete();}				
	});		
	var tat_head = "<h1 class='page-header' id='head5'><i class='fa fa-exchange'></i> Surat Tugas TAT <small class='sub-header'> Transfer Antar Toko </small></h1>";	
	if( typeof $("div#headTAT") !== "undefined"){ $("div#headTAT").html(tat_head) }
	$(document).on("click", "#next_tat_baru", function next_tat_baru(){
		var no_surat 	= $("#no_surat").val();
		var tgl_surat = $("#tgl_surat").val();
		var nama 	    = $("#nama").val();
		var nohp	    = $("#nohp").val();
		var dari_toko	= $("#dari_toko").val();
		var ke_toko	  = $("#ke_toko").val();
		var ekspedisi = $("#ekspedisi").val();
		var url	    	= $(this).attr("modact");	
		var request   = $.ajax({
			url			: url,
			method	: "GET",
			data		: { no_surat:no_surat, tgl_surat:tgl_surat, nama:nama, nohp:nohp, dari_toko:dari_toko,ke_toko:ke_toko,ekspedisi:ekspedisi, action:'tat_create' },
			success	: function(data)
			{
				if(data == "sukses")
				{	
					tblMasTAT.ajax.reload();
					info_sukses();
				}	
				else
				{
					tblMasTAT.ajax.reload();
					info_gagal();
				}	
			}
		});
		request.fail(function(jqXHR, textStatus){ xhr_fail(textStatus);});
	});	
	$(document).on("click", "#next_tat_edit", function next_tat_edit(){
		var no_surat 	= $("#no_surat").val();
		var tgl_surat = $("#tgl_surat").val();
		var nama 	    = $("#nama").val();
		var nohp	    = $("#nohp").val();
		var dari_toko	= $("#dari_toko").val();
		var ke_toko	  = $("#ke_toko").val();
		var ekspedisi = $("#ekspedisi").val();
		var url	    	= $(this).attr("modact");	
		var request   = $.ajax({
			url			: url,
			method	: "GET",
			data		: { no_surat:no_surat, tgl_surat:tgl_surat, nama:nama, nohp:nohp, dari_toko:dari_toko,ke_toko:ke_toko,ekspedisi:ekspedisi, action:'tat_edit' },
			success	: function(data)
			{
				if(data == "sukses")
				{	
					tblMasTAT.ajax.reload();
					info_sukses();
				}	
				else
				{
					tblMasTAT.ajax.reload();
					info_gagal();
				}	
			}
		});
		request.fail(function(jqXHR, textStatus){ xhr_fail(textStatus);});
	});	

	/* !Tabel master text surat */
	var tblMastxt   = $("#mtext").DataTable({
		"dom"							: "Bt",
		"lengthMenu"			: [[15,20,30],[15,20,30]],			
		"pagingType"			: "full",
		"select"					: false,
		"buttons"					: [	
				{
				"extend"		: 'selectedSingle',
				"text"			: '<i class="fa fa-pencil fa-fw fa-lg"></i>Edit',
				"className"	: 'btn btn-md btn-default',
				"action"		: function() {
					var dtxi 	= tblMastxt.rows({selected: true}).indexes();
					var x 		= tblMastxt.cells( dtxi, 1).data().toArray(); // x adalah array.
					var avxId = x.toString();
					$('#myModal').modal('show'); 
					var url 		= $("#mtext").attr("act");
					var request = $.ajax({
						url			: url,
						method	:"POST",
						data		: {
							postAvxId		: avxId,
							jenis_aksi	: "edit_text_surat"
						},
						success:function(data){
							$(".modal-title").html('Edit Text').show();
							$(".modal-body").html(data).show();
						}
					});
					request.fail(function(jqXHR, textStatus){
						 xhr_fail(textStatus);
					});	
				}
			}
		],				
		"columnDefs"			: [		
			{
        "orderable"	: false,
        "className"	: "select-checkbox",
        "targets"		:  [0],
				"visible"		: false
      }

		],			
		"select"		: {
			"style"		: "os"
    },		
		"order"	: [[ 2, 'desc' ]],						
		"ajax": 
		{
			"url" : $("#mtext").attr("dtTblMaster"),
			"type": "GET",
			"data": {"getdata" : "txt_read"}
		},
		"initComplete": function( settings, json ) {dtTables_complete();}				
	});	
	$(document).on("click", "#text_surat",function(e){ 
			$("#hidden_start").toggle(function(){
				var t = $("#text_surat").text();
				t == "Text Surat" ? t = "Hide" : t = "Text Surat";
				$("#text_surat").text(t);
				e.preventDefault();
			});			
		});
	$(document).on("click","#text_edit", function text_edit(){	
		var avxId 	= $(this).attr("dt_id");		
		var url 		= $("#mtext").attr("act");
		var request = $.ajax({url: url,method:"POST",data:{postAvxId:avxId, jenis_aksi:'edit_text_surat'},
		success:function(data){
		$(".modal-title").html('Teks Surat').show();
		$(".modal-body").html(data).show();
		}});request.fail(function(jqXHR, textStatus){ xhr_fail(textStatus);});
	}); 
	$(document).on("click","#next_edit_txt_surat",function next_edit_txt_surat(){
		var jenis_teks		= $("#jenis_teks").val();
		var header_teks 	= $("#header_teks").val();
		var body_teks 		= $("#body_teks").val();
		var footer_teks 	= $("#footer_teks").val();
		var url	    			= $("#next_edit_txt_surat").attr("modact");	
		var request   		= $.ajax({
			url			: url,
			method	: "GET",
			data		: { jenis_teks:jenis_teks, header_teks:header_teks, body_teks:body_teks, footer_teks:footer_teks, action:'teks_edit' },
			success	: function(data)
			{
				if(data == "sukses")
				{	
					tblMastxt.ajax.reload();
					info_sukses();
				}	
				else
				{
					tblMastxt.ajax.reload();
					info_gagal();
				}	
			}
		});
		request.fail(function(jqXHR, textStatus){ xhr_fail(textStatus);});
	});	

	/* !ubah master alamat pengirim aplop */	
	$(document).on("click","#identitas_data",function identitas_data(){	
		var avxId 	= $(this).attr("id");				
		var url 		= $(this).attr("act");
		var request = $.ajax({
			url			: url,
			method	: "POST",
			data		: { postAvxId:avxId, jenis_aksi:avxId },
			success	: function(data)
			{
				$(".modal-title").html('Alamat Konter').show();
				$(".modal-body").html(data).show();
			}
		});
		request.fail(function(jqXHR, textStatus){ xhr_fail(textStatus); });
	}); 
	$(document).on("click","#next_identitas_data",function next_identitas_data(){	
		var nm_id			= $("#nm_id").val();
		var nm_id_old	= $("#nm_id_old").val();
		var alm_id 		= $("#alm_id").val();
		var kota_id 	= $("#kota_id").val();
		var telp_id 	= $("#telp_id").val();
		var url	    	= $(this).attr("modact");	
		var request   = $.ajax({url: url,method:"GET",data:{nm_id:nm_id, nm_id_old:nm_id_old, alm_id:alm_id, kota_id:kota_id, 
    telp_id:telp_id, action:'id_data'},
		success:function(data){			
		if(data == "sukses"){			
        info_sukses();
			}	
			else
			{
				info_gagal();
			}		
		}});
		request.fail(function(jqXHR, textStatus){ xhr_fail(textStatus);});
	}); 

	/* !Tabel paklaring */
	var tblPaklaring   = $("#tbl_hrd_paklaring").DataTable({
		"dom"							: "<'#headPaklaring'><'row'<'#encapsulate.col-md-2'l><'clearFix col-md-7'<'#wrapinhead'B>><'clearFix col-md-3' f>>t <'row'<'col-md-6' i><'col-md-6' p>>",
		"lengthMenu"			: [[15,20,30],[15,20,30]],			
		"pagingType"			: "full",
		"scrollY"					: "calc(100vh - 380px)",
		"fixedHeader"			: true,
		"scrollCollapse"	: false,
	"select"					: true,
		"buttons"					: [
			{
				"extend"		: "selectAll",
				"text"			: "<i class='fa fa-check-square-o fa-fw fa-lg'></i>All",
				"className"	: "btn btn-md btn-default"				
			}, 
			{
				"extend"			: "selectNone",
				"text"			: "<i class='fa fa-square-o fa-fw fa-lg'></i>",
				"className"	: "btn btn-md btn-default"				
			}, 
			{
				"extend"		: "copyHtml5",
				"titleAttr"	: "Copy",
				"className"	: "btn btn-md btn-info"
			}, 
			{
				"extend"		: "excelHtml5",
				"titleAttr"	: "Excel",
				"className"	: "btn btn-md btn-success"
			}, 
			{
				"extend"		: "csvHtml5",
				"titleAttr"	: "CSV",
				"className"	: "btn btn-md btn-danger"
			},
			{
				"extend"		: "pdfHtml5",
				"titleAttr"	: "PDF",
				"className"	: "btn btn-md btn-warning"
			}, 
			{
				"text"			: '<i class="fa fa-plus fa-fw fa-lg"></i>Add',
				"className"	: 'btn btn-md btn-default',
				"action"		: function(){
					$('#myModal').modal('show'); 
					var avxId 	= 0;				
					var url 		= $("#tbl_hrd_paklaring").attr("act");
					var request = $.ajax({
						url			: url,
						method	: "POST",
						data		:	{
							postAvxId		: avxId, 
							jenis_aksi	:'paklaring_baru'
						},
						success:function(data) {
							$(".modal-title").html('Buat Data').show();
							$(".modal-body").html(data).show();
						}
					});
					request.fail(function(jqXHR, textStatus){
						 xhr_fail(textStatus);
					});	
				}
			}, 
			{
				"extend"		: 'selectedSingle',
				"text"			: '<i class="fa fa-pencil fa-fw fa-lg"></i>Edit',
				"className"	: 'btn btn-md btn-default',
				"action"		: function() {
					var dtxi 	= tblPaklaring.rows({selected: true}).indexes();
					var x 		= tblPaklaring.cells( dtxi, 0).data().toArray(); // x adalah array.
					var avxId = x.toString();
					$('#myModal').modal('show'); 
					var url 		= $("#tbl_hrd_paklaring").attr("act");
					var request = $.ajax({
						url			: url,
						method	:"POST",
						data		: {
							postAvxId		: avxId,
							jenis_aksi	: "paklaring_edit"
						},
						success:function(data){
							$(".modal-title").html('Edit Data').show();
							$(".modal-body").html(data).show();
						}
					});
					request.fail(function(jqXHR, textStatus){
						 xhr_fail(textStatus);
					});	
				}
			},
			{
				"extend"		: 'selected',
				"text"			: '<i class="fa fa-print fa-fw fa-lg"></i>',
        "className"	: 'btn btn-md btn-primary',
				"action"		: function() {
					var dtxi 	= tblPaklaring.rows({selected: true}).indexes();
					var x 		= tblPaklaring.cells( dtxi, 0 ).data().toArray(); // x adalah array.
					printThis(x,'paklaring');		
				}
			}
		],				
		"columnDefs"			: [		
			{
				"targets"		: [0,1],
				"visible"		: true,
				"sortable"	: false
			},
			{
        "orderable"	: false,
        "className"	: "select-checkbox",
        "targets"		:  [0]
      }	
		],			
		"select"		: {
			"style"		: "os"
    },		
		"order"	: [[ 2, 'asc' ]],		
		"ajax"	: 
		{
			"url" 	: $("#tbl_hrd_paklaring").attr("dtTblPakl"),
			"type"	: "GET",
			"data"	: {"getdata" : "paklaring_read"}
		},
		"initComplete": function( settings, json ) {dtTables_complete();}				
	});		
	var pakl_head = "<h1 class='page-header' id='head5'><i class='fa fa-envelope'></i> SUKET <small class='sub-header'>( Paklaring )</small></h1>";	
	if( typeof $("div#headPaklaring") !== "undefined"){ $("div#headPaklaring").html(pakl_head) }	
	$(document).on("click", "#next_pakl_baru", function next_pakl_baru(){
		var no_surat		= $("#no_surat").val();
		var tgl_surat 	= $("#tgl_surat").val();
		var nama_kary 	= $("#nama_kary").val();
		var nik_kary 		= $("#nik_kary").val();
		var tgl_masuk 	= $("#tgl_masuk").val();
		var tgl_keluar 	= $("#tgl_keluar").val();
		var jab_kary		= $("#jab_kary").val();
		var keterangan	= $("#keterangan").val();
		var url 		 		= $(this).attr("modact");
		var request   	= $.ajax({
			url			: url,
			method	: "GET",
			data		: { no_surat:no_surat,tgl_surat:tgl_surat,nama_kary:nama_kary,nik_kary:nik_kary,tgl_masuk:tgl_masuk,tgl_keluar:tgl_keluar,jab_kary:jab_kary,keterangan:keterangan,action:'paklaring_create' },
			success	: function(data)
			{
				if(data == "sukses")
				{	
					tblPaklaring.ajax.reload();
					info_sukses();
				}	
				else
				{
					tblPaklaring.ajax.reload();
					info_gagal();
				}	
			}
		});
		request.fail(function(jqXHR, textStatus){ xhr_fail(textStatus);});
	});	

	/* !Tabel master data spg - masspg */
	var tblMasterSpg   = $("#tbl_mas_spg").DataTable({
		"dom"							: "<'#headMasSpg'><'row'<'#encapsulate.col-md-2'><'clearFix col-md-7'<'#wrapinhead'>><'clearFix col-md-3' f>>t <'row'<'col-md-6' i>><'col-md-12'>B",
		"lengthMenu"			: [[-1],['all']],			
		"pagingType"			: "full",
		"scrollY"					: "calc(100vh - 380px)",
		"scrollX"					: "calc(100vw - 380px)",
		"fixedHeader"			: true,
		"scrollCollapse"	: false,
		"select"					: false,
		"orderFixed"			: [3, 'asc'],
		"rowGroup"				: {
			"startRender"		: null,
			"endRender"			: function ( rows, group ) 
			{
				return group +' ('+rows.count()+' Orang)';
       },
			dataSrc: 3
    },
		"buttons"					: [
			{
				"extend"		: "copyHtml5",
				"titleAttr"	: "Copy",
				"className"	: "btn btn-md btn-info"
			}, 
			{
				"extend"		: "excelHtml5",
				"titleAttr"	: "Excel",
				"className"	: "btn btn-md btn-success"
			}, 
			{
				"extend"		: "csvHtml5",
				"titleAttr"	: "CSV",
				"className"	: "btn btn-md btn-danger"
			},
			{
				"extend"		: "pdfHtml5",
				"titleAttr"	: "PDF",
				"className"	: "btn btn-md btn-warning"
			}
		],				
		"columnDefs"			: [		
			{
				"targets"		: [7,8,9,10,11,12],
				"visible"		: false
			},
			{
				"targets"		: [3,4],
				"className"		: "bg-info text-center"
			}
		],		
		"order"	: [[ 1, 'asc' ]],						
		"ajax": 
		{
			"url" 	: $("#tbl_mas_spg").attr("dtTblSpg"),
			"type"	: "GET",
			"data": function(d){
				d.getdata = "masspg_read";
				d.tahun 	= $('#th_masspg').attr("th_masspg");	
				d.bulan 	= $('#bl_masspg').attr("bl_masspg");	
			}
		},
		"initComplete": function( settings, json ) {dtTables_complete();}			
	});	
	tblMasterSpg.on( 'order.dt search.dt', function(){
		tblMasterSpg.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
			cell.innerHTML = i+1;
		});
  }).draw();	
	
	/* !konstanta */
	const monthNames = ["JANUARI", "FEBRUARI", "MARET", "APRIL", "MEI", "JUNI",  "JULI", "AGUSTUS", "SEPTEMBER", "OKTOBER", "NOPEMBER", "DESEMBER"];
	const d = new Date();	
	var bl_masspg = $('#bl_masspg').attr("bl_masspg") - 1;
	var th_masspg = $('#th_masspg').attr("th_masspg");
	var masterSpg_head = "<h1 class='page-header'><i class='fa fa-envelope'></i> Master SPG <small class='sub-header' id='head6'> ( " + monthNames[bl_masspg] + " - " + th_masspg + " ) </small></h1>";	
	if( typeof $("div#headMasSpg") !== "undefined"){ $("div#headMasSpg").html(masterSpg_head) }	
	$(document).on("click", "#buat_master_spg", function buat_master_spg(){
		var url	    	= $(this).attr("modact");	
		var request   = $.ajax({
			url			: url,
			method	: "GET",
			data		: {action:'buat_master_spg'},
			success	: function(data){			
				if(data == "sukses")
				{	
					location.reload();
				}	
				else
				{				
					info_gagal();
				}	
			}
		});
		request.fail(function(jqXHR, textStatus){ xhr_fail(textStatus);});
	});		
	
});
