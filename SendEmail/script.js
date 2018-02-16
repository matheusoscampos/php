	$('#status').hide();

	$( "#formContact" ).submit(function( event ) {

		$('#status').fadeIn(200).show();

		event.preventDefault();

		// Foi apenas teste para ver como ficaria o array
		// var dados = $("#formContact").serializeArray();
		var formData = $("#formContact").serialize();
		
		processarEnvioEmail(formData);
	});

	var processarEnvioEmail = function(data){

		var URL = "http://localhost/mail/send.php";

		$.ajax({
			type: "POST",
			url: URL,
			async:false,
			data: data, 
			cache: false,
			async:true,
			error: function (request, error) {
				console.log(error);
			},
			success: function(response){    
				
				if(response.indexOf("SMTP connect() failed") == -1){
					$('#status').html("E-mail foi enviado com sucesso !");
				}else{
					$('#status').html("Erro ao conectar ao servidor de e-mail, credenciais podem estar divergentes.");
				}
				// Escrever no log do servidor
			}
		});
	}
	
	
