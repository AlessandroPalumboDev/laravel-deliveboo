## Start

```bash
composer i
npm i

php artisan storage:link
php artisan db:seed migrate

php artisan db:seed --class UsersTableSeeder
php artisan db:seed --class RestaurantsSeeder
php artisan db:seed --class TypesSeeder
php artisan db:seed --class PlateSeeder
php artisan db:seed --class OrdersTableSeeder
php artisan db:seed --class RestaurantTypeSeeder
php artisan db:seed --class PlateOrderSeeder

npm run dev
php artisan serve
```

# Documentazione API

Benvenuto nella documentazione API per il nostro sistema di gestione ristoranti. Di seguito troverai informazioni dettagliate sugli endpoint disponibili, inclusi scopi, parametri richiesti e risposte di esempio.

## URL Base

Tutti gli endpoint API sono accessibili tramite il seguente URL base:

```bash
http://127.0.0.1:8000/api/
```

## Endpoints

### 1. **Ottenere Ristoranti**

**Endpoint:** `/restaurants`

**Metodo:** `GET`

**Descrizione:** Recupera una lista di ristoranti. È possibile filtrare per tipo.

**Parametri di Query:**

-   `type` (opzionale): Lista separata da virgole dei tipi di ristoranti per filtrare.

**Esempio di Richiesta:**

```bash

GET /restaurants?type=Italiano,Cinese
```

**Risposta:**

```json
{
    "success": true,
    "results": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "name": "Pasta Palace",
                "type": [{ "id": 1, "name": "Italiano" }]
            },
            {
                "id": 2,
                "name": "Dragon Wok",
                "type": [{ "id": 2, "name": "Cinese" }]
            }
        ],
        "total": 2,
        "per_page": 6
    }
}
```

### 2. Ottenere Piatti di un Ristorante

Endpoint: /restaurants/{restaurant}/plates

Metodo: GET

Descrizione: Recupera una lista di piatti per un ristorante specifico.

Parametri del Percorso:

restaurant: L'ID del ristorante.
Esempio di Richiesta:

```bash
GET /restaurants/1/plates
```

Risposta:

```json
{
    "success": true,
    "plates": [
        {
            "id": 1,
            "name": "Spaghetti Carbonara",
            "description": "Pasta italiana classica con uova, formaggio, pancetta e pepe."
        },
        {
            "id": 2,
            "name": "Pizza Margherita",
            "description": "Pizza con pomodori, mozzarella e basilico fresco."
        }
    ]
}
```

### 3. Ottenere Dettagli di un Singolo Piatto

Endpoint: /plates/{id}

Metodo: GET

Descrizione: Recupera informazioni dettagliate su un piatto specifico.

Parametri del Percorso:

id: L'ID del piatto.
Esempio di Richiesta:

```bash
GET /plates/1
```

Risposta:

```json
{
    "success": true,
    "plate": {
        "id": 1,
        "name": "Spaghetti Carbonara",
        "description": "Pasta italiana classica con uova, formaggio, pancetta e pepe.",
        "price": 12.99,
        "ingredients": ["Spaghetti", "Uova", "Formaggio", "Pancetta", "Pepe"]
    }
}
```

### 4. Ottenere Tutti i Tipi

Endpoint: /types

Metodo: GET

Descrizione: Recupera una lista di tutti i tipi di ristoranti.

Esempio di Richiesta:

```bash
GET /types
```

Risposta:

```json
{
    "success": true,
    "types": [
        {
            "id": 1,
            "name": "Italiano"
        },
        {
            "id": 2,
            "name": "Cinese"
        },
        {
            "id": 3,
            "name": "Messicano"
        }
    ]
}
```

5 - in crea piatto -> gestire le validazioni sempre da front-end
