<!DOCTYPE html>
<html>
<head>
    <title>Generate Promissory Note URL</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        input, button { padding: 10px; margin: 5px; }
        .container { max-width: 600px; margin: 0 auto; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Generate Promissory Note URL</h1>
        <form id="form">
            <label>Name:</label><br>
            <input type="text" id="name" required><br>

            <label>Address:</label><br>
            <input type="text" id="address" required><br>

            <label>Phone:</label><br>
            <input type="text" id="phone" required><br>

            <label>Amount Due:</label><br>
            <input type="number" id="amount_due" required><br>

            <label>Late Fees:</label><br>
            <input type="number" id="late_fees" required><br>

            <label>Miscellaneous Fees:</label><br>
            <input type="number" id="misc_fees" required><br>

            <label>Total:</label><br>
            <input type="number" id="total" required><br>

            <button type="button" onclick="generateUrl()">Generate URL</button>
        </form>

        <div id="generatedUrl" style="margin-top: 20px;"></div>
    </div>

    <script>
        function generateUrl() {
            const name = document.getElementById('name').value;
            const address = document.getElementById('address').value;
            const phone = document.getElementById('phone').value;
            const amount_due = document.getElementById('amount_due').value;
            const late_fees = document.getElementById('late_fees').value;
            const misc_fees = document.getElementById('misc_fees').value;
            const total = document.getElementById('total').value;

            const url = `https://goaxiomrealty.com/tools/promnote/?name=${encodeURIComponent(name)}&address=${encodeURIComponent(address)}&phone=${encodeURIComponent(phone)}&amount_due=${encodeURIComponent(amount_due)}&late_fees=${encodeURIComponent(late_fees)}&misc_fees=${encodeURIComponent(misc_fees)}&total=${encodeURIComponent(total)}`;
            
            document.getElementById('generatedUrl').innerHTML = `<p>Generated URL: <a href="${url}" target="_blank">${url}</a></p>`;
        }
    </script>
</body>
</html>