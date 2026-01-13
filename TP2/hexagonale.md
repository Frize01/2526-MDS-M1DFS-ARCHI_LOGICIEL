
# Architecture Hexagonale (Ports & Adaptateurs)

## Définition
L'architecture hexagonale (ports & adaptateurs) place la logique métier (Domain) au centre, exposée via des ports, et connectée à l'extérieur par des adaptateurs. Elle vise à isoler le domaine des détails techniques.

## Caractéristiques
- Domain centralisé et indépendant des frameworks
- Ports (interfaces) et adaptateurs (implémentations)
- Testabilité améliorée
- Substituabilité des technologies (BDD, UI, API)

## Schéma (Mermaid)
```mermaid
graph LR
  subgraph App
    Domain[Domain (Core)]
    PortAPI[(Port: Application/UseCases)]
    PortRepo[(Port: Repository)]
  end
  AdapterHTTP[Adapter HTTP / Controller]
  AdapterDB[Adapter DB (SQL / ORM)]
  ExternalDB[(Base de données)]
  User[Utilisateur]

  User --> AdapterHTTP
  AdapterHTTP --> PortAPI
  PortAPI --> Domain
  Domain --> PortRepo
  PortRepo --> AdapterDB
  AdapterDB --> ExternalDB
```

## Chemin: « Un utilisateur consulte la liste des événements »
1. L'utilisateur envoie GET `/events` au contrôleur HTTP (adaptateur primaire).
2. Le contrôleur appelle le port d'application (use case) `ListEvents`.
3. Le port invoque la logique du `Domain` qui, via le port `Repository`, demande les données.
4. L'adaptateur DB (implémentation du port Repository) interroge la base de données et renvoie les entités.
5. Le Domain formate/filtre si nécessaire, le port renvoie au contrôleur, qui renvoie la réponse au client.

## Avantages / Inconvénients
- Avantages : solide séparation des préoccupations, remplaçabilité des infra, tests unitaires du domaine facilités.
- Inconvénients : surcoût de conception et abstractions pour de petits projets; courbe d'apprentissage.

## Exemples d'utilisation
- Projets d'envergure où la logique métier est critique et doit être protégée des variations d'infrastructure.

## Sources
- Articles sur l'architecture hexagonale (Alistair Cockburn et ressources pédagogiques).

## Structure détaillée et emplacement des responsabilités
- `domain/` : entités (`User`, `Event`), règles métier, value objects
- `application/` (ports) : interfaces use-cases (`RegisterUser`, `LoginUser`, `CreateEvent`, `ListEvents`, `GetEvent`)
- `adapters/` : implémentations (HTTP controllers, SQL repositories, mail adapters)
- `infra/` : configuration DB, ORM, serveur HTTP

## Hébergement
- Les adaptateurs primaires (HTTP) s'exécutent sur un serveur/app container.
- Les adaptateurs secondaires (DB, queue) utilisent des services externes gérés.

## Flux détaillés par fonctionnalité

1) Inscription
  - HTTP Adapter reçoit POST `/signup` et appelle le port `RegisterUser`.
  - `RegisterUser` (application) valide et invoque le Domain pour créer l'entité.
  - Le Domain demande au port `UserRepository` de persister ; l'adaptateur SQL effectue l'opération.

2) Connexion
  - HTTP Adapter appelle port `LoginUser`.
  - `LoginUser` interroge `UserRepository` et utilise règles du Domain pour vérifier credentials.
  - Token renvoyé par l'adapter HTTP.

3) Création d'un événement
  - HTTP Adapter → port `CreateEvent` → Domain → `EventRepository` (adaptateur DB).
  - Optionnel : port `EventPublisher` pour publier sur un bus (si besoin d'asynchrone).

4) Listing & Consultation
  - Ports `ListEvents` et `GetEvent` exposent use-cases; Domain applique filtres et politiques de visibilité.
  - Les adaptateurs DB fournissent les données nécessaires.

## Tests et maintenabilité
- Tests unitaires ciblent le `domain/` et les `application/` ports en mockant adaptateurs.
- Remplacement d'une technologie (ex: MySQL → Postgres) : changer l'adaptateur DB sans toucher au Domain.

## Avantages / Inconvénients (précis)
- Avantages : évolutivité du code, facilité de tests, indépendance forte du framework.
- Inconvénients : surcoût d'abstraction et plus de fichiers, peut être excessif pour un mini-projet.

