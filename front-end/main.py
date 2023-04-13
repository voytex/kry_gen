import requests, json

WELCOME_STRING = "\nCrypto Tasks\n\nDosavadní úlohy:"

API = "http://vut-fekt-mpckry-gr14.8u.cz/index.php"

print(WELCOME_STRING)

request = requests.get(f"{API}/alltasks")

json_req = request.json()

for row in json_req:
    print(f"{row['code']} - {row['description']}")

while True:

    code = str(input("\nZadejte kód úlohy, kterou si přejete řešit: "))

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
