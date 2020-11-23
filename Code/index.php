<!doctype html>
<html>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109627722-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-109627722-1');
</script>
<meta charset="utf-8">
<title>TRABALHO 5 SEGURANÇA COMPUTACIONAL</title>

<link href="bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="estilos.css" media="screen" />
<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="js/jquery-2.2.3.min.js" type="text/javascript"></script>
<script src="bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script type="text/javascript" async src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=AM_CHTML"></script>
<script>
</script>
</head>
<body>

<br>
<br>
<center>
<div class="title">Criptografia de texto ASSIMÉTRICA</div>
<form  autocomplete="off" id="form1" name="form1" method="POST">
<div class="container">
<div class="panel panel-default" style="background-color:#ff9966">
<center>
  <div class="panel-body">
   
	<div class="form-group col-md-4">
    <label for="metodo">Chave</label>
		<select name="metodo" id="metodo"  class="form-control" ><option value="RSA"> RSA </option> <option value="ECDSA">ECDSA </option></select>
    </div>
	<div class="panel panel-default col-md-4" style="background-color: rgba(255, 238, 230, 1)">
		 <div class="form-group col-md-9">
		  <label >Palavra a ser criptografada</label>
			<input type="text" name="entrada" id="entrada"  class="form-control" >
		</div>
		<div class="form-group col-md-9">
		  <label >Passphrase</label>
			<input type="text" name="passphrase" id="passphrase"  class="form-control" >
		</div>
	</div>
	<div class="form-group col-md-1">
	<br>
		<input class="form-check" type="checkbox" name="tipo" id="tipo"> <label for="tipo">Utilizar chave salva</i></label><br>
	</div>

    <div class="form-group col-md-9"><center>
		<input type="reset" class="btn  btn-default" value="Limpar">
		<button type="submit" class="btn  btn-default" value="Criptografar" ><span class="glyphicon glyphicon-lock"></span>  </button>
		</center>
    </div>
  </div>
  </center>
</div>
</form>

<form  autocomplete="off" id="form2" name="form2">

</form>
</center>
</body>
</html>
<script type="text/javascript">
 jQuery(document).ready(function(){
            jQuery('#form1').submit(function(){
                var dados = jQuery( this ).serialize();
                jQuery.ajax({
                    type: "POST",
                    url: "criptografia.php",
                    data:dados,
                    success: function(data)
                    {  
						$("#form2").append("<div class='container'><div class='panel panel-default' style='background-color:#ffccb3'>"+data+"</div></div>"); 
						
                        
						//alert(data);
                    }
                    
                });
				$('#form2').empty()
                return false;
                });
        });
   </script>
