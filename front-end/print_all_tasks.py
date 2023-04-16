import requests
from console_colours import *

API = "http://vut-fekt-mpckry-gr14.8u.cz/index.php"
request = requests.get(f"{API}/alltasks")
json_req = request.json()

# returns array of valid codes
def print_all_tasks():

    for row in json_req:
        print(f"{C_YELLOW}{row['code']}{C_RES} - {row['description']}")

    return [row['code'] for row in json_req]




