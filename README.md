# Final-project-Back

adresse publique du serveur : https://pal.romain-feregotto.fr
login/mdp : admin/admin
Site hébergé sur AWS & disposant d'un certificat permettant le https voir[Résultat SSLLABS](https://www.ssllabs.com/ssltest/analyze.html?d=pal.romain%2dferegotto.fr&latest)
Utilisation d'Apache2
Base de donnée mysql & gestion de la base en version graphique avec l'installation de Phpmyadmin : https://pal.romain-feregotto.fr/phpmyadmin
Connexion en ssh, envoie des fichiers via commande scp

Description Back-office: On y accède en remplissant le login/password du .htaccess
                         Il permet : - De faire un CRUD, de visionner le Json sur le premier End-Point qui liste la totalité des     espèces ajoutés. Il répond aux spécifications imposées.

Présentation des routes de l'API: 
  URI : ?url=list, ?url=getone&id=[int]

  Url : 
- https://pal.romain-feregotto.fr/index.php?url=list
- https://pal.romain-feregotto.fr/index.php?url=getone&id=[int]

La première route (End-point), permet l'affichage complet de toutes les espèces présentes en base.
La deuxième route, permet l'affichage d'une seule espèce dès lors où la route fini bien par son id celon le schéma(la route) présenté.

Argumentaire:

J'ai utilisé composer afin d'utiliser le PSR-4, qui m'a permit d'utiliser les Classnames via l'autoloading.
Il s'agit de mon premier projet en POO et en back, ce qui explique l'architecture peu conventionnel.
Je suis passé par un routing "fait à la main" n'ayant pas pu prendre le temps d'aborder slim.


- Romain FEREGOTTO
- Jonathan YAFU 

#Disclaimer: "Ce site a été réalisé à des fins pédagogiques dans le cadre du cursus Bachelor de l’école HETIC. Les contenus présentés n'ont pas fait l'objet d'une demande de droit d'utilisation. Ce site ne sera en aucun cas exploité à des fins commerciales et ne sera pas publié”


#Crédit :
Merci à Constantin Guidon pour son aide précieuse et appréciée, son temps et ses explications (POO, Injection de dépendance, rooting & autres).
- Graphikart
- [Nouvelle techno](https://nouvelle-techno.fr/)
- [Mikecodeur](https://www.mikecodeur.com/)
- [PrimFX](https://www.youtube.com/channel/UCUSRY5EcZAhSbz1Q1QuQw0w)

& bien d'autres qui m'ont permis de comprendre certaines subtilitées, et d'adapter mon code pour répondre à certaines problématiques.


