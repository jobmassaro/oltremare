jQuery.validator.setDefaults({
  success: "valid"
});

$( "#datanascita" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });

$( "#datarilascio" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });


$( "#datarilasciomedico" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });


$( "#pagatoil" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });




$( "#datafattura" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });







$('#edit-form').validate({
    rules: {
				codfiscale: {
					required: true
				},
				partitaiva: {
					required: true
				},
				
				numerocartacredito:{
					required:true,
					number: true	
				},



    },
		messages: {

		codfiscale: {
            required: 'inserisci codice fiscale',
            
        },
        partitaiva: {
            required: 'inserisci partita iva',
            
        },
       	email: {
            required: 'inserisci email valida',
            remote: 'email gia\'\ in uso !'
        },
		username: {
            required: 'inserisci username',
            remote: 'username in uso !'
        },
		terms: {
			required: 'devi accettare termini e condizioni' 
		},
		numerocartacredito:{
			required: 'Carta di credito non valida ' 	
		}

    },
});	

