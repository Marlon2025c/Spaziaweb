import requests
import urllib3

# Désactiver les avertissements SSL (si le certificat est auto-signé)
urllib3.disable_warnings(urllib3.exceptions.InsecureRequestWarning)

url = "https://192.168.1.12/api/nowplaying/spaziaradio"

try:
    response = requests.get(url, verify=False)  # verify=False ignore les erreurs SSL
    response.raise_for_status()  # Vérifie que la réponse est OK (code 200)
    data = response.json()

    # Affichage du JSON de façon lisible
    import json
    print(json.dumps(data, indent=4))

except requests.exceptions.RequestException as e:
    print("Erreur lors de la requête :", e)
except ValueError as e:
    print("Erreur lors de la lecture du JSON :", e)
