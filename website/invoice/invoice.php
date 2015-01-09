<?php

 require '../includes/config.php';
$invoiceid = Security($_GET["invoice"]);

if ($invoiceid == "")
{
    header ('Location: ../index.php');
}
elseif(is_numeric($invoiceid))
{
    // get the HTML
    ob_start();
    include(dirname(__FILE__).'./res/invoice_template.php');
    $content = ob_get_clean();

    // convert to PDF
    require_once(dirname(__FILE__).'./html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'nl');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('Invoice-'.$invoiceid.'.pdf');
    }
    catch(HTML2PDF_exception $e) {
    die($e);
    }
}
else
{
     header ('Location: ../index.php');
}
