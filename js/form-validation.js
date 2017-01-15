//New rule validate DNI
    jQuery.validator.addMethod( "dni_valido", function ( value, element ) {
    "use strict";
 
     value = value.toUpperCase();
     
     // Basic format test
     if ( !value.match('((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)') ) {
      return false;
     }
     
     // Test NIF
     if ( /^[0-9]{8}[A-Z]{1}$/.test( value ) ) {
      return ( "TRWAGMYFPDXBNJZSQVHLCKE".charAt( value.substring( 8, 0 ) % 23 ) === value.charAt( 8 ) );
     }
     // Test specials NIF (starts with K, L or M)
     if ( /^[KLM]{1}/.test( value ) ) {
      return ( value[ 8 ] === String.fromCharCode( 64 ) );
     }
     
     return false;
     
    });
$(document).ready(function () {
 	 //Validation data form

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
            },          			
        lugar: {
              required: true,
			  minlength:2 
            },
        decripcion: {              
			  minlength:2,
              maxlength:149			  
            }, 
        DNI: {              
              required:true,
              dni_valido:true        
            },  
        Telefono:{
          maxlength:9
        },
             
           
      },

                
          submitHandler: function(form) {
			  $("#form").prop("disabled", true); 
                            // do other things for a valid form
                            form.submit();
                         }

        
    });
  });