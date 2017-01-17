  $().ready(function () {
	/* Capturar el click del botón */
	$("#altaActividad").on("click", function()
   {
		/* Validar el formulario */
		$("#form").validate
			 ({			  
		  rules: {
			nombre: {
				  required: true,              
				  minlength: 2     
				},
			entrenador: {
				  required: true,
					 
				},
			duracion: {
				  required: true,
				  maxlength:8,
				  minlength: 8  
				  
				   },
			hora: {
				  required: true,              
				  maxlength:8,
				  minlength: 8  			  
				},
			plazas: {
				  required: true,
				  digits: true,              
				  maxlength:2,
				  max:40
				},          			
			lugar: {
				  required: true,
				  minlength:2 
				},
			decripcion: {              
				  minlength:2			  
				},
			comentario: {              
				  minlength:2			  
				}
		  },
		  messages: {
			nombre: {             
				required:"Introduce un nombre por favor",
				minlength:"Mínimo 2 caracteres por favor"
				},
			entrenador: {             
				required:"Selecciona un entrenador por favor",
				 
				  },
			duracion:{
				required:"Introduce una duracion por favor",
				maxlength:"Formato no valido (HH:MM:SS)",
				minlength:"Formato no valido (HH:MM:SS)"
				},
			hora:{
				required:"Introduce una hora por favor",                            
				maxlength:"Formato no valido (HH:MM:SS)",
				minlength:"Formato no valido (HH:MM:SS)"			  
				},
			plazas:{
				required:"Introduce un numero de plazas por favor",                            
				maxlength:"Máximo 2 numeros por favor",
				digits:"Introduce un número por favor",
				max:"Máximo 40 plazas"
				},	  
			lugar: {             
				required:"Introduce un lugar por favor",
				minlength:"Al menos 2 letras por favor"
				},
			decripcion: {      
				minlength:"Al menos 2 letras por favor"
				},
			comentario: {      
				minlength:"Al menos 2 letras por favor"
				},
		  },
		  submitHandler: function(form) {
			  form.submit();
		  }
		});
	});
});