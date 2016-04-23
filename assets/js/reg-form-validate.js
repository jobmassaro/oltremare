jQuery.validator.setDefaults({
  success: "valid"
});


$("#terms").tooltip();

$("#t2").tooltip();


$('#reg-form').validate({
    rules: {

    			name:{

    				required: true
    			},

				codfiscale: {
					required: true
				},
				surname: {
					required: true
				},

				email: {
					required: true,
					email: true,
					remote: {
						url: "auth/validate-email.php",
						type: "post",
					}
				},
				username: {
					required: true,
					remote: {
						url: "auth/validate-username.php",
						type: "post",
					}
				},
        		p: {
					required: true,
					minlength: min_password 
				},
				confirmpwd: {
					required: true,
					equalTo: "#password",
					minlength: min_password 
				},
				terms: "required"
    },
		messages: {

		name:{
  			required: 'inserisci nome',
		},	

		codfiscale: {
            required: 'inserisci codice fiscale',
            
        },
        surname: {
            required: 'inserisci cognome',
            
        },
        p: {
        	required: 'inserisci password',
        	minlength: 'deve avere almeno 5 caratteri'
        },
        confirmpwd :{
        	required: 'conferma password',
        	minlength: 'deve avere almeno 5 caratteri',
        	equalTo: 'la password non corrisponde'
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
		}
    },
});	