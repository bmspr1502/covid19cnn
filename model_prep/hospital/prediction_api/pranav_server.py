from flask import Flask,request,jsonify
from tensorflow.keras.models import load_model
import cv2
#from database import search
import numpy as np
import tensorflow as tf
import os
from flask_cors import CORS, cross_origin

def get_latestmodel():
        directory = 'saved_model'
        latest_subdir = max([os.path.join(directory,d) for d in os.listdir(directory)], key=os.path.getmtime)
        model_dir = latest_subdir.replace("\\","/")
        return model_dir

img_size=224
model = load_model('vgg16')

def preprocessing_image(data):
    img_resize = cv2.resize(data, dsize=(img_size, img_size))
    image = np.array(img_resize)
    image = tf.expand_dims(image,0)
    return image

def prediction(data):
    value = model.predict(data)   
    return value[0][0]

app = Flask(__name__)
cors = CORS(app)

@app.route('/',methods=['GET', 'POST'])
@cross_origin(origin='http://localhost')
def index():
    return jsonify({'message' : 'Hello, World!'})

@app.route('/test', methods=['GET'])
def rou():
    data =  request.data
    return jsonify(data)

@app.route('/predict',methods=['POST'])
@cross_origin(origin='http://localhost')
def predict():
    #request.headers.add('Access-Control-Allow-Origin','*')
    #data = request.get_json()
    path = 'pred_img/'
    path = path+request.form['path']
    
    image = cv2.imread(path)
    image = preprocessing_image(image)
    pred = prediction(image)
    result = jsonify({'name':request.form['path'],'percentage': str(pred), 'result':int(pred)})
    result.headers.add('Access-Control-Allow-Origin', '*')
    
    return result

@app.route('/hosppredict',methods=['POST'])
@cross_origin(origin='http://localhost')
def hosppredict():
    #request.headers.add('Access-Control-Allow-Origin','*')
    #data = request.get_json()
    path = 'train_img/'
    path = path+request.form['path']
    
    image = cv2.imread(path)
    image = preprocessing_image(image)
    pred = prediction(image)
    result = jsonify({'name':request.form['path'],'percentage': str(pred), 'result':int(pred)})
    result.headers.add('Access-Control-Allow-Origin', '*')
    
    return result


if __name__ == "__main__":
    app.run(debug=True)
