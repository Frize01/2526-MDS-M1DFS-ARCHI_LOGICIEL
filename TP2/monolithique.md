
# Architecture Monolithique

## Définition
Une architecture où toute l'application (interface utilisateur, logique métier, accès aux données) est déployée comme un seul bloc.

## Caractéristiques
- Un seul artefact déployable
- Fort couplage entre composants
- Déploiement et monitoring centralisés
- Scalabilité par réplication complète (scale-out) ou scale-up

## Schéma (Mermaid)
```mermaid
graph LR
	U[Utilisateur]
	M[Monolithe (UI + API + Logique)]
	DB[(Base de données)]
	U -->|GET /events| M
	M -->|SELECT * FROM events| DB
	DB --> M
	M -->|200 JSON| U
```

## Chemin: « Un utilisateur consulte la liste des événements »
1. L'utilisateur envoie une requête HTTP GET `/events` vers le serveur.
2. Le monolithe reçoit la requête, exécute la logique métier pour récupérer les événements.
3. La couche persistence interroge la base de données et renvoie les données.
4. Le monolithe formate la réponse (JSON/HTML) et la renvoie à l'utilisateur.

## Avantages / Inconvénients (pour le mini-système d'événements)
- Avantages : simplicité de développement et de déploiement, faible overhead opérationnel pour un petit projet.
- Inconvénients : évolutivité limitée, risque de régression globale lors d'un changement, déploiement moins flexible.

## Exemples d'utilisation
- MVP, prototypes, petites applications internes.

## Sources
- Notes de cours et documentation d'architecture (divers cours d'architecture logicielle).

## Structure proposée pour le mini-système
- `controllers/` : routes HTTP et contrôleurs
- `services/` : logique métier (inscription, connexion, events)
- `repositories/` : accès base de données
- `models/` : entités (User, Event)

## Hébergement et environnement
- Serveur unique (VM ou instance PaaS like Heroku, Render, Railway)
- Base de données relationnelle (Postgres, MySQL) accessible par le serveur
- Backup et monitoring centralisés

## Détails fonctionnels (pas à pas)

1) Inscription (POST `/signup`)
	- Le contrôleur reçoit la requête, valide les champs.
	- Le service `User` crée l'entité et appelle le repository pour persister.
	- La base renvoie un id ; le service renvoie 201 + profil public.

2) Connexion (POST `/login`)
	- Le contrôleur reçoit identifiants.
	- Le service `Auth` vérifie le mot de passe via le repository.
	- Si ok, le service émet un token (JWT) ou crée une session côté serveur.

3) Création d'un événement (POST `/events`)
	- Contrôleur vérifie l'authentification.
	- Service `Events` valide et persiste l'événement via repository.
	- Réponse 201 avec l'ID de l'événement.

4) Listing des événements publics (GET `/events`)
	- Contrôleur appelle le service `Events`.
	- Service exécute une requête SQL optimisée (pagination, index).
	- Résultat retourné en JSON.

5) Consultation d'un événement (GET `/events/{id}`)
	- Contrôleur appelle `Events.findById(id)`.
	- Le repository récupère l'entité, le service applique règles de visibilité et renvoie.

## Considérations opérationnelles
- Sauvegarde et restauration centralisées (point critique).
- Déploiement : un seul rollback remplace l'app entière.
- Tests : possibilité d'exécuter tests d'intégration sur l'artefact complet.


