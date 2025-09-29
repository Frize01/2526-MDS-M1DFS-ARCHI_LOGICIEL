# Architecture Logicielle

Définition ???

- ✅ monolithique => 1 seul gros projet (MVC),
- ✅ micro-services => authentification (SSO),
- Event-Driven => Winform,
- Hexa => optimisation séparation des responsabilités, code métier, etc...

- serverless ?
- client-serveur ?
- sockets

## Définitions
- **rigidité** : Capacité d’un système à s’adapter aux changements.
- **scalabilité** : Capacité d’un système à gérer une augmentation de la charge de travail en ajoutant des ressources.
- **overengineering** : Complexité excessive dans la conception d’un système, souvent inutile.

## Architecture Monolithique

Un projet **monolithique** regroupe dans un même bloc le **front-end**, le **back-end** et la **base de données**.  
C’est le modèle historique le plus utilisé, bien qu’aujourd’hui il soit de plus en plus concurrencé par les **microservices**.

### Différents types de monolithes
- **Fourre-tout** : tout est mélangé dans un seul bloc sans réelle séparation.  
- **Modulaire** : séparation par type de service (ex. authentification, paiement, interface…), mais toujours dans la même application.  
- **Distribuée** : plusieurs modules/services cohabitent dans un même dossier. Cette approche facilite souvent la transition vers une architecture en microservices.

### Avantages
- Plus simple et rapide à développer, surtout pour les petites équipes.  
- Moins exposée aux risques de sécurité (surface d’attaque réduite).  

### Inconvénients
- **Risque de défaillance élevé** : une erreur peut faire planter tout le système.  
- **Scalabilité difficile** : gestion complexe des ressources.  
- **Rigidité** : ajout de nouvelles fonctionnalités limité et coûteux.  
- **Organisation exigeante** : nécessite une gestion de projet stricte et structurée.  
- **Découplage** : Le fait de réduire les dépendances entre les différents "services".

## Architecture Microservices

Une application en **microservices** est composée de plusieurs petits services autonomes qui communiquent entre eux via des interfaces légères (souvent des API).  
Chaque **microservice** correspond à une capacité métier spécifique.

### Caractéristiques
- Chaque microservice est **indépendant** : il peut être développé dans un langage différent.  
- Cycles de développement plus courts, mises à jour plus rapides et agiles.  
- Favorise la **scalabilité** : chaque microservice peut évoluer séparément.  
- En cas de panne, seul le microservice concerné est impacté, le reste continue de fonctionner.  
- Chaque microservice peut avoir sa propre **architecture** et son propre mode de fonctionnement.  

### Avantages
- Meilleure agilité pour développer et déployer rapidement.  
- Scalabilité accrue.  
- Risque réduit de panne globale : défaillance isolée à un service.  
- Simplification de la gestion de projet : chaque microservice peut avoir sa propre équipe et organisation.  

### Inconvénients
- **Sécurité** : plus de communication via API = plus de failles potentielles et plus d’exposition.  
- **Gestion des données** complexe :  
    - risque de redondance,  
    - dépendance entre microservices,  
    - analyse plus compliquée (provenance des données).  
- **Coûts d’infrastructure variables** : peut être plus cher ou moins cher selon les cas.  

## Architecture Event-Driven

Dans une architecture **événementielle**, une notification est envoyée à tous les services lorsqu’une modification se produit.  
Les services réagissent en fonction des événements qu’ils reçoivent.

### Types d’événements
- **Émetteurs** : génèrent des événements.  
- **Canaux** : transmettent les événements.  
- **Consommateurs** : réagissent aux événements.  

### Caractéristiques
- Flexible et simple d’ajouter de nouveaux émetteurs ou consommateurs.  
- Peut être mis en place dans n’importe quel langage.  
- Plusieurs sources d’événements possibles (utilisateur, système, capteur, etc.).  
- Fonctionnement **asynchrone** : il peut y avoir un délai entre l’émission et le traitement.  
- Scalabilité facilitée grâce au **découplage** des services.  

## Architecture Hexagonale















# TP 1 :

Faire des recherches sur chacun des 4 types d'architecture cités plus haut. Pour chacun récupérer : 

- Une liste de caractéristiques
- Une définition simple et efficace
- Des exemples d'implémentation (schémas ?)
- Des exemples d'utilisation dans des projets connus
- La liste des sources (liens web) où vous avez trouvé les informations
