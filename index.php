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
    <style>
        .preview {
            white-space: pre-line;
            line-height: 1.6;
        }
        .signature-input {
            font-style: italic;
            border: none;
            border-bottom: 1px solid #000;
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Promissory Note Preview</h1>
        <div class="preview">
This Promissory Note is issued on <?php echo $notice_date; ?>.

Issuer: <?php echo $issuer_name; ?><div class="gap"></div>
Address: <?php echo $issuer_address; ?><div class="gap"></div>
Phone: <?php echo $issuer_phone; ?><div class="gap"></div>

The undersigned:
Name: <?php echo $name; ?><div class="gap"></div>
Address: <?php echo $address; ?><div class="gap"></div>
Phone: <?php echo $phone; ?><div class="gap"></div>

Agrees to pay a total of $<?php echo $total; ?>.

This amount includes:
- Rent/Monies due: $<?php echo $amount_due; ?><div class="gap"></div>
- Late fees: $<?php echo $late_fees; ?><div class="gap"></div>
- Miscellaneous fees: $<?php echo $misc_fees; ?><div class="gap"></div>

<?php if ($misc_fees_description): ?>Description of miscellaneous fees: <?php echo $misc_fees_description; ?><?php endif; ?>

The total amount is due by <?php echo $eviction_date; ?>.

If not paid in full, the undersigned agrees to vacate immediately.

Failure to comply will result in legal action.

The undersigned understands that failure to pay or vacate will result in:
- A Summons and Complaint for unlawful detainer
- Possible eviction
- Liability for all amounts owed
- Attorney fees
- Court costs
- Other damages as allowed by law

By signing below, the undersigned acknowledges the terms.
They agree to pay the total amount of $<?php echo $total; ?>.

Signature: <input type="text" id="signature" class="signature-input" placeholder="Type your full name to sign">
Date: <input type="date" id="signatureDate" class="signature-input">
        </div>
        <div class="buttons">
            <button onclick="generatePDF()" id="generatePdfBtn" disabled>Download PDF</button>
            <button onclick="window.print();">Print</button>
        </div>
    </div>

    <script>
        const signatureInput = document.getElementById('signature');
        const signatureDateInput = document.getElementById('signatureDate');
        const generatePdfBtn = document.getElementById('generatePdfBtn');

        function checkFields() {
            if (signatureInput.value.trim() !== '' && signatureDateInput.value !== '') {
                generatePdfBtn.disabled = false;
            } else {
                generatePdfBtn.disabled = true;
            }
        }

        signatureInput.addEventListener('input', checkFields);
        signatureDateInput.addEventListener('input', checkFields);

        function generatePDF() {
            const signature = encodeURIComponent(signatureInput.value);
            const signatureDate = encodeURIComponent(signatureDateInput.value);
            const url = `generate_pdf.php?<?php echo $_SERVER['QUERY_STRING']; ?>&signature=${signature}&signatureDate=${signatureDate}`;
            window.open(url, '_blank');
        }
    </script>
</body>
</html>