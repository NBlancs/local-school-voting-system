<?php
include 'includes/session.php';

function generateRow($conn){
    $contents = '';

    $sql = "SELECT * FROM positions ORDER BY priority ASC";
    $query = $conn->query($sql);
    while($row = $query->fetch_assoc()){
        $id = $row['id'];
        $contents .= '
            <tr>
                <td colspan="5" align="center" style="font-size:15px;"><b>'.$row['description'].'</b></td>
            </tr>
            <tr>
                <td width="15%"><b>Photo</b></td>
                <td width="25%"><b>Candidates</b></td>
                <td width="25%"><b>Party List</b></td>
                <td width="25%"><b>Platform</b></td>
                <td width="10%"><b>Votes</b></td>
            </tr>
        ';

        $sql = "SELECT c.*, p.partylist, c.platform FROM candidates c LEFT JOIN tbl_partylist p ON c.partylist_id = p.id WHERE c.position_id = '$id' ORDER BY c.lastname ASC";

        $cquery = $conn->query($sql);
        while($crow = $cquery->fetch_assoc()){
            $sql = "SELECT * FROM votes WHERE candidate_id = '".$crow['id']."'";
            $vquery = $conn->query($sql);
            $votes = $vquery->num_rows;

            // Retrieve candidate photo filename from the database
            $photoFilename = $crow['photo'];
            $photoPath = 'C:/xampp/htdocs/votesystem/images/' . $photoFilename;

            // Ensure the session is not blocking the file fetch
            $opts = array(
                'http' => array(
                    'method' => "GET",
                    'header' => "Accept-language: en\r\n" .
                                "Cookie: " . session_name() . "=" . session_id() . "\r\n"
                )
            );
            $context = stream_context_create($opts);
            session_write_close();  // this is the key

            // Check if the photo file exists before including it
            if(file_exists($photoPath)) {
                $photo = $photoPath;
            } else {
                $photo = 'C:/xampp/htdocs/votesystem/images/profile.jpg'; // Use a default image if file does not exist
            }

            // Convert the file path for TCPDF
            $photo = str_replace('\\', '/', $photo);

            $contents .= '
                <tr>
                    <td style="text-align:center;"><img src="'.$photo.'" alt="Candidate Photo" style="max-width:100%; height:auto;"></td>
                    <td>'.$crow['lastname'].", ".$crow['firstname'].'</td>
                    <td>'.$crow['partylist'].'</td>
                    <td>'.$crow['platform'].'</td>
                    <td style="text-align:center;">'.$votes.'</td>
                </tr>
            ';
        }
    }

    return $contents;
}

$parse = parse_ini_file('config.ini', FALSE, INI_SCANNER_RAW);
$title = $parse['election_title'];

require_once('../tcpdf/tcpdf.php');
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Result: '.$title);
$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont('helvetica');
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(TRUE, 10);
$pdf->SetFont('helvetica', '', 11);
$pdf->AddPage();
$content = '';
$content .= '
    <h2 align="center">'.$title.'</h2>
    <h4 align="center">Tally Result</h4>
    <table border="1" cellspacing="0" cellpadding="3">
  ';
$content .= generateRow($conn);
$content .= '</table>';
$pdf->writeHTML($content);
$pdf->Output('election_result.pdf', 'I');

?>