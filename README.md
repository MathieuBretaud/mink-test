# TEST TECHNIQUE

Temps passé sur le projet 4 jours

## TECHNOS UTILISÉ

Pré-requis :  
* PHP >= 8.2  
* MySQL  
* LARAVEL 11
* VUEJS

Librairies :
* DAISYUI  
* GLIDE

## Installer les dépendances
Dans un premier temps, positionnez vous dans le dossier du projet :
```
cd <repo-name>
```

Executer la commande suivante
```
make install
```

## Initialiser la base de donnée avec des données

```
make seed-all
```

## Créer un administrateur
```
php artisan user:create
```
## Re initialiser la base de données avec des données

```
make prepare
```
## À propos

Ce test a été réalisé par Mathieu Bretaud. Si vous avez la moindre question, 
contactez [Mathieu Bretaud](mailto:mathieu.bretaud@gmail.com?subject=[Github]%20test%20technique)
