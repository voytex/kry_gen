import os

# pomocna funkce pro vymazani konzole
def clear_console():
    if (os.name == 'posix'):
        os.system('clear')
    else:
        os.system('cls')