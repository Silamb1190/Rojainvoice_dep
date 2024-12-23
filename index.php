<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Processing with Text Extraction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Left-side form for invoice details -->
        <div class="form-container">
            <h2>Invoice Details</h2>
            
            <!-- PDF Upload Section -->
            <div class="mb-3">
                <label for="pdfUpload" class="form-label">Upload PDF Invoice</label>
                <input type="file" class="form-control" id="pdfUpload" accept=".pdf" onchange="handleFileSelect(event)">
            </div>

            <form id="invoiceForm">
                <h4>Invoice Information</h4>
                <div class="form-row">
                    <div class="form-group">
                        <label for="invoiceNumber" class="form-label">Invoice Number</label>
                        <input type="text" class="form-control" id="invoiceNumber" value="<?php echo $invoiceNumber; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="invoiceDate" class="form-label">Invoice Date</label>
                        <input type="date" class="form-control" id="invoiceDate" value="<?php echo $invoiceDate; ?>" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="vendorName" class="form-label">Vendor Name</label>
                        <input type="text" class="form-control" id="vendorName" value="<?php echo $vendorName; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="vendorAddress" class="form-label">Vendor Address</label>
                        <input type="text" class="form-control" id="vendorAddress" value="<?php echo $vendorAddress; ?>" readonly>
                    </div>
                </div>

                <!-- Add other fields as necessary -->
            </form>
        </div>
    </div>
</body>
</html>
