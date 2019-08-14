function myFunction(){

		var parameter	    = $("#id_srt").val();
		var url_result	= parameter + ".avx";
		console.log(url_result);
		var request   = $.ajax({url: url_result,method:"GET",data:{parameter:parameter, action:'ajax'},
		success:function(data){

		var docDefinition = { content: data };
		 pdfMake.createPdf(docDefinition).download('optionalName.pdf');
			
		}});request.fail(function(jqXHR, textStatus){alert("Request failed: " + textStatus);});

}