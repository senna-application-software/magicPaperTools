	<script src="../../plugin/jquery/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../../plugin/jquery/jquery.min.js"><\/script>')</script>
	<script src="../../plugin/pdfmake-0.1/build/pdfmake.min.js"></script>
	<script src="../../plugin/pdfmake-0.1/build/vfs_fonts.js"></script>
	<script src="../../custome/js/pdfmake.js"></script>
	<script>			
		$(document).ready(function(){
      
			$(document).on("click", ".print", function(){	
        window.print("amplop");	
			});
      
			$(document).on("click", ".tutup", function(){	
				window.close("amplop");	
			});  
			
			$(document).on("click", ".pdf", function(){	
				myFunction();
			});
      
		});
	</script>
</body>
</html>