   $(document).ready(function(){

		$( "#cancelar" ).click(function() {
			
			var hv = document.getElementById('id').value;
			var form = $('<form action="consultaspaciente" method="post">' +
			  '<input type="text" name="idd" value=" ' + hv + '" />' +
			  '</form>');
			$('body').append(form);
			form.submit();
		});
		
		
		
		
		$( "#cancelando" ).click(function() {
			
			var hv = document.getElementById('id').value;
			var form = $('<form action="../consultaspaciente" method="post">' +
			  '<input type="text" name="idd" value=" ' + hv + '" />' +
			  '</form>');
			$('body').append(form);
			form.submit();
		});
		
		$( "#eliminar" ).click(function() {
			
			var id = document.getElementById('id').value;
			var nro_consulta = document.getElementById('nro_consulta').value;
			var form = $('<form action="borrarconsulta" method="post">' +
			  '<input type="text" name="id" value=" ' + id + '" />' +
			  '<input type="text" name="nro_consulta" value=" ' + nro_consulta + '" />' +
			  '<input type="text" name="borrar" value="si" />' +
			  '</form>');
			$('body').append(form);
			form.submit();
		});
			
		$( "#eliminarhc" ).click(function() {
			
			var id = document.getElementById('id').value;
			var form = $('<form action="borrarhistoriaclinica" method="post">' +
			  '<input type="text" name="id" value=" ' + id + '" />' +
			  '<input type="text" name="borrarhc" value="si" />' +
			  '</form>');
			$('body').append(form);
			form.submit();
		});			

		 $('.modal-trigger').leanModal();
		

//jQuery(function($) { // 
// jQuery code is in here
		/*
		 $("a").click(function () {
			 
				$iddd = '<?php $id ?>' ;
				var form = $('<form action="consultaspaciente" method="post">' +
				  '<input type="text" name="idd" value=" $iddd " />' +
				  '</form>');
				$('body').append(form);
				form.submit();	
		});
		*/
//});


			
			

   });
        
		
	function calcula_edad(Fecha){
		fecha = new Date(Fecha);
		
		hoy = new Date();
		ed = parseInt((hoy -fecha)/365/24/60/60/1000);
		document.getElementById('edad').value = ed ;
	}

	
		$( "#volverrr" ).click(function() {
			
			
			var hv = document.getElementById('id').value;
			var form = $('<form action="volverconsulta" method="post">' +
			  '<input type="text" name="idd" value=" ' + hv + '" />' +
			  '</form>');
			$('body').append(form);
			form.submit();
		});
		
