## Project name
MVC_PHP_BLOG_VFINAL

## Short Description about the project.
Developpement from scratch d'un Framework en respectant la structure MVC de PHP

## Technologies
Utilisation de PHP Version 8   php -v en terminal
Utilisation de Bootstrap en lien CDN

## Installation
$ git clone https://github.com/Simon-git26/MVC_PHP_BLOG_VFINAL.git
Utilisation de MAMP, placer le répèrtoire dans le dossier htdocs de MAMP pour installer le projet sur le serveur MAMP
Se rendre ensuite à cette url: http://localhost/MVC_PHP_BLOG_VFINAL/?page=register pour crée un compte 
Installation de composer pour mailjet donc ce qui permet d'envoyer des mails de contact


## Description du besoin
Le projet est donc de développer votre blog professionnel. Ce site web se décompose en deux grands groupes de pages :

les pages utiles à tous les visiteurs
les pages permettant d’administrer votre blog.
Voici la liste des pages qui devront être accessibles depuis votre site web :

la page d'accueil
la page listant l’ensemble des blogs posts
la page affichant un blog post
la page permettant d’ajouter un blog post
la page permettant de modifier un blog post
les pages permettant de modifier/supprimer un blog post
les pages de connexion/enregistrement des utilisateurs
Vous développerez une partie administration qui devra être accessible uniquement aux utilisateurs inscrits et validés.

Les pages d’administration seront donc accessible sur conditions et vous veillerez à la sécurité de la partie administration.

Commençons par les pages utiles à tous les internautes.

Sur la page d’accueil il faudra présenter les informations suivantes :

Votre nom et prénom
Une photo et/ou un logo
Une phrase d’accroche qui vous ressemble ( exemple : “Martin Durand, le développeur qu’il vous faut !”)
Un menu permettant de naviguer parmi l’ensemble des pages de votre site web
Un formulaire de contact (à la soumission de ce formulaire, un email avec toutes ces informations vous serons envoyé) avec les champs suivants :
nom/prénom
email de contact
message
un lien vers votre CV au format pdf
et l’ensemble des liens vers les réseaux sociaux où l’on peut vous suivre (Github, LinkedIn, Twitter…).
Sur la page listant tous les blogs posts (du plus récent au plus ancien), il faut afficher les informations suivantes pour chaque blog post :

le titre
la date de dernière modification
le châpo
et un lien vers le blog post
Sur la page présentant le détail d’un blog post, il faut afficher les informations suivantes :

le titre
le chapô
le contenu
l’auteur
la date de dernière mise à jour
le formulaire permettant d’ajouter un commentaire (soumis pour validation)
les listes des commentaires validés et publiés
Sur la page permettant de modifier un blog post, l’utilisateur a la possibilité de modifier les champs titre, chapô, auteur et contenu.

Dans le footer menu, il doit figurer un lien pour accéder à l’administration du blog.



## Contraintes
Tout sera développé par vos soins. Les seuls lignes de code qui peuvent provenir d’ailleurs seront celles du thème Bootstrap que vous prendrez grand soin de choisir. La présentation, ça compte ! Il est également autorisé d’utiliser une ou plusieurs librairies externes à condition qu’elles soient intégrées grâce à Composer.

Attention, votre blog doit être navigable aisément sur un mobile (Téléphone mobile, tablette…). C’est indispensable :D Nous vous conseillons vivement d’utiliser un moteur de templating tel que Twig, mais ce n’est pas obligatoire.

Sur la partie administration, vous veillerez à ce que seul les personnes ayant le droit “administrateur” aient l’accès, les autres utilisateurs pourront uniquement commenter les articles (avec validation avant publication).

Important : Vous vous assurerez qu’il n’y a pas de failles de sécurité (XSS, CRSF, SQL injection, session hijacking, upload possible de script php…).

Votre projet doit être poussé et disponible sur Github. Je vous conseille de travailler avec des pull requests. Dans la mesure où la majorité des communications concernant les projets sur Github se font en anglais, il faut que vos commits soient en anglais.

Vous devrez créer l’ensemble des issues (tickets) correspondant aux tâches que vous aurez à effectuer pour mener à bien le projet.

Veillez à bien valider vos tickets pour vous assurer que ceux-ci couvrent bien toutes les demandes du projet. Donnez une estimation indicative en temps ou en points d’efforts (si la méthodologie agile vous est familière) et tentez de tenir cette estimation.

L’écriture de ces tickets vous permettront de vous accorder sur un vocabulaire commun et Il est fortement apprécié qu’ils soient écrits en anglais !



## Nota Bene
Votre projet devra être suivi via SymfonyInsight, ou Codacy pour la qualité du code, vous veillerez à obtenir une médaille d'argent au minimum (pour SymfonyInsight), en complément le respect des PSR est recommandé afin de proposer un code compréhensible et facilement évolutif.
