<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="ISO-8859-1">
<title>Bug Tracking</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript">
    function validar_form_contato(){
        var nome = formcontato.nome.value;
        var email = formcontato.email.value;
        var assunto = formcontato.assunto.value;
        var mensagem = formcontato.mensagem.value;

        if(nome == ""){
            alert("Campo nome � obrigatorio");
            formcontato.nome.focus();
            return false;
        }if(email == ""){
            alert("Campo email � obrigatorio");
            formcontato.email.focus();
            return false;
        }if(assunto == ""){
            alert("Campo assunto � obrigatorio");
            formcontato.assunto.focus();
            return false;
        }if(mensagem == ""){
            alert("Campo mensagem � obrigatorio");
            formcontato.mensagem.focus();
            return false;
        }
    }
</script>
<!-- Load Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<style>
	body {
  			padding-top: 20px;
  			padding-bottom: 20px;
		}

	.navbar {
  			margin-bottom: 20px;
		}
</style>