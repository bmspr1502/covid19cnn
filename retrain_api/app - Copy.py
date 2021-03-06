from flask import Flask, render_template, request
from flask import redirect, make_response,url_for
from werkzeug.utils import secure_filename
import os
from database import insert_user,get_newdata
import cv2
import numpy as np
from tensorflow.keras.models import load_model
import tensorflow as tf
from datetime import datetime
import os

ALLOWED_EXTENSIONS = set(['png', 'jpg', 'jpeg', 'gif'])
img_size = 224

def get_latestmodel():
        directory = 'saved_model'
        latest_subdir = max([os.path.join(directory,d) for d in os.listdir(directory)], key=os.path.getmtime)
        model_dir = latest_subdir.replace("\\","/")
        return model_dir

def allowed_file(filename):
	return '.' in filename and filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS


def preprocessing_data():
        train_x = []
        x,y = get_newdata()
        for img_path in x:
                data = cv2.imread(img_path)
                img_resize = cv2.resize(data, dsize=(img_size, img_size))
                image = np.array(img_resize)
                train_x.append(image)
        return np.array(train_x),np.array(y)

def train_model(epoch):
        x,y = preprocessing_data()
        model = load_model(get_latestmodel())
        model.fit(x,y, epochs=epoch)
        date = datetime.now().strftime('%Y-%m-%d_%H-%M-%S')
        filename = f"model_{date}"
        model.save('saved_model/{}'.format(filename))
        
        
app = Flask(__name__)

@app.route("/",methods=["GET","POST"])
def main():
    if(request.method=="POST"):
        file=request.files['file']
        result=request.form.get('result')
        filename = secure_filename(file.filename)
        file.save(os.path.join('static/', filename))
        insert_user(os.path.join('static/', filename),result)
        return "successfully uploaded"
    return render_template("index.html")


@app.route("/train",methods=["GET","POST"])
def train():
        data = request.get_json()
        epoch = data['epoch']
        train_model(epoch)
        return "training will start"


if __name__ == "__main__":
    app.run(debug=True)
