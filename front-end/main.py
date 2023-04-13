import requests, json

WELCOME_STRING = "Crypto Tasks - ukázková verze\nZadejte kód úlohy, kterou si přejete řešit\n\nDosavadní úlohy:"

API = "http://vut-fekt-mpckry-gr14.8u.cz/index.php"

print(WELCOME_STRING)

request = requests.get(f"{API}/alltasks")

json_req = request.json()

for row in json_req:
    print(f"- {row['description']}")

code = str(input())

request = requests.get(f"{API}/task?code={code}")

json_req = request.json()

print(f"{json_req[0]['description']} [? - nápověda]")

ans = input()

if (ans == '?'):
    print(json_req[0]['hint'])
# v tuto chvili jeste NENI IMPLEMENTOVANO!
elif (ans == json_req[0]['result']):
    print("Správně!")



