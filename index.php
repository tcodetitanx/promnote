<?php
// Capture the current date
$current_date = date("F j, Y");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promissory Note Agreement</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        label { display: block; margin-bottom: 10px; }
        input[type="checkbox"], input[type="text"] { margin-bottom: 20px; }
        button { padding: 10px 15px; font-size: 16px; }
    </style>
</head>
<body>
    <h1>Promissory Note Agreement</h1>
    <p>Please review the terms below. By checking the box and signing your name, you agree to pay the amounts due as outlined in the promissory note.</p>
    <form action="generate_pdf.php" method="GET" id="promissory-form">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="amount_due">Amount Due:</label>
        <input type="number" id="amount_due" name="amount_due" required>

        <label for="late_fees">Late Fees:</label>
        <input type="number" id="late_fees" name="late_fees" required>

        <label for="misc_fees">Miscellaneous Fees:</label>
        <input type="number" id="misc_fees" name="misc_fees" required>

        <label for="signature">Signature:</label>
        <input type="text" id="signature" name="signature" required placeholder="Sign your name here">

        <label>
            <input type="checkbox" id="agree" name="agree" required>
            I agree to pay the amounts due and understand the terms of this promissory note.
        </label>

        <input type="hidden" name="date" value="<?php echo $current_date; ?>">

        <button type="submit" id="submit-btn">Generate PDF</button>
    </form>

    <script>
        // JavaScript to ensure that the box is checked and the name is signed
        document.getElementById('promissory-form').addEventListener('submit', function(event) {
            if (!document.getElementById('agree').checked) {
                alert('You must agree to the terms to download the PDF.');
                event.preventDefault();
            }
            if (document.getElementById('signature').value.trim() === "") {
                alert('You must sign the promissory note.');
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
