<?php
$issuer_name = $_GET['issuer_name'] ?? '';
$issuer_address = $_GET['issuer_address'] ?? '';
$issuer_phone = $_GET['issuer_phone'] ?? '';
$name = $_GET['name'] ?? '';
$address = $_GET['address'] ?? '';
$phone = $_GET['phone'] ?? '';
$amount_due = $_GET['amount_due'] ?? '';
$late_fees = $_GET['late_fees'] ?? '';
$misc_fees = $_GET['misc_fees'] ?? '';
$misc_fees_description = $_GET['misc_fees_description'] ?? '';
$total = $_GET['total'] ?? '';
$notice_date = $_GET['notice_date'] ?? '';
$eviction_date = $_GET['eviction_date'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promissory Note Preview</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Promissory Note Preview</h1>
        <div class="preview">
This Promissory Note is issued on <?php echo $notice_date; ?> by <?php echo $issuer_name; ?>, residing at <?php echo $issuer_address; ?> (Phone: <?php echo $issuer_phone; ?>).

The undersigned, <?php echo $name; ?>, residing at <?php echo $address; ?> (Phone: <?php echo $phone; ?>), agrees to pay a total of $<?php echo $total; ?>, which includes the following amounts:
- Amount due: $<?php echo $amount_due; ?>
- Late fees: $<?php echo $late_fees; ?>
- Miscellaneous fees: $<?php echo $misc_fees; ?>
<?php if ($misc_fees_description): ?>  Description: <?php echo $misc_fees_description; ?><?php endif; ?>

The total amount is due by <?php echo $eviction_date; ?>. If the amount is not paid in full, the undersigned agrees to vacate the premises immediately. Failure to comply with this agreement will result in legal action, as outlined in the eviction notice.

Additionally, the undersigned understands that failure to pay or vacate will result in the landlord proceeding with a Summons and Complaint for unlawful detainer, which may result in eviction and liability for all amounts owed, including attorney fees, court costs, and other damages as allowed under applicable law.

By signing below, the undersigned acknowledges the terms and agrees to pay the total amount of $<?php echo $total; ?>.

Signature: ____________________________
Date: ________________________________
        </div>
        <div class="buttons">
            <a href="generate_pdf.php?<?php echo $_SERVER['QUERY_STRING']; ?>" target="_blank">Download PDF</a>
            <a href="#" onclick="window.print();">Print</a>
        </div>
    </div>
</body>
</html>