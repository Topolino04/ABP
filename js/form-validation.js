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
        nifES: {              
              required:true         
            },        
           
      },

                
          submitHandler: function(form) {
			  $("#form").prop("disabled", true); 
                            // do other things for a valid form
                            form.submit();
                         }

        
    });
  });