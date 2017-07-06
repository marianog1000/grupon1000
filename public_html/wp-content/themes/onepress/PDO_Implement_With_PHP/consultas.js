$(document).ready(function() {
    $('#example').DataTable( {
		   
		
			"dom": '<"dt-buttons"Bf><"clear">lirtp',
			"paging": true,
			"autoWidth": true,
			"columnDefs": [
				//{ "bVisible": false, "targets": 0 },
				{ "orderable": false, "targets": 6 }
			],
			"language": {
			"info": "Pagina _PAGE_ de _PAGES_",
			"emptyTable":     "No hay datos....",
			"infoEmpty":      "Mostrando 0 de 0 entradas",
			"infoFiltered":   "(filtrado desde _MAX_ total entradas)",
			"infoPostFix":    "",
			"thousands":      ",",
			"lengthMenu":     "Mostrando _MENU_ entradas",
			"loadingRecords": "Cargando...",
			"processing":     "Procesando...",
			"search":         "Buscar:",
			"zeroRecords":    "No se encontraron registros",
			"paginate": {
				"first":      "Primero",
				"last":       "Último",
				"next":       "Siguiente",
				"previous":   "Anterior"
			}},
			
			"buttons": [
				'colvis',
				'copyHtml5',
				'csvHtml5',
				'excelHtml5',
				'pdfHtml5',
				'print'
			],
			
		}
	);

	$('[data-toggle="tooltip"]').tooltip();

		 
 	$('.dt-add').each(function () {
		/*$(this).on('click', function(evt){
			document.location.href = "nuevaconsulta" ;
			
		});*/
		
		$(this).on('click', function(evt){
			$this = $(this);			
			
			var dtRow = $this.parents('tr');			
			var form = $('<form action="nuevaconsulta" method="post">' +
			  '<input type="text" name="idd" value="' + varjs +'" />' +
			  '</form>');
			$('body').append(form);
			form.submit();
			
		});		
		
	});
	
	
	$('.dt-consultas').each(function () {
		
		$(this).on('click', function(evt){
			$this = $(this);			
			
			//var dtRow = $this.parents('tr');	
			//document.location.href = "../modificarhistoriaclinica?id=" + dtRow[0].cells[0].innerHTML ;
			
			var dtRow = $this.parents('tr');			
			var form = $('<form action="../consultas" method="post">' +
			  '<input type="text" name="idd" value="' + dtRow[0].cells[0].innerHTML + '" />' +
			  '</form>');
			$('body').append(form);
			form.submit();
			
		});
	}); 
	
	
	//Edit row buttons
	$('.dt-edit').each(function () {
		
		
		$(this).on('click', function(evt){
			$this = $(this);			
			
			//var dtRow = $this.parents('tr');	
			//document.location.href = "../modificarhistoriaclinica?id=" + dtRow[0].cells[0].innerHTML ;
			
			var dtRow = $this.parents('tr');			
			var form = $('<form action="../modificarhistoriaclinica" method="post">' +
			  '<input type="text" name="idd" value="' + dtRow[0].cells[0].innerHTML + '" />' +
			  '</form>');
			$('body').append(form);
			form.submit();
			
		});
	}); 
	
	
			//delete row buttons
	$('.dt-delete').each(function () {
		
		
		$(this).on('click', function(evt){
			$this = $(this);			
			
			//var dtRow = $this.parents('tr');	
			//document.location.href = "../modificarhistoriaclinica?id=" + dtRow[0].cells[0].innerHTML ;
			
			var dtRow = $this.parents('tr');			
			var form = $('<form action="../borrarhistoriaclinica" method="post">' +
			  '<input type="text" name="idd" value="' + dtRow[0].cells[0].innerHTML + '" />' +
			  '</form>');
			$('body').append(form);
			form.submit();
			
		});
	});
	
	
	
	
	
	
	
	
	/*
	
	
	
	
	//Edit row buttons
	$('.dt-edit').each(function(){
		
		
		alert('entra1');
		
		/*$(this).on('click', function(evt){
			
			alert('entra2');
			
			$this = $(this);
			var dtRow = $this.parents('tr');
			
			alert(dtRow[0].cells[0]);
			document.location.href = "visualhistoriaclinica.php?id=" + dtRow[0].cells[0] ;
			
			
			/*
			$.post("visualhistoriaclinica", {coche: "Ford", modelo: "Focus", color: "rojo"}, function(htmlexterno){
				$("#cargaexterna").html(htmlexterno);
    		});
<a href="visualhistoriaclinica?id=<?php //echo $row['id']; ?>" 
			*/
			
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		/*
		
		$(this).on('click', function(evt){
			$this = $(this);
			var dtRow = $this.parents('tr');
			$('div.modal-body').innerHTML='';
			$('div.modal-body').append('Row index: '+dtRow[0].rowIndex+'<br/>');
			$('div.modal-body').append('Number of columns: '+dtRow[0].cells.length+'<br/>');
			for(var i=0; i < dtRow[0].cells.length; i++){
				$('div.modal-body').append('Cell (column, row) '+dtRow[0].cells[i]._DT_CellIndex.column+', '+dtRow[0].cells[i]._DT_CellIndex.row+' => innerHTML : '+dtRow[0].cells[i].innerHTML+'<br/>');
			}
			$('#myModal').modal('show');
		});  
	});*/
	//Delete buttons
/*	$('.dt-delete').each(function () {
		$(this).on('click', function(evt){
			
			$this = $(this);
			var dtRow = $this.parents('tr');
			if(confirm("Are you sure to delete ok this row?")){
				var table = $('#example').DataTable();
				table.row(dtRow[0].rowIndex-1).remove().draw( false );
			}
		});
	});*/
	$('#myModal').on('hidden.bs.modal', function (evt) {
		$('.modal .modal-body').empty();
	});
	
	
	
	

} );
