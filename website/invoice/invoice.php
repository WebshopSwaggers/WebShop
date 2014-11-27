<?php
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */
 ini_set("display_errors","On");
 require '../includes/config.php';
$invoiceid = Security($_GET["invoice"]);

if ($invoiceid == ""){

     header ('Location: Https://yor-game.nl/klanten/index.php');
}elseif(is_numeric($invoiceid)){
    // get the HTML
    ob_start();
    include(dirname(__FILE__).'./res/exemple06.php');
    $content = ob_get_clean();

    // convert to PDF
    require_once(dirname(__FILE__).'./html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('exemple06.pdf');
    }
    catch(HTML2PDF_exception $e) {
    die($e);
    }
}else{
     header ('Location: Https://yor-game.nl/klanten/index.php');
}
