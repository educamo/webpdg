<?php


ob_start();
$PDF_HEADER_TITLE = 'Listado de Clientes';
$PDF_MARGIN_HEADER = 30;
$PDF_MARGIN_TOP = 40;
$PDF_MARGIN_LEFT = 5;
$PDF_MARGIN_RIGHT = 6;
$PDF_PAGE_ORIENTATION = 'l';
$PDF_PAGE_FORMAT = 'LETTER';


// Include the main TCPDF library (search for installation path).
require_once('assets/lib/TCPDF/tcpdf.php');


// create new PDF document
$pdf = new TCPDF($PDF_PAGE_ORIENTATION, PDF_UNIT, $PDF_PAGE_FORMAT, true, 'UTF-8', false);

$logo = base_url('assets/img/'.$logo);
$title = $PDF_HEADER_TITLE;





// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Estudiante');
$pdf->SetTitle($PDF_HEADER_TITLE);
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->SetHeaderData('', 15, '', '');



// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins($PDF_MARGIN_LEFT, $PDF_MARGIN_TOP, $PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin($PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists('assets/lib/TCPDF/lang/spa.php')) {
    require_once('assets/lib/TCPDF/lang/spa.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// add a page
$pdf->AddPage();
$pdf->Header();

// Logo
$pdf->Image($logo, 10, 12, 25, '', 'png', '', 'T', true, 300, '', false, false, 0, false, false, false);

// Set font
$pdf->SetFont('helvetica', 'B', 24);

// Title
$pdf->Cell(0, 10, $title, 0, false, 'C', 0, '', 0, false, 'M', 'M');

// set font
$pdf->SetFont('times', 'BI', 12);

$html1 = '
<table class="table" border="0" cellspacing="0">
        <thead>
            <tr>
                <th width="6%">Cliente:</th>
  
                <th width="12%">Cédula Cliente:</th>
   
            </tr>
            <tr>

            </tr>
        </thead>
</table>
<br>
<hr>
<br>
';

// output the HTML content
$pdf->writeHTML($html1, true, false, true, false, '');

// Set some content to print
$html = '
<table class="table" border="1" cellspacing="0">
        <thead>
            <tr align="center">
                <th width="10%">Cédula</th>
                <th width="50%">Nombre</th>
                <th width="40%">Email</th>
            </tr>
        </thead>
</table>
';
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');



foreach ($clientes as $row) {
    $idCliente    = $row->idCliente;
    $nombre       = $row->nombre;
    $email        = $row->email;


    $html2 = '
    <table class="table">
            <tr align="center">
                    <td width="10%">' . $idCliente . '</td>
                    <td width="50%">' . $nombre . '</td>
                    <td width="40%">' . $email . '</td>

            </tr>
    </table
                    ';
    // output the HTML content
    $pdf->writeHTML($html2, true, false, true, false, '');
}



// ---------------------------------------------------------
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
ob_end_clean();
$pdf->Output($PDF_HEADER_TITLE . '.pdf', 'I');
                
                //============================================================+
// END OF FILE
//============================================================+
