# CONTRIBUTORS

BAHOUALA Aiman, GODARD Nathan, VEGA Florian, CARRE Raphael, MARCHAL Téo.

# CONTEXT

Site web developpé dans le cadre d'un projet collaboratif dans l'enceinte du lycée Gaspard Monge.

# DEPLOYMENT

1. Cloner le projet de GITLAB via l'url.

2. Faire une copie de src/config/bdd.php.template et le coller au meme endroit.

3. Supprimer l'extension .template du nouveau fichier et l'ouvrir.

4. Ajouter vos ID de connexion de MYSQL dans le fichier.

5. Importer la base de données SRC/data/portail_monge.SQL dans une base de données nommée portail_monge.

6. Donner les droits d'acces 777 sur le dossier src/css/img/cate avec recursivité.

# UTILISATION 

1. L'acces au panel administrateur se fait via "portail.infomonge.net/admin".

2. L'acces est proteger par un .htaccess avec les identifiants par defaut admin:admin.

3. Les identifiants peuvent etre modifier/ajouter dans le fichier .htpasswd via la convention user:password, le password doit etre crypté via la methode CRYPT (c.f google).

4. Le panel administrateur dispose de 2 tableau : 

    4.1 - Le premier tableau "ajout d'une ligne" permet la modification/ajout de ligne dans le panel administrateur.
          Le panel est actuellement composé de 3 lignes par defaut.
          
    4.2 - Le premier tableau "ajout d'un item" permet la modification/ajout d'un item/service dans le panel                     administrateur.
    
    4.3 - Les deux boutons à droite permettent de modifier/supprimer un item/ligne.
    
5. Si modification du "nom id" d'un item, veuillez re-uploader l'image.

# ISSUES

1. Si l'image ne s'upload pas, voir avec les droit du dossier src/css/img/cate.

2. Si erreur 500, changer le chemin dans src/admin/.htaccess .
    