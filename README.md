# API di Autenticazione Semplice con PHP e JSON Web Token (JWT)

Una semplice API in PHP per la registrazione utente, il login e l'autenticazione utilizzando JSON Web Token (JWT).

## Configurazione

1. Installare le dipendenze:

   ```bash
   composer install
    Aggiornare la secretKey nella classe AuthAPI con una chiave segreta forte e sicura.

    Sostituire 'xxxxx' con il nome del tuo server nel metodo createJWT.

Utilizzo

Creare un'istanza della classe AuthAPI:
    $authAPI = new AuthAPI();
Registrare un nuovo utente:

  $authAPI->registerUser('esempio_utente', 'password123');

Effettuare il login e ottenere il token JWT:

  ```bash

  $token = $authAPI->loginUser('esempio_utente', 'password123');

Verificare il token:


$userData = $authAPI->verifyToken($token);

if ($userData) {
    echo "Benvenuto, " . $userData->username;
} 

