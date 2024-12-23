import pytesseract
from PIL import Image
import json
import sys
import pdfplumber

def extract_data_from_image(image_path):
    # Use Tesseract to extract text from image
    img = Image.open(image_path)
    extracted_text = pytesseract.image_to_string(img)

    # Parse necessary details (this is an example, adapt as needed)
    data = {
        "vendor_name": "Vendor ABC",  # Example placeholder
        "invoice_date": "2024-12-01",  # Example placeholder
        "amount": 123.45,  # Example placeholder
        "extracted_text": extracted_text
    }
    
    return data

def extract_data_from_pdf(pdf_path):
    # Use pdfplumber to extract text from PDF
    with pdfplumber.open(pdf_path) as pdf:
        first_page = pdf.pages[0]
        extracted_text = first_page.extract_text()
    
    # Parse necessary details (this is an example, adapt as needed)
    data = {
        "vendor_name": "Vendor XYZ",  # Example placeholder
        "invoice_date": "2024-12-01",  # Example placeholder
        "amount": 678.90,  # Example placeholder
        "extracted_text": extracted_text
    }
    
    return data

if __name__ == "__main__":
    file_path = sys.argv[1]
    if file_path.endswith(".pdf"):
        data = extract_data_from_pdf(file_path)
    else:
        data = extract_data_from_image(file_path)
    
    # Output the data as JSON for PHP to capture
    print(json.dumps(data))
