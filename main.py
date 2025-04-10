from pynput.mouse import Button, Controller
from pynput.keyboard import Listener, Key
import threading
import time

mouse = Controller()
clicking = False  # Contrôle du clic
program_running = True  # Contrôle du programme

def clicker():
    while program_running:
        if clicking:
            mouse.click(Button.left, 1)
            time.sleep(0.01)  # Vitesse du clic (ajuste si tu veux plus rapide/lent)
        else:
            time.sleep(0.1)

def on_press(key):
    global clicking, program_running
    try:
        if key == Key.esc:  # Touche Échap pour arrêter
            program_running = False
            return False  # Arrête le listener clavier
        elif key.char == 's':  # Touche S pour démarrer/arrêter le clic
            clicking = not clicking
            print("Auto-clicker:", "ON" if clicking else "OFF")
    except AttributeError:
        pass

# Lancement du thread pour le clicker
click_thread = threading.Thread(target=clicker)
click_thread.start()

# Lancement de l'écoute du clavier
with Listener(on_press=on_press) as listener:
    listener.join()
