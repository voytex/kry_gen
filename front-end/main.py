import requests, json
from clear_console import clear_console
from console_colours import *
from print_all_tasks import API, print_all_tasks

WELCOME_STRING = f"{C_BLUE}Crypto Tasks{C_RES}\n\nDosavadní úlohy:"
SCORE = 0

clear_console()
print(WELCOME_STRING)


while True:
    valid_codes = print_all_tasks()
    code = str(input(f"{C_BLUE}[Skóre: {SCORE}] {C_YELLOW}Zadejte kód úlohy, kterou si přejete řešit:{C_RES}"))

    if code not in valid_codes:
        print(f"{C_RED}Špatný kód{C_RES}")
    else:    
        clear_console()
        request = requests.get(f"{API}/task?code={code}")

        json_req = request.json()
        print(f"{json_req['description']} {C_YELLOW}[? - nápověda], [q - ukončit]{C_RES}")

        while True:
            answer = input("\nZadej výsledek: ")
            if answer == '?':
                print(f"{C_YELLOW}{json_req['hint']}{C_RES}")
            elif answer.lower() == 'q':
                show_solution = input("Chceš zobrazit správný výsledek? (y/n): ")
                if show_solution.lower() == 'y':
                    print(f"\nSprávný výsledek: {C_YELLOW}{json_req['result']}{C_RES}")
                break    
            elif (answer == str(json_req['result'])):
                print(f"{C_GREEN}Správně!{C_RES}")
                SCORE += 1
                break
            else:
                print(f"{C_RED}Špatně, zkus to znovu.{C_RES}")
                
        continue_input = input("\nChceš pokračovat v řešení dalšího úkolu? (y/n): ")
        if continue_input.lower() != 'y':  
            print(f"{C_BLUE}GG [Vaše skóre: {SCORE}]{C_RES}")
            break
        clear_console()
