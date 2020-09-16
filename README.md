

# CONTEXT

portail permet de créer des liens vers d'autre site visible sous forme d'item cliquable (il est possible d'ajouter un reverse proxy sur les lien souhaité).

# DEPLOYMENT

1. Cloner le projet de GITLAB via l'url.

2. Faire une copie de src/config/bdd.php.template et le coller au meme endroit.

3. Supprimer l'extension .template du nouveau fichier et l'ouvrir.

4. Ajouter vos ID de connexion de MYSQL dans le fichier.

5. Importer la base de données SRC/data/portail.sql dans une base de données nommée PORTAIL.

6. Donner les droits d'acces 777 sur le dossier src/css/img/cate avec recursivité.

# UTILISATION 

1. L'acces au panel administrateur se fait via "YourDomain/admin".
    (et non pas "YourDomain/index.php/admin")

2. L'acces est proteger par un portail d'authentification avec les identifiants par defaut root:root.

4. Le panel administrateur dispose de 2 tableau : 

    4.1 - Le premier tableau "ajout d'une ligne" permet la modification/ajout de ligne dans le panel administrateur.
    ​      Le panel est actuellement composé de 3 lignes par defaut.
    ​      
    4.2 - Le premier tableau "ajout d'un item" permet la modification/ajout d'un item/service dans le panel                     administrateur.
    
    4.3 - Les deux boutons à droite permettent respectivement de modifier/supprimer un item/ligne.
    
5. Si modification du "nom id" d'un item, veuillez re-uploader l'image.

