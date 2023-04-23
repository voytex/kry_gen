import requests
from console_colours import *

API = "http://vut-fekt-mpckry-gr14.8u.cz/index.php"
request = requests.get(f"{API}/alltasks")
json_req = request.json()

# Zazada o vsechny dostupne ulohy, vytiskne je a 
# vrati pole existujicich kodu uloh
def print_all_tasks():
    for row in json_req:
        print(f"{C_YELLOW}{row['code']}{C_RES} - {row['description']}")
    return [row['code'] for row in json_req]




