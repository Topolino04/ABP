$(document).ready(function () {
 	 //Validation data form
    $.validator.addMethod('positiveNumber',
    function (value) { 
        return Number(value) > 0;
    }, 'Intorduce un número positivo');

    $("#form").validate({
		
	   error: function(label) {
       $(this).addClass("error");
     },	
      rules: {
		tabla: {
			required: true		
			},
		  
		deportista: {
			required: true		
			},
		  
        nombre: {
            required: true,              
            minlength: 2     
            },
        entrenador: {
            required: true,
                 
            },
        duracion: {
            required: true,
            maxlength:5,
			minlength: 5  
              
               },
        hora: {
            required: true,              
            maxlength:5,
			minlength: 5  			  
            },
		plazas: {
            required: true,
			digits: true,              
            maxlength:2,
			max:40,
            positiveNumber:true
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
		 tabla: {             
            required:"Selecciona una tabla por favor"            
            },
		deportista: {             
            required:"Selecciona un deportista por favor"            
            },
		  
        nombre: {             
            required:"Introduce un nombre por favor",
            minlength:"M&iacute;nimo 2 caracteres por favor"
            },
        entrenador: {             
            required:"Selecciona un entrenador por favor",
             
              },
        duracion:{
            required:"Introduce una duraci&oacute;n por favor",
            maxlength:"Formato no v&aacute;lido (HH:MM)",
			minlength:"Formato no v&aacute;lido (HH:MM)"
            },
        hora:{
            required:"Introduce una hora por favor",                            
            maxlength:"Formato no v&aacute;lido (HH:MM)",
			minlength:"Formato no v&aacute;lido (HH:MM)"			  
            },
		plazas:{
            required:"Introduce un n&uacute;mero de plazas por favor",                            
            maxlength:"M&aacute;ximo 2 n&uacute;meros por favor",
			digits:"Introduce un n&uacute;mero positivo por favor",
			max:"M&aacute;ximo 40 plazas",
            positiveNumber: "Positivo"
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
			  $("#form").prop("disabled", true); 
                            // do other things for a valid form
                            form.submit();
                         }

        
    });
  });