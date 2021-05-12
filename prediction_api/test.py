# importing the requests library
import requests
  
# api-endpoint
URL = "http://127.0.0.1:5000/predict"
  
# location given here
location = "C:\\xampp\\htdocs\\covid19cnn\\api\\img\\Covid (116).png"
  
# defining a params dict for the parameters to be sent to the API
PARAMS = {'path':location}
  
# sending get request and saving the response as response object
r = requests.get(url = URL, params = PARAMS)
  
# extracting data in json format
data = r.json()
  
print(data)