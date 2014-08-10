SIS
===

## Journal
Se servir de cet espace pour communiquer sur l'avancement, qui fait quoi, etc...

__10/08/14__ : Jerome - Ajout des fonctionnalités principales.

## Général

* Comprendre git : [https://rogerdudler.github.io/git-guide/index.fr.html](https://rogerdudler.github.io/git-guide/index.fr.html)
* Le _feature branch workflow_ : [https://www.atlassian.com/fr/git/workflows#!workflow-feature-branch](https://www.atlassian.com/fr/git/workflows#!workflow-feature-branch)
* Pour chaque module (logs, meetings, new etc...) on crée une nouvelle branche, et quand elle est terminée, on merge la branche avec master
* La page de news est la page chargée par defaut (sauf objections)

## Notes
* Les classe _srand_ et _passwordHash_ seront utilisées pour hasher les mot de passe des utilisateurs.
* La classe _head_ : je sais pas trop si c'est une bonne pratique ou pas du tout x/ mais elle permet d'avoir un header dynamique : 
	* charger un fichier pour une seule page et pas pour toutes les pages (méthode _addStyleSheet_)
	* changer le titre de chaque page (méthode _setTitle_)

```php
// L'objet head est instancie dans head.php  
require_once '../includes/head.php';

// Optionnel
$head->setTitle('SIS');	

// Optionnel
$head->addStyleSheet('../styles/login.css');

// Obligatoire
$head->printHead();
```

* La page _news.php_ peut servir de squelette pour les autres pages
* Pour ajouter un nouveau module : Créer une page _nomDuModule.php_ et une page _dbActionNomDuModule.php_ (si action avec la DB)


## Utilisation
Au clic sur un lien (par exemple : News, pour le campus de Montpellier) : 

* Recuperer l'id du campus sur lequel on navigue
* Recuperer l'id du module (news (en minusucule))
* Envoyer a _loadPage.php_ en POST les parametres recupérés (campus et page) avec la méthode _loadPageContent_ (appel AJAX)
* Si l'appel AJAX est un succès, vider le conteu de la div _main_ et y afficher le contenu retourné par l'appel AJAX (variable _data_ )
* Sinon, afficher une alerte
