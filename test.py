from urllib.request import urlopen
  
# import json
import json
# store the URL in url as 
# parameter for urlopen
url = "http://BellOne1.local/assets/json/global.json"
  
# store the response of URL
response = urlopen(url)
  
# storing the JSON response 
# from url in data
data_json = json.loads(response.read())
  
# print the json response
print(data_json)
