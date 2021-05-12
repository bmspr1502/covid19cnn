from flask import Flask,request,jsonify
from flask_cors import CORS, cross_origin
import json

app = Flask(__name__)
cors = CORS(app)

@app.route('/',methods=['GET', 'POST'])
@cross_origin(origin='http://localhost')
def index():
    return jsonify({'message' : 'Hello, World!'})

@app.route('/test', methods=['POST'])
def rou():
    #request_data = request.get_json()

    language = request.form['language']
    framework = request.form['framework']

    return '''<h1>The language value is: {}</h1>'''.format(language)

if __name__ == "__main__":
    app.run(debug=True)
