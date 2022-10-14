<?php

require_once '../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try{

  //Variables obtenidas del BACKEND
  $usuario = "Luis Anderson Boada Ramos";
  $destinatario = "Joel Rojas Marcos";
  $cargo = "Jefe de informatica";

  //Arrehlo
  $programas =["Visual Studio Code", "Android Studio", "MS SQL Server", "Erwin"];
  
  ob_start();

  //IMPORTANTE debe inicializar data
  $data = "";

  //Carga los estilo
  include './informe/estilos.html';


  //Páginas:
  include './informe/page-1.php';
  include './informe/page-2.php';
  include './informe/page-3.php';

  //Otras páginas:
  $data .= ob_get_clean();

  //Creando espacio
  $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'utf-8', array(10,10,15,15));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($data);

  $html2pdf->output('reporte-luis.pdf');

}
catch(Html2PdfException $e){
  $html2pdf->clean();
  $formatter = new ExceptionFormatter($e);
  echo $formatter->getHtmlMessage();
}

?>