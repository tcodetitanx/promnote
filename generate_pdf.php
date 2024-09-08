<?php
require_once('../invoice/tcpdf/tcpdf.php');

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Company Name');
$pdf->SetTitle('Promissory Note');
$pdf->SetSubject('Promissory Note Agreement');
$pdf->SetKeywords('Promissory Note, Agreement, Legal Document');

// Remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);

// Get data from GET parameters
$issuer_name = $_GET['issuer_name'];
$issuer_address = $_GET['issuer_address'];
$issuer_phone = $_GET['issuer_phone'];
$name = $_GET['name'];
$address = $_GET['address'];
$phone = $_GET['phone'];
$amount_due = $_GET['amount_due'];
$late_fees = $_GET['late_fees'];
$misc_fees = $_GET['misc_fees'];
$misc_fees_description = $_GET['misc_fees_description'];
$total = $_GET['total'];
$notice_date = $_GET['notice_date'];
$eviction_date = $_GET['eviction_date'];

// Create the content
$content = <<<EOD
<h1>Promissory Note Agreement</h1>

<p>This Promissory Note is issued on {$notice_date} by {$issuer_name}, residing at {$issuer_address} (Phone: {$issuer_phone}).</p>

<p>The undersigned, {$name}, residing at {$address} (Phone: {$phone}), agrees to pay a total of \${$total}, which includes the following amounts:</p>
<ul>
    <li>Amount due: \${$amount_due}</li>
    <li>Late fees: \${$late_fees}</li>
    <li>Miscellaneous fees: \${$misc_fees}</li>
</ul>
EOD;

if ($misc_fees_description) {
    $content .= "<p>Description of miscellaneous fees: {$misc_fees_description}</p>";
}

$content .= <<<EOD
<p>The total amount is due by {$eviction_date}. If the amount is not paid in full, the undersigned agrees to vacate the premises immediately. Failure to comply with this agreement will result in legal action, as outlined in the eviction notice.</p>

<p>Additionally, the undersigned understands that failure to pay or vacate will result in the landlord proceeding with a Summons and Complaint for unlawful detainer, which may result in eviction and liability for all amounts owed, including attorney fees, court costs, and other damages as allowed under applicable law.</p>

<p>By signing below, the undersigned acknowledges the terms and agrees to pay the total amount of \${$total}.</p>

<p>Signature: ____________________________</p>
<p>Date: ________________________________</p>
EOD;

// Write the content
$pdf->writeHTML($content, true, false, true, false, '');

// Add footer with legal verbiage
$pdf->SetY(-15);
$pdf->SetFont('helvetica', '', 8);
$pdf->MultiCell(0, 10, 'Copyright 2010-2020. This form verbiage provided by the Law Offices of Jeremy M. Shorts, LLC and may be used by landlords within the state of Utah. Use of this form shall not constitute legal representation by this firm. Visit www.utahevictionlaw.com for more landlord forms and materials. Phone: 801 - 610 - 9879. Rev 5/12/2020', 0, 'C');

// Output the PDF
$pdf->Output('promissory_note.pdf', 'I');