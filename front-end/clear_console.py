import os

def clear_console():
    if (os.name == 'posix'):
        os.system('clear')
    else:
        os.system('cls')