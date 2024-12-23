from flask import Flask

# Create an instance of the Flask class
app = Flask(__name__)

@app.route('/')
def hello_world():
    return 'Hello, World!'
