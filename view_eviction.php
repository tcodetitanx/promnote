<?php
$issuer_name = $_GET['issuer_name'] ?? '';
$issuer_address = $_GET['issuer_address'] ?? '';
$issuer_phone = $_GET['issuer_phone'] ?? '';
$name = $_GET['name'] ?? '';
$streetAddress = $_GET['address'] ?? '';
$phone = $_GET['phone'] ?? '';

$notice_date = $_GET['eviction_date'] ?? '';

$leaseDate = $_GET['lease_date'] ?? '';
$city = $_GET['city'] ?? '';
$state = $_GET['state'] ?? '';
$zip = $_GET['zip'] ?? '';

$means_of_service = $_GET['means_of_service'] ?? '';

$completeAddress = $streetAddress . " , " . $city . " , " . $state . " , " . $zip ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eviction Notice</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .preview {
            white-space: pre-line;
        }
        .signature-input {
            font-style: italic;
            border: none;
            border-bottom: 1px solid #000;
            width: 100%;
            margin-bottom: 10px;
        }
        .landlord-info {
            margin-top: 20px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><em>Eviction Notice</em></h1>
        <div class="preview">
<h2>Eviction Notice</h2>

<?php echo $notice_date; ?>
Name: <?php echo $name . "<br>"; ?>

Phone: <?php echo $phone . "<br>"; ?><br>
TO THE TENANT(S) AND ANY AND ALL OTHERS IN POSSESSION OF THE PREMISES LOCATED AT TEH AFORMENTIONED ADDRESS, THIS NOTICE HAS BEEN SENT TO YOU PURSUANT TO UTAH STATE LAWS AS A RESULT OF YOUR BREACH OF THE LEASE AND/OR YOUR FAILURE TO PAY RENT, LATE FEES AND/OR OTHER ASSOCIATED COSTS ANDOR FEES.
<strong><em>BE IT KNOWN</em></strong> that purusant to your signed Lease Agreement dated <?php echo $leaseDate; ?> and where you are in possession of the premises located at <?php echo $streetAddress . " , " . $city . " , " . $state . " , " . $zip . "<br>"; ?>

THE LANDLORD RESERVES THE RIGHTS AND REMEDIES AFFORDED TO THEM PURUSANT TO THE SIGNED LEASE/RENTAL AGREEMENT AND IN ACCORDANCE WITH APPLICABLE LAWS OF THE STATE OF UTAH INCLUDING, BUT NOT LIMITED TO, UNPIAD RENT AND/OR PROPERTY DAMAGES, AND NOTHING IN THIS MNOTICE MAY BE INTERPRETED AS A RELINQUISHMENT OF SUCH RIGHTS AND REMEDIES

By: 

Date:


CERTIFICATE OF SERVICE
<strong><em>BE IT KNOWN</em></strong> that i, <?php echo $issuer_name; ?>, hereby certify that on the date of <?php echo $notice_date ?> , I served copies of the Eviction Notice on <?php echo $completeAddress; ?> by way of <?php echo $means_of_service . "." ?><br>

Signature: <input type="text" id="signature" class="signature-input" placeholder="Type your full name to sign">
Date: <input type="date" id="signatureDate" class="signature-input">

<div class="landlord-info">
Landlord Name: <?php echo $issuer_name; ?>

Landlord Address: <?php echo $issuer_address; ?>

Landlord Phone: <?php echo $issuer_phone; ?>
</div>

        </div>
        <div class="buttons">
            <button onclick="generatePDF()" id="generatePdfBtn" disabled>Download PDF</button>
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
            const url = `generate_pdf_eviction.php?<?php echo $_SERVER['QUERY_STRING']; ?>&signature=${signature}&signatureDate=${signatureDate}`;
            window.open(url, '_blank');
        }
    </script>
</body>
</html>