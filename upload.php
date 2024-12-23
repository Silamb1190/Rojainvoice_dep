<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["invoice_file"])) {
    $file = $_FILES["invoice_file"];
    $fileName = basename($file["name"]);
    $uploadDir = "uploads/";

    // Check if file is valid (e.g., PDF or image)
    if (move_uploaded_file($file["tmp_name"], $uploadDir . $fileName)) {
        // Run Python script for data extraction
        $command = escapeshellcmd("python3 extract_invoice_data.py " . $uploadDir . $fileName);
        $output = shell_exec($command);
        
        // Assume output is JSON with extracted data
        $data = json_decode($output, true);

        // Save extracted data to the database
        $conn = new mysqli("localhost", "username", "password", "database_name");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO invoices (vendor_name, invoice_date, amount, extracted_text) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $data['vendor_name'], $data['invoice_date'], $data['amount'], $data['extracted_text']);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        
        echo "Invoice uploaded and data extracted successfully.";
    } else {
        echo "Error uploading file.";
    }
}
?>
