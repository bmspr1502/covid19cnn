import mysql.connector
import time
from datetime import date

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="",
    database="covid19"
    )


def insert_user(image,result):
    today = date.today()
    cursor = mydb.cursor()
    add_data = ("INSERT INTO prediction (img_name,prediction) VALUES (%(path)s,%(pred)s)")
    details = {
        'path':image,
        'pred':int(result)
        
        }

    try:
        cursor.execute(add_data,details)
        mydb.commit()
    except:
        pass

def update_checkbit():
    cursor = mydb.cursor()
    sql = ("UPDATE patient SET trained=1 WHERE doctor_result!=-1")
    cursor.execute(sql)
    mydb.commit()

def get_newdata():
    x_path = []
    y = []
    cursor = mydb.cursor()
    sql = ("SELECT img_name,doctor_result FROM patient WHERE trained=0")
    cursor.execute(sql)
    result = cursor.fetchall()
    for res in result:
        if res[1]!=-1:
            print(res[0])
            x_path.append('train_img/'+res[0])
            y.append(res[1])
    update_checkbit()
    return x_path,y


