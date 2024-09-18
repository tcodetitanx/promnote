<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Contract URL</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Generate Contract URL</h1>
        <form id="form">
            <label for="name">Recipient Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Recipient Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="phone">Recipient Phone:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="amount_due">Amount Due:</label>
            <input type="number" id="amount_due" name="amount_due" required>

            <label for="creation_date">Date of contract creation:</label>
            <input type="date" id="creation_date" name="creation_date" required>
            <button type="button" onclick="generateUrl()">Generate URL</button>
        </form>

        <div id="generatedUrl"></div>
    </div>

    <script>
        function generateUrl() {
            const form = document.getElementById('form');
            const formData = new FormData(form);
            const params = new URLSearchParams(formData);
            
            // Calculate total
            const amountDue = parseFloat(formData.get('amount_due')) || 0;
            const total = amountDue ;
            const url = `https://goaxiomrealty.com/tools/promnote/viewContract.php?${params.toString()}`;
            
            document.getElementById('generatedUrl').innerHTML = `<p>Generated URL: <a href="${url}" target="_blank">${url}</a></p>`;
        }
    </script>
</body>
</html>