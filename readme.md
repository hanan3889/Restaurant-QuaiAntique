# Quai Antique - restaurant

Il s'agit d'un site internet fictif dans le cadre des mes etudes.
C'est un site internet sur le restaurant Quai Antique où le visiteur peut voir les plats les plus appreciés, consulter les menus, créer un compte, se connecter et reserver une table.

## Pré-requis

Il s'agit d'un projet développé uniqument sur symfony 5.4.2.

- Serveur:
- Xampp
- Version du serveur : 10.4.27-MariaDB

## Technologie

- PHP 8
- Composer v 2.5
- Symfony 5.4.2
- MySQL 8

Pour connaitre sa configuration il suffit de taper dans le terminal :

`symfony check:requirements`

## Livrables en annexes

Vous trouverez mes documents en annexe de mon github.

La marche à suivre ?

- ➡️ Se rendre sur l'onglet ==Go to file==

- ➡️ Taper sur la barre de recherche _charte graphique_ ou _documentation technique_

Ou sinon rendez-vous sur mon Google Drive https://drive.google.com/drive/u/1/my-drive

## CSS

J'ai installé le theme Cyborg de bootswatch (site proposant des themes gratuit et qui utilise bootstrap).

https://bootswatch.com/cyborg/

Pour la stylisation des pages j'ai installé le bundle webpack encore en tapant :

`composer require symfony/webpack-encore-bundle`

Puis j'ai installé le gestionnaire de paquets yarn

`yarn install`

## Installation en local

Je vous invite à installer mon projet en local via mon github :

avec la commande `git clone` https://github.com/hanan3889/ECF-Quai-Antique.git

Puis `composer update`
pour installer et mettre à jour composer

Démarrer Apache et MySQL avec la panneau de donfiguration.

Puis lancer le server local dans le terminal :

`symfony server:start`

Et pour l'arrêter :

`symfony server:stop`

# Administration

### Admin -

J'ai aussi crée des controllers à la main dans le repertoire Admin.
Puis j'ai crée un dossier Voter dans le dossier Security et les fichiers voter liés à mes entités afin de crée des voter pour les CRUD.
Voter que j'ai utilisé dans mes controller pour plus de sécurité.

### Personnalisation des pages d'erreurs

Pour personnaliser mes erreurs j'ai utilisé le twig pack via la commande :

`composer require symfony/twig-pack`

### ⚠️ Update - Comment se rendre sur les differentes pages de l'administration ⚠️

Se connecter avec adminstrateur avec le mail *admin@quaiantique.live* ainsi que le MDP fourni dans mes livrables.

Menu - Controller :

- ➡️ Pour la page Ajout d'un nouveau menu : /admin/ajout
- ➡️ Pour la page Modifier un menu : /admin/modifier/numero de l'id ex 9
- ➡️ Pour la page Supprimer un menu : /admin/supprimer/numero de l'id ex 9

Images - Controller :

- ➡️ Pour la page Ajout d'une nouvelle image : /admin/ajout
- ➡️ Pour la page Modifier une image : /admin/modifier/numero de l'id ex 9
- ➡️ Pour la page Supprimer une image : /admin/supprimer/numero de l'id ex 9
