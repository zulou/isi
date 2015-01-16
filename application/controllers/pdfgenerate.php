<?php

class Pdfgenerate extends CI_Controller {

    function index() {
        echo "index";
    }

    public function service_login($usuario = '', $clave = '') {

        $this->load->model('service_model');
        $log = $this->service_model->login($usuario, $clave);

        while ($fila = mysql_fetch_array($log)) {
            $key = $fila['pk_usuario'];
        }
        if ($log) {

            echo json_encode(array(
                'access' => true,
                'key' => 1,
                'usuario' => $usuario
            ));
        } else {
            echo json_encode(array(
                'access' => false
            ));
        }
    }

    function consult() {
        $this->load->model('pdf_model');
        $result = $this->pdf_model->acta_nacimiento();

        $nombre_nacido;
        $ap_pat_nacido;
        $ap_mat_nacido;
        $fecha_nac_nacido;

        $nombre_ma;
        $ap_pat_ma;
        $ap_mat_ma;
        $fecha_nac_ma;


        $nombre_pa;
        $ap_pat_pa;
        $ap_mat_pa;
        $fecha_nac_pa;

        //mysql_fetch_array($result);
        $i = 0;
        while ($res = mysql_fetch_array($result)) {
            if ($i == 0) {

                $nombre_ma = $res[0];
                $ap_pat_ma = $res[1];
                $ap_mat_ma = $res[2];
                $fecha_nac_ma = $res[3];
            }

            if ($i == 1) {
                $nombre_pa = $res[0];
                $ap_pat_pa = $res[1];
                $ap_mat_pa = $res[2];
                $fecha_nac_pa = $res[3];
            }
            if ($i == 2) {

                $nombre_nacido = $res[0];
                $ap_pat_nacido = $res[1];
                $ap_mat_nacido = $res[2];
                $fecha_nac_nacido = $res[3];
            }
            $i++;
        }
        echo $nombre_nacido . " " . $ap_pat_nacido . " " . $ap_mat_nacido . " " . $fecha_nac_nacido . "<br>";
        echo $nombre_pa . " " . $ap_pat_pa . " " . $ap_mat_pa . " " . $fecha_nac_pa . "<br>";
        echo $nombre_ma . " " . $ap_pat_ma . " " . $ap_mat_ma . " " . $fecha_nac_ma . "<br>";
    }

    function pdf($usuario,$clave) {



        $this->load->library('tcpdf/tcpdf.php');
        $this->load->model('pdf_model');
        $result = $this->pdf_model->acta_nacimiento();

        $nombre_nacido;
        $ap_pat_nacido;
        $ap_mat_nacido;
        $fecha_nac_nacido;
        $direccion_nacido;

        $nombre_ma;
        $ap_pat_ma;
        $ap_mat_ma;
        $fecha_nac_ma;
        $direccion_madre;


        $nombre_pa;
        $ap_pat_pa;
        $ap_mat_pa;
        $fecha_nac_pa;
        $direccion_padre;

        //mysql_fetch_array($result);
        $i = 0;
        while ($res = mysql_fetch_array($result)) {
            if ($i == 0) {

                $nombre_ma = $res[0];
                $ap_pat_ma = $res[1];
                $ap_mat_ma = $res[2];
                $fecha_nac_ma = $res[3];
                $direccion_madre = $res[4];
            }

            if ($i == 1) {
                $nombre_pa = $res[0];
                $ap_pat_pa = $res[1];
                $ap_mat_pa = $res[2];
                $fecha_nac_pa = $res[3];
                $direccion_padre = $res[4];
            }
            if ($i == 2) {

                $nombre_nacido = $res[0];
                $ap_pat_nacido = $res[1];
                $ap_mat_nacido = $res[2];
                $fecha_nac_nacido = $res[3];
                $direccion_nacido = $res[4];
            }
            $i++;
        }


// create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//$pdf->setPrintHeader(false);
//$pdf->setPrintFooter(false);
// set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuniasdasdas');
        $pdf->SetTitle('TCPDF Example 001');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
        $pdf->SetHeaderData('muni1.jpg', 182, NULL, NULL, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));
// set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', 16));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetMargins(PDF_MARGIN_LEFT, '45', PDF_MARGIN_RIGHT);

        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);



// set auto page breaks        
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

// ---------------------------------------------------------
// set default font subsetting mode
        $pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
        $pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

// set text shadow effect
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

// Set some content to print
        $html = <<<EOD
<h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
<i>This is the first example of TCPDF library.</i>
<p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
<p>Please check the source code documentation and other examples for further information.</p>
<p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
EOD;
        $nombre = "asssssssssssssssssssssssssssssssssssssss";
        $html2 = <<<EOD
       <html >
                
                <p>la Municipalidad Provincial de Puno, suscribe</p>
                <p> <b>Certifica:</b> Que en el libro de nacimientos existe una partida</p>
                <p> <b>Fecha de inscripción:</b> 18/08/2014</p>
                
                
                <table border="2"  cellspacing="6" cellpadding="15">
                
                <tr>                
                <td>
                <table >
                <tr style="background-color:#008800">
                    
                    <td colspan="2" >Datos del Nacido:</td>
                </tr>
                
                <tr>
                    <td>Nombres y Apellidos:</td>
                    <td>$nombre_nacido $ap_pat_nacido $ap_mat_nacido</td>
                </tr>
                
                <tr>
                    <td>Sexo:</td>
                    <td>Masculino</td>
                </tr>
                
                <tr>
                    <td>Lugar:</td>
                    <td>$direccion_nacido</td>
                </tr>
                
                <tr>
                    <td>Fecha de Nacimiento:</td>
                    <td>$fecha_nac_nacido</td>
                </tr>
                
                </table>
                </td>                
                </tr>
                
                
                    <tr>                
                <td>
                <table>
                       <tr>
                <td colspan="2">Datos del Padre:</td>
                </tr>
                <tr>
                    <td>Nombres y Apellidos:</td>
                    <td>$nombre_pa $ap_pat_pa $ap_pat_ma</td>
                </tr>
                <tr>
                    <td>Edad:</td>
                    <td>25</td>
                </tr>             
                    
                <tr>
                    <td>DNI:</td>
                    <td>12377809</td>
                </tr>
                <tr>
                    <td>Direccion</td>
                    <td>$direccion_padre</td>
                </tr>
                </table>
                </td>
                </tr>      
                
                
                
                
                <tr>                
                <td>
                <table>
                    
                <tr>
                <td colspan="2">Datos de la Madre:</td>
                </tr>
                
                <tr>
                    <td>Nombres y Apellidos:</td>
                    <td>$nombre_ma $ap_pat_ma $ap_mat_ma</td>
                </tr>
                <tr>
                    <td>Edad:</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>DNI:</td>
                    <td>2089798789</td>
                </tr>
                <tr>
                    <td>Domicilio:</td>
                    <td>$direccion_madre</td>
                </tr>
                </table>
                </td>
                </tr>
                
                
                      
                
                
                
                
                <tr>
                <td>
                <table>
                
                 <tr>
                <td colspan="2">Observaciones:</td>
                <td>Sin observaciones</td>
                </tr>
                
                
                </table>
                </td>
                </tr>
                
                
                
                
                
                
                
                
                </table>
       </html>
       
EOD;
// Print text using writeHTMLCell()
//        $pdf->writeHTMLCell(0, 0, '', '', $html2, 0, 1, 0, true, '', true);

        $pdf->writeHTML($html2, true, false, true, false, '');


// ---------------------------------------------------------
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
        $pdf->Output('Pedro.pdf', 'F');
    }

}
