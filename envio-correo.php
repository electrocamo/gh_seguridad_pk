<?php 
//Comprobamos que se haya presionado el boton enviar
if(isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['telefono']) && isset($_POST['mensaje'])){
	//Guardamos en variables los datos enviados
	echo "se trata de eniar correo";
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
    $telefono = $_POST['telefono'];
	$mensaje = $_POST['mensaje'];
	
	///Validamos del lado del servidor que el nombre y el email no estén vacios
	if($nombre == ''){
		echo "Debe ingresar su nombre";
	}
	else if($email == ''){
		echo "Debe ingresar su email";
    }else{
	$para = "electrocamo@gmail.com";//Email al que se enviará
	$asunto = "Contacto Web Genios Tecnologicos";//Puedes cambiar el asunto del mensaje desde aqui
	//Este sería el cuerpo del mensaje
	$mensaje = "
		<table border='0' cellspacing='3' cellpadding='2'>
		  <tr>
			<td width='30%' align='left' bgcolor='#f0efef'><strong>Nombre:</strong></td>
			<td width='80%' align='left'>$nombre</td>
		  </tr>
          <tr>
			<td width='30%' align='left' bgcolor='#f0efef'><strong>Celular:</strong></td>
			<td width='80%' align='left'>$telefono</td>
		  </tr>
		  <tr>
			<td align='left' bgcolor='#f0efef'><strong>E-mail:</strong></td>
			<td align='left'>$email</td>
		  </tr>
		  <tr>
			<td align='left' bgcolor='#f0efef'><strong>Comentario:</strong></td>
			<td align='left'>$mensaje</td>
		  </tr>
	</table>	
";	
	
//Cabeceras del correo
    $headers = "From: $nombre <$email>\r\n"; //Quien envia?
    $headers .= "X-Mailer: PHP/" . phpversion();
    $headers .= 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //
	
//Comprobamos que los datos enviados a la función MAIL de PHP estén bien y si es correcto enviamos
	if(mail($para, $asunto, $mensaje, $headers)){
        /* El mensaje se envio normalmente */
        echo 1;
	}else{
		/* el mensaje no se envio */
        echo 0;
	}
}
}else{
    echo 2;
}	
?>