<html>
<meta charset="UTF-8">
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Gabarito&family=Onest:wght@300;600&display=swap" rel="stylesheet">
    </head>

<body>

<p>Tu forma ha sido enviada. 
  <br>Recibirás un correo o mensaje de recibido durante las siguientes 24 horas.
  <br>¡Gracias! 
</p>

<?php
$myfile = fopen("test.txt", "a") or die("No se pudo enviar forma.");
//w: reescribe el mismo archivo cada vez que se llena la forma
//a: agrega respuestas al final del archivo
//c: agrega respuestas al inicio del archivo

//fecha y hora de cuando se contestó la forma
date_default_timezone_set('America/Monterrey');
$forma = "Envío de forma:\n" . date('d/m/Y h:i A', time()) . "\n\n";
fwrite($myfile, $forma); 

//con validación de campo vacío
if(empty($_REQUEST['nombre'])) {
  $nombre = "Nombre: –\n" . "\n\n";
} else {
  $nombre = "Nombre:\n" . $_REQUEST['nombre'] . "\n\n";
}
fwrite($myfile, $nombre);

/*sin validación
 $nombre = "Nombre:\n" . $_REQUEST['nombre'] . "\n\n";
fwrite($myfile, $nombre); */

$radiobtn = "Opción de radio button:\n" . $_REQUEST['radiobtn'] . "\n\n";
fwrite($myfile, $radiobtn);

fwrite($myfile, "Opción de checkboxes: " . "\n");
$opciones = $_REQUEST['checkboxes'];
foreach ($opciones as $checkboxes) {
  fwrite($myfile, $checkboxes . "\n");
}
fwrite($myfile, "\n");

$dropdown = "Opción de dropdown:\n" . $_REQUEST['dropdown'] . "\n\n";
fwrite($myfile, $dropdown);

$fecha = "Fecha:\n" . $_REQUEST['fecha'] . "\n\n";
fwrite($myfile, $fecha);

$tiempo = "Hora:\n" . $_REQUEST['tiempo'] . "\n\n";
fwrite($myfile, $tiempo);

$fyh = "Fecha y Hora:\n" . $_REQUEST['fyh'] . "\n\n";
fwrite($myfile, $fyh);

$correo = "Correo:\n" . $_REQUEST['correo'] . "\n\n";
fwrite($myfile, $correo);

$cel = "Celular:\n" . $_REQUEST['cel'] . "\n\n";
fwrite($myfile, $cel);

fwrite($myfile, "---------------------\n\n");

fclose($myfile);
?> 

</body>
</html> 