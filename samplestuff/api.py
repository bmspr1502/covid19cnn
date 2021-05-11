from flask import Flask, request, jsonify

app = Flask(__name__)
'''
@app.route('/', methods=['GET'])
def index():
    response = jsonify({'message':"Hello, World!!"})
    response.headers.add("Access-Control-Allow-Origin", "*")
    return response
'''

@app.route('/', methods=['POST'])
def PINDEX():
    response = jsonify({'message':"This is some shit from POST, you can't view shit, World!!"})
    response.headers.add("Access-Control-Allow-Origin", "*")
    return response

@app.route('/hello', methods=['GET'])
def index():
    response = jsonify({'message':"Hello, World!!"})
    response.headers.add("Access-Control-Allow-Origin", "*")
    return response

if __name__ == "__main__":
    app.run(debug=True)