# Architecture Logicielle

Définition ???

- ✅ monolithique => 1 seul gros projet (MVC),
- micro-services => authentification (SSO),
- Event-Driven => Winform,
- Hexa => optimisation séparation des responsabilités, code métier, etc...

- serverless ?
- client-serveur ?

## Définitions
- rigidité
- scalabilité

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















# TP 1 :

Faire des recherches sur chacun des 4 types d'architecture cités plus haut. Pour chacun récupérer : 

- Une liste de caractéristiques
- Une définition simple et efficace
- Des exemples d'implémentation (schémas ?)
- Des exemples d'utilisation dans des projets connus
- La liste des sources (liens web) où vous avez trouvé les informations
