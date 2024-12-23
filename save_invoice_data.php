<?php
// Get the raw POST data
$data = json_decode(file_get_contents('php://input'), true);

// Check if data was received
if ($data) {
    // Retrieve fields from the extracted data
    $invoiceNumber = $data['invoiceNumber'];
    $invoiceDate = $data['invoiceDate'];
    $vendorName = $data['vendorName'];
    $vendorAddress = $data['vendorAddress'];
    $quantity = $data['quantity'];
    $rate = $data['rate'];
    $length = $data['length'];
    $runtime = $data['runtime'];
    $rundate = $data['rundate'];
    $copyid = $data['copyid'];

    // Connect to the database (adjust these details for your database)
    $conn = new mysqli("localhost", "username", "password", "database_name");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query to store the data
    $stmt = $conn->prepare("INSERT INTO invoices (invoice_number, invoice_date, vendor_name, vendor_address, quantity, rate, length, runtime, rundate, copyid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $invoiceNumber, $invoiceDate, $vendorName, $vendorAddress, $quantity, $rate, $length, $runtime, $rundate, $copyid);
    
    if ($stmt->execute()) {
        echo "Data saved successfully!";
    } else {
        echo "Error saving data: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No data received.";
}
?>
