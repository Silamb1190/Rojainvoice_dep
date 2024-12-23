import pdfplumber
import json
import sys

def extract_data_from_pdf(pdf_path):
    # Open the PDF using pdfplumber
    with pdfplumber.open(pdf_path) as pdf:
        first_page = pdf.pages[0]  # Get the first page (you can loop through pages if needed)
        extracted_text = first_page.extract_text()
        
        # Example: Parsing the extracted text to extract specific details (You should adjust based on your invoices)
        data = {
            "invoiceNumber": "INV-12345",  # Extract from the text
            "invoiceDate": "2024-12-13",  # Extract from the text
            "vendorName": "Vendor Name",  # Extract from the text
            "vendorAddress": "123 Vendor St.",  # Extract from the text
            "quantity": "10",  # Extract from the text
            "rate": "100",  # Extract from the text
            "length": "5m",  # Extract from the text
            "runtime": "60",  # Extract from the text
            "rundate": "2024-12-12",  # Extract from the text
            "copyid": "COPY123"  # Extract from the text
        }
    
    return data

if __name__ == "__main__":
    # Assuming the PDF path is passed as an argument
    pdf_path = sys.argv[1]
    extracted_data = extract_data_from_pdf(pdf_path)
    
    # Output the data as JSON (PHP can capture and process this)
    print(json.dumps(extracted_data))
