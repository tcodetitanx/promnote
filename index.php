<?php
// Import PDF library (TCPDF)
require_once('../invoice/tcpdf/tcpdf.php');

// Get URL variables
$name = $_GET['name'];
$address = $_GET['address'];
$phone = $_GET['phone'];
$amountDue = $_GET['amount_due'];
$lateFees = $_GET['late_fees'];
$miscFees = $_GET['misc_fees'];
$total = $_GET['total'];

// Create a new PDF document
$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);

// Write the content of the promissory note
$pdf->Write(0, "Promissory Note", '', 0, 'C', true, 0, false, false, 0);
$pdf->Ln(10);

$content = "
This promissory note is issued by $name, residing at $address, who agrees to pay the total amount of \$$total (including rent, late fees, and miscellaneous fees).

Eviction Notice Summary:
You are behind on your rent and/or other amounts due. The breakdown is as follows:
- Amount due: \$$amountDue
- Late fees: \$$lateFees
- Miscellaneous fees: \$$miscFees

Within three business days, you must either pay the total amount or vacate the premises.

Failure to comply will result in legal action as described in the attached eviction notice.
";

// Write the promissory note content
$pdf->Write(0, $content, '', 0, '', false, 0, false, false, 0);

// Output the PDF
$pdf->Output('promissory_note.pdf', 'I');
?>
