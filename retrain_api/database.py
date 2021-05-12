import mysql.connector
import time
from datetime import date

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="vijay1234",
    database="testdb"
    )


def insert_user(image,result):
    today = date.today()
    cursor = mydb.cursor()
    add_data = ("INSERT INTO cnn_images (image_path,prediction,check_bit) VALUES (%(path)s,%(pred)s,%(check)s)")
    details = {
        'path':image,
        'pred':int(result),
        'check':0,
        }

    try:
        cursor.execute(add_data,details)
        mydb.commit()
    except:
        pass

def update_checkbit():
    cursor = mydb.cursor()
    sql = ("UPDATE cnn_images SET check_bit=0")
    cursor.execute(sql)
    mydb.commit()

def get_newdata():
    x_path = []
    y = []
    cursor = mydb.cursor()
    sql = ("SELECT image_path,prediction FROM cnn_images WHERE check_bit=0")
    cursor.execute(sql)
    result = cursor.fetchall()
    for res in result:
        x_path.append(res[0])
        y.append(res[1])
    update_checkbit()
    return x_path,y


