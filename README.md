SIS
===

## Journal
Se servir de cet espace pour communiquer sur l'avancement, qui fait quoi, etc...

* __10/08/14__ : Jerome - Master - Création du _core_.
* __20/08/14__ : Jerome - Master - Modification de _core_.
* __21/08/14__ : Jerome - Master - Creation du dossier [fixtures](https://fr.wikipedia.org/wiki/Test_fixture) pour creer des donnees rapidement (par exemple : creer des fausses donnees)
                          Login - Creation de l'authentification : login/logout.
                          Settings - Creation des parametres utilisateurs (changement de mot de passe).
* __23/08/14__ : Jerome - Master - Merge de Login sur Master => donc authentification possible
                          Settings - Pas de changement de mot de passe possible. Seule l'UI est implémentée.
                          News - Creation du module. Listing des News et des commentaires par News. Pas d'interaction possible

## Général

* Le markdown : [https://help.github.com/articles/github-flavored-markdown](https://help.github.com/articles/github-flavored-markdown)
* Comprendre git : [https://rogerdudler.github.io/git-guide/index.fr.html](https://rogerdudler.github.io/git-guide/index.fr.html)
* Le _feature branch workflow_ : [https://www.atlassian.com/fr/git/workflows#!workflow-feature-branch](https://www.atlassian.com/fr/git/workflows#!workflow-feature-branch)
* Pour chaque module (logs, meetings, new etc...) on crée une nouvelle branche, et quand elle est terminée, on merge la branche avec master
* Editeur intégré : [Quill](http://quilljs.com/) (Sauf si on trouve mieux)
* [Doc du framework Bootstrap](http://getbootstrap.com)
* Pour envoyer des mails : [PHPMailer](https://github.com/PHPMailer/PHPMailer).

## Notes
* Les classes _srand_ et _passwordHash_ seront utilisées pour hasher les mot de passe des utilisateurs.
* La classe _head_ permet d'avoir un header dynamique : 
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


## Utilisation
Au clic sur un lien (par exemple : News, pour le campus de Montpellier) : 

* Recuperer l'id du campus sur lequel on navigue
* Recuperer l'id du module (news (en minusucule))
* Envoyer a _loadPage.php_ en POST les parametres recupérés (campus et page) avec la méthode _loadPageContent_ (appel AJAX)
* Si l'appel AJAX est un succès, vider le conteu de la div _main_ (de la page home.php) et y afficher le contenu retourné par l'appel AJAX (variable _data_ )
* Sinon, afficher une alerte


## Todo

* ~Core~
* DataBase (create and fill)
* ~Core classes~
* Files
* Inventory
* Logs
* Meetings
* News
* Projects
* Renting
* Todo List
* User's Settings
* General Settings
