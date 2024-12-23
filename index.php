<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Upload</title>
</head>
<body>
    <h1>Upload Invoice</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="invoice_file">Choose Invoice File</label>
        <input type="file" name="invoice_file" id="invoice_file" required><br><br>
        <input type="submit" value="Upload Invoice">
    </form>
</body>
</html>
