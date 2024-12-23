import requests
import json

# Function to send extracted data to PHP server
def send_data_to_php(extracted_data):
    url = 'https://rojainvoice-dep.onrender.com/save_invoice_data.php'  # Replace with your PHP server URL
    headers = {'Content-Type': 'application/json'}
    
    # Send a POST request with JSON data
    response = requests.post(url, data=json.dumps(extracted_data), headers=headers)
    
    if response.status_code == 200:
        print("Data successfully sent to the server.")
    else:
        print("Failed to send data. Status code:", response.status_code)

# Example of the extracted data (use the result from the extract_pdf_data.py)
extracted_data = {
    "invoiceNumber": "INV-12345",
    "invoiceDate": "2024-12-13",
    "vendorName": "Vendor Name",
    "vendorAddress": "123 Vendor St.",
    "quantity": "10",
    "rate": "100",
    "length": "5m",
    "runtime": "60",
    "rundate": "2024-12-12",
    "copyid": "COPY123"
}

# Send the extracted data to the PHP server
send_data_to_php(extracted_data)
