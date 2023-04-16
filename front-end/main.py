import requests, json
from clear_console import clear_console
from console_colours import *

WELCOME_STRING = f"\n{C_BLUE}Crypto Tasks{C_RES}\n\nDosavadní úlohy:"

API = "http://vut-fekt-mpckry-gr14.8u.cz/index.php"

clear_console()
print(WELCOME_STRING)

request = requests.get(f"{API}/alltasks")

json_req = request.json()

valid_codes = [row['code'] for row in json_req]

for row in json_req:
    print(f"{row['code']} - {row['description']}")

while True:
    code = str(input("\nZadejte kód úlohy, kterou si přejete řešit: "))

    if code not in valid_codes:
        print("Špatný kód")
    else:    
        request = requests.get(f"{API}/task?code={code}")

        json_req = request.json()
        print(f"{json_req['description']} [? - nápověda], [q - ukončit]")

        while True:
            answer = input("\nZadej výsledek: ")
            if answer == '?':
                print(json_req['hint'])
            elif answer.lower() == 'q':
                show_solution = input("Chceš zobrazit správný výsledek? (y/n): ")
                if show_solution.lower() == 'y':
                    print(f"\nSprávný výsledek: {json_req['result']}")
                break    
            elif (answer == json_req['result']):
                print("Správně!")
                break
            else:
                print("Špatně, zkus to znovu.")
                
        continue_input = input("\nChceš pokračovat v řešení dalšího úkolu? (y/n): ")
        if continue_input.lower() != 'y':
            break
