<?php
// Include the TCPDF library
require_once('tcpdf/tcpdf.php');

// Get the GET variables from the form submission
$name = isset($_GET['name']) ? $_GET['name'] : 'N/A';
$address = isset($_GET['address']) ? $_GET['address'] : 'N/A';
$amount_due = isset($_GET['amount_due']) ? $_GET['amount_due'] : '0';
$late_fees = isset($_GET['late_fees']) ? $_GET['late_fees'] : '0';
$misc_fees = isset($_GET['misc_fees']) ? $_GET['misc_fees'] : '0';
$total = $amount_due + $late_fees + $misc_fees;
$signature = isset($_GET['signature']) ? $_GET['signature'] : 'N/A';
$current_date = isset($_GET['date']) ? $_GET['date'] : date("F j, Y");

// Create new PDF document
$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);

// Add title
$pdf->Cell(0, 10, 'Promissory Note', 0, 1, 'C');
$pdf->Ln(10);

// Add promissory note content with eviction notice verbiage
$content = "
This Promissory Note is issued on $current_date by $name, residing at $address.

The undersigned agrees to pay a total of \$$total, which includes the following amounts:
- Rent owed: \$$amount_due
- Late fees: \$$late_fees
- Miscellaneous fees: \$$misc_fees

The total amount is due within three (3) business days. If the amount is not paid in full, the undersigned agrees to vacate the premises immediately. Failure to comply with this agreement will result in legal action, as outlined in the eviction notice.

Additionally, the undersigned understands that failure to pay or vacate will result in the landlord proceeding with a Summons and Complaint for unlawful detainer, which may result in eviction and liability for all amounts owed, including attorney fees, court costs, and other damages as allowed under Utah law.

By signing below, the undersigned acknowledges the terms and agrees to pay the total amount of \$$total.
";

// Add the content to the PDF
$pdf->Write(0, $content);

// Add signature and date
$pdf->Ln(10);
$pdf->Cell(0, 10, "Signature: $signature", 0, 1);
$pdf->Cell(0, 10, "Date: $current_date", 0, 1);

// Output the PDF
$pdf->Output('promissory_note.pdf', 'D');
?>
