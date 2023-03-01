# Quai antique - restaurant

Il s'agit d'un site internet fictif dans le cadre des mes etudes.
Le visiteur peut voir les plats les plus appreciés, consulter les plats, créer un compte, se connecter et reserver une table.

## Pré-requis

Il s'agit d'un projet développé uniqument sur symfony 5.4.2.

Serveur:
Xampp
Version du serveur : 10.4.27-MariaDB

## Technologie

PHP 8
Composer v 2.5
Symfony 5.4.2
MySQL 8

Pour connaitre sa configuration il suffit de taper dans le terminal :

`symfony check:requirements`

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

## Administration

Pour la partie administration j'ai installé le bundle EasyAdmin avec la commande :

`composer require easycorp/easyadmin-bundle`

Puis configurer le dashboard avec :

`php bin/console make:admin:dashboard`

Et realiser les Crud Controllers avec :

`php bin/console make:admin:crud`
