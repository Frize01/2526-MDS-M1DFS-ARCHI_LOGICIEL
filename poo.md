# Rappels POO

## Vocabulaire

- **objet** : instance d'une classe
- **attribut** : variable d'une classe
- **méthode** : fonction d'une classe
- **encapsulation** : Gestion de la visibilité des attributs et méthodes (public, private, protected)
    - public : accessible partout
    - private : accessible uniquement dans la classe
    - protected : accessible dans la classe et les classes dérivées (attention, dépend du langage)
- **héritage** : une classe peut hériter d'une autre classe
- **signature** : nom + paramètres d'une méthode + type de retour
- **redéfinition** : une méthode d'une classe dérivée peut redéfinir une méthode de la classe parente
- **surcharge** : une méthode peut avoir plusieurs signatures (même nom, paramètres différents)
- **polymorphisme** : une méthode peut avoir plusieurs formes (surcharge, redéfinition)
- **accesseur** : méthode pour lire un attribut (getter)
- **mutateur** : méthode pour modifier un attribut (setter)
- **classe abstraite** : une classe abstraite ne peut pas être instanciée, elle sert de modèle pour les classes dérivées
- **méthode abstraite** : une méthode abstraite n'a pas d'implémentation dans la classe parente, elle doit être implémentée dans les classes dérivées
- **interface** : une interface ne contient que des méthodes abstraites (sans implémentation), une classe peut implémenter plusieurs interfaces
- **composition** : une classe peut contenir des objets d'autres classes (relation "a un")
- **aggrégation** : une classe peut contenir des objets d'autres classes, mais ces objets peuvent exister indépendamment (relation "partie de")
- **constructeur** : méthode spéciale pour initialiser un objet lors de sa création (se déclenche lorsque l'objet est créé)
- **destructeur** : méthode spéciale pour nettoyer un objet avant sa destruction (se déclenche lorsque l'objet est détruit)
- **this (|| self)** : mot-clé pour faire référence à l'objet courant
- **statique** : un attribut ou une méthode statique appartient à la classe et non à l'objet (accessible sans instancier la classe)
- **constante** : un attribut constant ne peut pas être modifié après sa déclaration (valeur fixe)
- **namespace** : permet de regrouper des classes, interfaces, fonctions, etc. pour éviter les conflits de noms
- **package** : ensemble de classes et interfaces regroupées dans un même espace de noms (namespace)



TODO : **design pattern**