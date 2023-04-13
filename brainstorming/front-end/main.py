import requests

# odeslání požadavku na server pro získání seznamu úkolů
response = requests.get('http://vut-fekt-mpckry-gr14.azurewebsites.net/tasks')
tasks = response.json()

# výpis dostupných úkolů
print("Dostupné úkoly:")
for task in tasks:
    print(f"{task['id']}. {task['name']}")

# uživatel zvolí konkrétní úkol
vybrany_ukol = input("Vyberte úkol, který chcete řešit: ")

# odeslání požadavku na server pro získání konkrétního úkolu
response = requests.get(f'http://vut-fekt-mpckry-gr14.azurewebsites.net/tasks/{vybrany_ukol}')
task = response.json()

# výpis úkolu
print(f'Název úkolu: {task["name"]}')
print(f'Popis úkolu: {task["description"]}')

# zobrazení nápovědy
show_help = input('Chceš zobrazit nápovědu k úkolu? (ano/ne): ')
if show_help.lower() == 'ano':
    print(f'Nápověda k úkolu {task["name"]}: {task["help"]}')

# vyhodnocení správnosti výsledku
while True:
    vysledek = input('Zadej výsledek (nebo "q" pro ukončení úkolu): ')
    if vysledek.lower() == 'q':
        break
    elif int(vysledek) == task["result"]:
        print('Správně!')
        # přidat další úkol do databáze
    else:
        print('Špatně, zkus to znovu.')