# ***Adopte1Style***

**Adopte1Style** est un site de rencontre qui vous permettra de faire connaissance avec d'autre utilisateur et d'échanger sur vos style de mode. </br>
En d’autres termes, [...]. </br> [...] 
## Compatibilité système

Le programme est compatible avec les dernières versions de **Kali linux**, **Windows**.

## Technologies utilisées

* Langage de programmation : <code>PHP</code>, <code>SQL</code>, <code>JavaScript</code>,  <code>CSS</code>
* Logiciel utilisé : **Visual Studio Code**, **XAMPP** et **WAMPSERVER**.

## Téléchargement
* Télécharger [<code>Adopte1Style</code>]([https://github.com/ElyasMens/Projet/archive/refs/heads/main.zip](https://github.com/ElyasMens/Adopte1Style.git)) et extraire le fichier.
* Télécharger une version récente de [<code>XAMPP</code>] et [<code>WAMPSERVER</code>]  (Pour héberger la base de donnée SQL sur kali linux et windows respectivement).

## Lancement
* Sur kali linux, afin d'utiliser le programme, veuillez ouvrir un terminal dans le dossier <code>Adopte1Style-MAIN/</code> </br> Assurez-vous d'être à la racine du dosser <code>Adopte1Style-MAIN/</code></br>
* Exécuter la commande <code>php -S localhost:8080</code> puis rendez vous dans un navigateur et écrivez l'url suivant: <code>http://localhost:8080/Index.php</code> </br>

## Base de données
* Pour la base de données, il faut se connecter à phpmyadmin avec comme nom d'utilisateur <code>root</code> sans mot de passe,
* Rendez vous ensuite dans <code>Compte utilisateurs</code> et faites <code>Ajouter un compte d'utilisateur</code>

![image](https://github.com/ElyasMens/Adopte1Style-SQL-Version-/assets/133586599/2551b0d2-c138-45c6-ac72-a04dcdcee849)

* Dans Ajouter un compte d'utilisateur, le Nom d'utilisateur et le Mot de passe sont respectivement <code>Tout utilisateur</code> et <code>Pas de mot de passe</code>

![image](https://github.com/ElyasMens/Adopte1Style-SQL-Version-/assets/133586599/3f66d99c-cbb0-4235-99ef-57d5a2e439e0)

* Les privilèges globaux du compte sont <code>SELECT, INSERT, UPDATE, DELETE, CREATE, SHOW DATABASES</code>

![image](https://github.com/ElyasMens/Adopte1Style-SQL-Version-/assets/133586599/ffa9ab54-0d5b-437e-9002-baea817d39b7)

* Puis faites <code>Exécuter</code>

* Créez ensuite une nouvelles base de données que vous devenez nommer <code>aus_db</code> et pensez à importer le fichier <code>aus_db.sql</code> contenu dans le dossier <code>Import_to_phpmyadmin</code> pour assurer le bon fonctionnement du site

