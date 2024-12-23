<?php
$conn = new mysqli("localhost", "username", "password", "database_name");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, vendor_name, invoice_date, amount FROM invoices";
$result = $conn->query($sql);

echo "<h1>Invoices</h1>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Vendor</th><th>Date</th><th>Amount</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["vendor_name"] . "</td><td>" . $row["invoice_date"] . "</td><td>" . $row["amount"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='4'>No invoices found.</td></tr>";
}
echo "</table>";

$conn->close();
?>
