

<h1 align="center">API DOCUMENTATION</h1>

All routes starts with /api

### Partie Abdlhamid ##
### Universitaire

#### Add a new universite
```
POST /universitaires
| id | nom           | adresse | site_web                 | type    | tel           |
|----|---------------|---------|--------------------------|---------|---------------|
| 1  | Moulay Ismail | Meknes  | https://www.umi.ac.ma/  | public  | 05 35 467 307 |
```




```json
{
        
        "adresse": "Meknes",
        "nom": "Moulay ismail",
        "site_web": "https://www.umi.ac.ma/",
        "type": "public",
        "tel": "05 35 467 307",
    }
```

#### editer universite

```
PUT /universitaires/{id}
```

```json
{
        
        "adresse": "Meknes",
        "nom": "Moulay ismail",
        "site_web": "https://www.umi.ac.ma/",
        "type": "public",
        "tel": "05 35 467 307",
    }
```

### Universitaires

#### Get all universitaires

```
GET /universitaires
```

#### Show one universitaire

```
GET /universitaires/{id}
```

```json
{
        "id": 1,
        "adresse": "Meknes",
        "nom": "Moulay ismail",
        "site_web": "https://www.umi.ac.ma/",
        "type": "public",
        "tel": "05 35 467 307",
        "created_at": "2024-04-26T10:43:30.000000Z",
        "updated_at": "2024-04-26T10:43:30.000000Z"
    }
```
### supprimer universitaire
```
delete /universitaires/{id}
```
### afficher les evenements d'une universitaire
```
GET /universitaires/{id}/evenements
```

```json
{
    "universitaire": {
        "id": 1,
        "adresse": "Meknes",
        "nom": "Moulay ismail",
        "site_web": "https://www.umi.ac.ma/",
        "type": "public",
        "tel": "05 35 467 307",
        "created_at": "2024-04-26T10:43:30.000000Z",
        "updated_at": "2024-04-26T10:43:30.000000Z"
    },
    "evenements": [
        {
            "id": 1,
            "lieu": "salle de conference",
            "statue": "conférence sur l'intelligence artificielle",
            "created_at": "2024-04-26T11:22:32.000000Z",
            "updated_at": "2024-04-26T11:22:32.000000Z",
            "universitaire_id": 1
        }
    ]
}
```
### afficher les offres d' universitaire
```
GET /universitaires/{id}/offres
```
```json
{
    "universitaire": {
        "id": 1,
        "adresse": "Meknes",
        "nom": "Moulay ismail",
        "site_web": "https://www.umi.ac.ma/",
        "type": "public",
        "tel": "05 35 467 307",
        "created_at": "2024-04-26T10:43:30.000000Z",
        "updated_at": "2024-04-26T10:43:30.000000Z"
    },
    "offres": [
        {
            "id": 1,
            "description": "Nous recherchons un(e) stagiaire en développement web pour rejoindre notre équipe. Le stagiaire participera à la conception et au développement de nouvelles fonctionnalités pour notre plateforme en ligne.",
            "entreprise": "WeHelp",
            "lieu": "Meknes, Maroc",
            "statue": "Ouvert",
            "titre": "Stagiaire en Développement Web",
            "type_offre": "stage",
            "universitaire_id": 1,
            "nbr_places": 2,
            "salaire": null,
            "created_at": "2024-04-26T12:31:21.000000Z",
            "updated_at": "2024-04-26T12:31:21.000000Z"
        },
        {
            "id": 3,
            "description": "Nous recherchons un développeur web expérimenté pour rejoindre notre équipe. Le candidat retenu sera responsable du développement et de la maintenance de notre site web, ainsi que de la création de nouvelles fonctionnalités pour répondre aux besoins de nos utilisateurs.",
            "entreprise": "Alten",
            "lieu": "fés, Maroc",
            "statue": "Ouvert",
            "titre": "Développeur Web",
            "type_offre": "offre_emploi",
            "universitaire_id": 1,
            "nbr_places": 1,
            "salaire": 6000,
            "created_at": "2024-04-26T12:40:02.000000Z",
            "updated_at": "2024-04-26T12:40:02.000000Z"
        }
    ]
}
```
### afficher les offres par filtre (stage ou offre_emploi)
```
GET /universitaires/{id}/offers/{type}
```
```json
{
    "universitaire": {
        "id": 1,
        "adresse": "Meknes",
        "nom": "Moulay ismail",
        "site_web": "https://www.umi.ac.ma/",
        "type": "public",
        "tel": "05 35 467 307",
        "created_at": "2024-04-26T10:43:30.000000Z",
        "updated_at": "2024-04-26T10:43:30.000000Z"
    },
    "offres": [
        {
            "id": 1,
            "description": "Nous recherchons un(e) stagiaire en développement web pour rejoindre notre équipe. Le stagiaire participera à la conception et au développement de nouvelles fonctionnalités pour notre plateforme en ligne.",
            "entreprise": "WeHelp",
            "lieu": "Meknes, Maroc",
            "statue": "Ouvert",
            "titre": "Stagiaire en Développement Web",
            "type_offre": "stage",
            "universitaire_id": 1,
            "nbr_places": 2,
            "salaire": null,
            "created_at": "2024-04-26T12:31:21.000000Z",
            "updated_at": "2024-04-26T12:31:21.000000Z"
        }
    ]
}
```
### afficher les statistique d'un universitaire
```
GET /universitaires/{id}/statistiques
```
```json
{
    "universitaire": {
        "id": 1,
        "adresse": "Meknes",
        "nom": "Moulay ismail",
        "site_web": "https://www.umi.ac.ma/",
        "type": "public",
        "tel": "05 35 467 307",
        "created_at": "2024-04-26T10:43:30.000000Z",
        "updated_at": "2024-04-26T10:43:30.000000Z"
    },
    "statistique": [
        {
            "id": 2,
            "universitaire_id": 1,
            "date": "2024-04-26",
            "nbr_visite": 6,
            "created_at": "2024-04-26T14:14:19.000000Z",
            "updated_at": "2024-04-26T14:33:21.000000Z"
        }
    ]
}

```


### Evenements
### Add new Evenement
```
POST /evenements

| id | lieu               | statue                                     | universitaire_id |
|----|--------------------|--------------------------------------------|------------------|
| 1  | salle de conference| conférence sur l'intelligence artificielle| 1                |

```
```json 
    {
        
        "lieu": "salle de conference",
        "statue": "conférence sur l'intelligence artificielle",
        "created_at": "2024-04-26T11:22:32.000000Z",
        "updated_at": "2024-04-26T11:22:32.000000Z",
        "universitaire_id": 1
    }

```
### editer evenement
```
PUT /evenements/{id}
```

```json
{
        
        "lieu": "salle de conference",
        "statue": "conférence sur l'intelligence artificielle",
        "universitaire_id": 1
    }

```
### get all evenements
```
GET /evenements
```
```json
[
    {
        "id": 1,
        "lieu": "salle de conference",
        "statue": "conférence sur l'intelligence artificielle",
        "created_at": "2024-04-26T11:22:32.000000Z",
        "updated_at": "2024-04-26T11:22:32.000000Z",
        "universitaire_id": 1
    },
    {
        "id": 2,
        "lieu": "Amphie theatre",
        "statue": "conférence sur les droits humaines",
        "created_at": "2024-04-26T11:23:29.000000Z",
        "updated_at": "2024-04-26T11:23:29.000000Z",
        "universitaire_id": 2
    }
]
```
### afficher un evenement
```
GET /evenements/{id}
```
```json
{
    "id": 1,
    "lieu": "salle de conference",
    "statue": "conférence sur l'intelligence artificielle",
    "created_at": "2024-04-26T11:22:32.000000Z",
    "updated_at": "2024-04-26T11:22:32.000000Z",
    "universitaire_id": 1
}
```

### supprimer evenemet
```
delete /evenements/{id}
```




### Ecole

#### Add a new ecole
```
POST /ecoles
| ID   | Abréviation | Titre                                  |
|------|-------------|----------------------------------------|
| INT  | VARCHAR(10) | VARCHAR(50)                            |
| 1    | EST         | École Supérieure de Technologie       |




```json
{
	"abreviation": "ecole superieur de technologie",
	"title": "est"
}
```

#### editer ecole

```
PUT /ecoles/{id}

```json
{
	"abreviation": "ecole superieur de technologie",
	"title": "est"
}
```

### Ecoles

#### Get all ecoles

```
GET /ecoles
```

#### Show one ecole

```
GET /ecoles/{id}
```

```json
 {
        "id": 5,
        "abreviation": "est",
        "title": "ecole superieur de technologie",
        "created_at": "2024-04-25T09:30:03.000000Z",
        "updated_at": "2024-04-25T09:30:03.000000Z"
    }
```

#### Afficher les programmes que une ecole contient

```
GET /ecoles/{id_ecole/programmes}
```

```json
{
    "ecole": {
        "id": 5,
        "abreviation": "est",
        "title": "ecole superieur de technologie",
        "created_at": "2024-04-25T09:30:03.000000Z",
        "updated_at": "2024-04-25T09:30:03.000000Z"
    },
    "programmes": [
        {
            "id": 13,
            "emplacement_geographique": "Meknes Maroc",
            "langue_enseignement": "Francais",
            "niveau_etude": "DUT",
            "nom": "Deplome universitaire de technologie",
            "possibilite_financement": "Bourses",
            "duree": 2,
            "frais_scolarite": 0,
            "created_at": "2024-04-25T09:33:45.000000Z",
            "updated_at": "2024-04-25T09:33:45.000000Z",
            "ecole_id": 5
        },
        {
            "id": 14,
            "emplacement_geographique": "Meknes Maroc",
            "langue_enseignement": "Francais",
            "niveau_etude": "LP",
            "nom": "Licence Professionnel",
            "possibilite_financement": "Bourses",
            "duree": 1,
            "frais_scolarite": 0,
            "created_at": "2024-04-25T09:35:24.000000Z",
            "updated_at": "2024-04-25T09:35:24.000000Z",
            "ecole_id": 5
        }
    ]
}
```

### =================== Programme ===================================================

#### Add new Partner brand

```
POST /programmes
```

```json
{
    {
           
            "emplacement_geographique": "Meknes Maroc",
            "langue_enseignement": "Francais",
            "niveau_etude": "DUT",
            "nom": "Deplome universitaire de technologie",
            "possibilite_financement": "Bourses",
            "duree": 2,
            "frais_scolarite": 0,
            "ecole_id": 5
        }
}
```

#### Afficher les programmes

```
GET /programmes
```

```json
{
            "id": 13,
            "emplacement_geographique": "Meknes Maroc",
            "langue_enseignement": "Francais",
            "niveau_etude": "DUT",
            "nom": "Deplome universitaire de technologie",
            "possibilite_financement": "Bourses",
            "duree": 2,
            "frais_scolarite": 0,
            "created_at": "2024-04-25T09:33:45.000000Z",
            "updated_at": "2024-04-25T09:33:45.000000Z",
            "ecole_id": 5
        }
```

#### Modifier un programme

```
PUT /programmes/{id}
```



```json
{
            "id": 13,
            "emplacement_geographique": "Meknes Maroc",
            "langue_enseignement": "Francais",
            "niveau_etude": "DUT",
            "nom": "Deplome universitaire de technologie",
            "possibilite_financement": "Bourses",
            "duree": 2,
            "frais_scolarite": 0,
            "created_at": "2024-04-25T09:33:45.000000Z",
            "updated_at": "2024-04-25T09:33:45.000000Z",
            "ecole_id": 5
        }
```

#### Afficher les domaines qui peut un programme contient

```
GET /programmes/{id_programme}/domaines
```

```json
{
    "programme": {
        "id": 13,
        "emplacement_geographique": "Meknes Maroc",
        "langue_enseignement": "Francais",
        "niveau_etude": "DUT",
        "nom": "Deplome universitaire de technologie",
        "possibilite_financement": "Bourses",
        "duree": 2,
        "frais_scolarite": 0,
        "created_at": "2024-04-25T09:33:45.000000Z",
        "updated_at": "2024-04-25T09:33:45.000000Z",
        "ecole_id": 5
    },
    "domaines": [
        {
            "id": 10,
            "description": "Etude de technologie electrique",
            "nom": "Genie Electrique",
            "created_at": "2024-04-25T09:42:30.000000Z",
            "updated_at": "2024-04-25T09:42:30.000000Z",
            "programme_id": 13
        },
        {
            "id": 11,
            "description": "Etude de technologie Informatique",
            "nom": "Genie Informatique",
            "created_at": "2024-04-25T09:42:48.000000Z",
            "updated_at": "2024-04-25T09:43:31.000000Z",
            "programme_id": 13
        },
        {
            "id": 12,
            "description": "Etude de science economique",
            "nom": "Economie",
            "created_at": "2024-04-25T09:44:09.000000Z",
            "updated_at": "2024-04-25T09:44:09.000000Z",
            "programme_id": 13
        }
    ]
}
```


#### Get domaines

```
GET /domaineEtudes
```
```json
 {
        "id": 10,
        "description": "Etude de technologie electrique",
        "nom": "Genie Electrique",
        "created_at": "2024-04-25T09:42:30.000000Z",
        "updated_at": "2024-04-25T09:42:30.000000Z",
        "programme_id": 13
    },
    {
        "id": 11,
        "description": "Etude de technologie Informatique",
        "nom": "Genie Informatique",
        "created_at": "2024-04-25T09:42:48.000000Z",
        "updated_at": "2024-04-25T09:43:31.000000Z",
        "programme_id": 13
    },
    {
        "id": 12,
        "description": "Etude de science economique",
        "nom": "Economie",
        "created_at": "2024-04-25T09:44:09.000000Z",
        "updated_at": "2024-04-25T09:44:09.000000Z",
        "programme_id": 13
    }
```
### creer domaine etude
```
POST /domaineEtudes
```

```json
 {
        "id": 12,
        "description": "Etude de science economique",
        "nom": "Economie",
        "programme_id": 13
    }
```
### modifier un domaine d etude
```
PUT /dommaineEtudes/{id}
```



```json
{
        "id": 12,
        "description": "Etude de science economique",
        "nom": "Economie",
        "programme_id": 13    
        }
```
### supprimer un domaine
delete /domaineEtudes/{id}
#### Afficher les sous domaines d'un domaine

```
GET /domaineEtudes/{id_domaine}/sousDomaines
```

```json
{
    "domaine": {
        "id": 10,
        "description": "Etude de technologie electrique",
        "nom": "Genie Electrique",
        "created_at": "2024-04-25T09:42:30.000000Z",
        "updated_at": "2024-04-25T09:42:30.000000Z",
        "programme_id": 13
    },
    "sous_domaines": [
        {
            "id": 12,
            "description": "Genie electrique",
            "nom": "GE",
            "created_at": "2024-04-25T09:52:32.000000Z",
            "updated_at": "2024-04-25T09:52:32.000000Z",
            "domaine_etude_id": 10
        },
        {
            "id": 13,
            "description": "Genie Industriel et maintenance",
            "nom": "GIM",
            "created_at": "2024-04-25T09:52:55.000000Z",
            "updated_at": "2024-04-25T09:52:55.000000Z",
            "domaine_etude_id": 10
        }
    ]
}
```

#### Get sous_domaines

```
GET /sousDomaines
```
```json
[
	    {
        "id": 10,
        "description": "Intelligence Artificiel et technologie emergentes",
        "nom": "IA et technologie emergentes",
        "created_at": "2024-04-25T09:50:31.000000Z",
        "updated_at": "2024-04-25T09:50:31.000000Z",
        "domaine_etude_id": 11
    },
    {
        "id": 11,
        "description": "developpment web",
        "nom": "DWB",
        "created_at": "2024-04-25T09:52:02.000000Z",
        "updated_at": "2024-04-25T09:52:02.000000Z",
        "domaine_etude_id": 11
    },
    {
        "id": 12,
        "description": "Genie electrique",
        "nom": "GE",
        "created_at": "2024-04-25T09:52:32.000000Z",
        "updated_at": "2024-04-25T09:52:32.000000Z",
        "domaine_etude_id": 10
    },
    {
        "id": 13,
        "description": "Genie Industriel et maintenance",
        "nom": "GIM",
        "created_at": "2024-04-25T09:52:55.000000Z",
        "updated_at": "2024-04-25T09:52:55.000000Z",
        "domaine_etude_id": 10
    },
    {
        "id": 14,
        "description": "Technique management",
        "nom": "TM",
        "created_at": "2024-04-25T09:53:21.000000Z",
        "updated_at": "2024-04-25T09:53:21.000000Z",
        "domaine_etude_id": 12
    },
    {
        "id": 15,
        "description": "Finance banque et assurance",
        "nom": "FBA",
        "created_at": "2024-04-25T09:53:46.000000Z",
        "updated_at": "2024-04-25T09:53:46.000000Z",
        "domaine_etude_id": 12
    }
]
```
#### Creer un sous domaine
POST /sousDomaines


```json
 {
        
        "description": "Finance banque et assurance",
        "nom": "FBA",
        "domaine_etude_id": 12
    }
```

#### Modifier un sous domaine
```
PUT /sousDommaines/{id}
```



```json
{
        
        "description": "Finance banque et assurance",
        "nom": "FBA",
        "domaine_etude_id": 12
    }
```
#### Get All coup projecteur

```
GET /coupProjecteurs
```
```json
[
    {
        "id": 1,
        "created_at": "2024-04-24T20:50:06.000000Z",
        "updated_at": "2024-04-24T20:50:06.000000Z",
        "description": "Un programme d'études avancées en informatique",
        "titre": "Maîtrise en informatique",
        "ecole_id": 1,
        "ecole_title": "École Normale Supérieure"
    },
    {
        "id": 6,
        "created_at": "2024-04-25T11:33:08.000000Z",
        "updated_at": "2024-04-25T11:33:08.000000Z",
        "description": "Rejoigner notre cycle d ingenieur",
        "titre": "École Polytechnique Fédérale de Lausanne",
        "ecole_id": 1,
        "ecole_title": "École Normale Supérieure"
    },
    {
        "id": 2,
        "created_at": "2024-04-24T20:50:37.000000Z",
        "updated_at": "2024-04-24T20:50:37.000000Z",
        "description": "Un cours intensif sur la finance d'entreprise",
        "titre": "Finance d'entreprise",
        "ecole_id": 2,
        "ecole_title": "École Polytechnique Fédérale de Lausanne"
    },
    {
        "id": 3,
        "created_at": "2024-04-24T20:50:52.000000Z",
        "updated_at": "2024-04-24T20:50:52.000000Z",
        "description": "Un programme de recherche en biologie moléculaire",
        "titre": "Doctorat en biologie",
        "ecole_id": 3,
        "ecole_title": "Massachusetts Institute of Technology"
    },
    {
        "id": 4,
        "created_at": "2024-04-24T20:51:34.000000Z",
        "updated_at": "2024-04-24T20:51:34.000000Z",
        "description": "Un cursus complet sur la littérature française du XIXe siècle",
        "titre": "Licence en littérature",
        "ecole_id": 4,
        "ecole_title": "University of California, Los Angeles"
    },
    {
        "id": 5,
        "created_at": "2024-04-25T11:32:06.000000Z",
        "updated_at": "2024-04-25T11:32:06.000000Z",
        "description": "Rejoigner le programme DUT",
        "titre": "ecole supereiur de technologie",
        "ecole_id": 5,
        "ecole_title": "ecole superieur de technologie"
    }
]
	   
```
#### Creer un coup projecteur
POST  /coupProjecteurs


```json
 {
        
        "description":" Rejoigner notre cycle d ingenieur ",
"titre" :"École Polytechnique Fédérale de Lausanne",
"ecole_id":1
    }
```

#### Modifier un sous domaine

PUT /coupProjecteurs/{id}




```json
{
        
        "description":" Rejoigner notre cycle d ingenieur ",
		"titre" :"École Polytechnique Fédérale de Lausanne",
		"ecole_id":1
    }
```
### supprimer un coup projecteur
delete /coupProjecteurs/{id}

### Partie MoHAMED ###

#### Authenticate 

```
POST /api/login
```
```json
{
	"email": "etudiant2@gmail.com",
	"password": "123456789"
}
```

### users

#### get all users
```
GET /api/accounts

```
```json


{
	{
        "id": 1,
        "nom": "nnn",
        "prenom": "fjjhh",
        "email": "adj@gmail.com",
        "email_verified_at": null,
        "tel": "05555555",
        "role": "responsable_universitaire",
        "nom_Organization": "Nom de l'organisation",
        "level": "Bac+2",
        "pays_id": null,
        "ville_id": 2,
        "Date_Graduation": "2222-02-02",
        "created_at": "2024-04-25T13:29:04.000000Z",
        "updated_at": "2024-05-02T12:55:59.000000Z",
        "deleted_at": null
    },
    {
        "id": 2,
        "nom": "tets",
        "prenom": "test",
        "email": "etudiant2@gmail.com",
        "email_verified_at": null,
        "tel": "055555555",
        "role": "etudiant",
        "nom_Organization": null,
        "level": "Bac+5",
        "pays_id": null,
        "ville_id": 0,
        "Date_Graduation": "2222-02-02",
        "created_at": "2024-04-25T13:31:08.000000Z",
        "updated_at": "2024-04-25T13:31:08.000000Z",
        "deleted_at": null
    }
}

```

#### get user

```
GET /api/accounts/{user}
```
```json
{
    "id": 1,
    "nom": "nnn",
    "prenom": "fjjhh",
    "email": "adj@gmail.com",
    "email_verified_at": null,
    "tel": "05555555",
    "role": "responsable_universitaire",
    "nom_Organization": null,
    "level": null,
    "pays_id": null,
    "ville_id": null,
    "Date_Graduation": null,
    "created_at": "2024-04-25T13:29:04.000000Z",
    "updated_at": "2024-05-02T12:55:59.000000Z",
    "deleted_at": null
}
```


#### create user

```
POST /api/accounts
```


```json

{
    "nom": "fgfgf",
    "prenom": "fjjhh",
    "email": "ttttdfdjjfghd@example.com",
    "password": "motdepasse",
    "tel": "123456789",
    "role": "administrateur",
    "nom_Organization": null,
    "level": null,
    "ville_id":null,
    "pays_id":null,
    "Date_Graduation": null,
	"created_at": "2024-04-25T13:29:04.000000Z",
    "updated_at": "2024-05-02T12:55:59.000000Z",
    "deleted_at": null
}

```

#### update user

```
PUT api/accounts/1
```

```json

{
    "nom": "nnn",
    "prenom": "fjjhh",
    "email": "adj@gmail.com",
    "password": "123456789",
    "tel": "05555555",
    "role": "administrateur",
    "nom_Organization": null,
    "level": null,
    "ville_id":null,
    "pays_id":null,
    "Date_Graduation": null,
	"created_at": "2024-04-25T13:29:04.000000Z",
    "updated_at": "2024-05-02T12:55:59.000000Z",
    "deleted_at": null
}

```

#### delete user

```
DELETE api/accounts/1
```

```json

{
   
    "message": "Compte supprimé avec succès"

}

```


#### get all university of a manager

```
GET api/accounts/managers/{user}
```

```json

{
   
    [
    {
        "id": 2,
        "adresse": "dswxc",
        "nom": "MLY",
        "site_web": "xvd",
        "type": "vdx",
        "tel": "vx744",
        "created_at": null,
        "updated_at": null,
        "user_id": 2
    },
    {
        "id": 3,
        "adresse": "universt",
        "nom": "Mohammadia",
        "site_web": "dfgdf",
        "type": "df",
        "tel": "5563",
        "created_at": null,
        "updated_at": null,
        "user_id": 2
    }
]

}

```


### Candidatures


#### get all candidatures

```
GET /api/candidatures
```

```json
[
    {
        "id": 2,
        "choix": "test",
        "diplome": "test",
        "lettre_de_motivation": "test",
        "releves_de_notes": "test",
        "user_id": 4,
        "deleted_at": null,
        "created_at": "2024-04-25T15:27:48.000000Z",
        "updated_at": "2024-04-25T15:27:48.000000Z"
    },
    {
        "id": 3,
        "choix": "test",
        "diplome": "tesytt",
        "lettre_de_motivation": "test",
        "releves_de_notes": "test",
        "user_id": 4,
        "deleted_at": null,
        "created_at": "2024-04-25T15:27:56.000000Z",
        "updated_at": "2024-04-25T15:27:56.000000Z"
    }
]
```

#### get candidature

```
GET api/candidatures/{candidature}
```

```json
{
    "id": 2,
    "choix": "test",
    "diplome": "test",
    "lettre_de_motivation": "test",
    "releves_de_notes": "test",
    "user_id": 4,
    "deleted_at": null,
    "created_at": "2024-04-25T15:27:48.000000Z",
    "updated_at": "2024-04-25T15:27:48.000000Z"
}
```

#### create candidature

```
POST /api/candidatures
```

```json
{
        "choix":   "test",
        "diplome":"tesytt",
        "lettre_de_motivation":"test",
        "releves_de_notes":"test",
        "user_id":7
}
```

#### Update candidature

```
PUT /api/candidatures/1
```

```json
{
        "id": 2,
        "choix": "nhy",
        "diplome": "ny",
        "lettre_de_motivation": "test",
        "releves_de_notes": "test",
        "user_id": 2,
        "deleted_at": null,
        "created_at": "2024-04-25T15:27:48.000000Z",
        "updated_at": "2024-05-03T20:20:36.000000Z"
}

```

#### DELETE candidature

```
DELETE /api/candidatures/1
```

```json
{
    "message": "Candidature supprimée avec succès"
}

```




### annonces

#### Get all annonces

```
GET /api/annonces
```

```json
[
    {
        "id": 1,
        "description": "test",
        "titre": "test",
        "image": "test",
        "user_id": 2,
        "deleted_at": null,
        "created_at": null,
        "updated_at": "2024-04-28T13:38:16.000000Z"
    },
    {
        "id": 3,
        "description": "teer",
        "titre": "tesy",
        "image": "tet",
        "user_id": 1,
        "deleted_at": null,
        "created_at": "2024-04-25T14:57:01.000000Z",
        "updated_at": "2024-04-25T15:01:35.000000Z"
    }
]
```



#### Get annonces

```
GET /api/annonces/{annonces}
```

```json
{
    "id": 3,
    "description": "teer",
    "titre": "tesy",
    "image": "tet",
    "user_id": 1,
    "deleted_at": null,
    "created_at": "2024-04-25T14:57:01.000000Z",
    "updated_at": "2024-04-25T15:01:35.000000Z"
}
```


#### create annonce

```
POST /api/annonces
```

```json
{
    "id": 3,
    "description": "teer",
    "titre": "tesy",
    "image": "tet",
    "user_id": 1,
    "deleted_at": null,
    "created_at": "2024-04-25T14:57:01.000000Z",
    "updated_at": "2024-04-25T15:01:35.000000Z"
}
```

#### update annonce

```
PUT /api/annonces/4
```
```json
{
    "id": 3,
    "description": "teer",
    "titre": "tesy",
    "image": "tet",
    "user_id": 1,
    "deleted_at": null,
    "created_at": "2024-04-25T14:57:01.000000Z",
    "updated_at": "2024-04-25T15:01:35.000000Z"
}
```




#### delete annonces

```
DELETE /api/annonces/4
```
```json
{
    "message": "Annonce supprimée avec succès"
}
```

#### Pays



#### GET all villes d'un pays

```
GET /api/allvillespays/1
```
```json
[
    {
        "id": 1,
        "titre": "ville1",
        "pays_id": 1,
        "deleted_at": null,
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 2,
        "titre": "ville2",
        "pays_id": 1,
        "deleted_at": null,
        "created_at": null,
        "updated_at": null
    }
]
```

#### GET all pays

```
GET /api/pays
```
```json
[
{
        "id": 1,
        "titre": "pays1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": "2024-05-02T12:16:47.000000Z"
    },
    {
        "id": 2,
        "titre": "pays2",
        "deleted_at": null,
        "created_at": "2024-05-02T12:13:29.000000Z",
        "updated_at": "2024-05-02T12:13:29.000000Z"
    }
]
```



#### GET pays

```
GET /api/pays/{pays}
```
```json
[
{
        "id": 1,
        "titre": "pays1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": "2024-05-02T12:16:47.000000Z"
    }
]
```


#### create pays

```
POST /api/pays
```
```json
[
{
        "id": 1,
        "titre": "pays1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": "2024-05-02T12:16:47.000000Z"
    }
]
```


#### Update pays

```
POST /api/pays/{pays}
```
```json
[
{
        "id": 1,
        "titre": "pays1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": "2024-05-02T12:16:47.000000Z"
    }
]
```

#### DELETE pays

```
POST /api/pays/{pays}
```
```json
[
	{
		"message": "pays supprimée avec succès"
	}
]
```



#### villes



#### GET all villes

```
GET api/villes
```
```json
[
	 {
        "id": 1,
        "titre": "ville1",
        "pays_id": 1,
        "deleted_at": null,
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 2,
        "titre": "ville2",
        "pays_id": 1,
        "deleted_at": null,
        "created_at": null,
        "updated_at": null
    }
]
```


#### GET villes

```
GET api/villes/{ville}
```
```json
[
	 {
    "id": 1,
    "titre": "ville1",
    "pays_id": 1,
    "deleted_at": null,
    "created_at": null,
    "updated_at": null
}
]
```

#### create villes

```
POST api/villes
```
```json
[
	{
    "titre": "ville100",
    "pays_id": 1
   }
]
```


#### update villes

```
PUT api/villes/{ville}
```
```json
[
	{
    "titre":"ville100",
    "pays_id":2
    
   }
]
```


#### delete villes

```
DELETE api/villes/{ville}
```
```json

```



#### Message


#### GET all messages of 2 users

```
GET api/messages/{user}
```
!!token requiered

```json
[
	 {
        "id": 1,
        "contenu": "mezzef",
        "id_emetteur": 1,
        "id_recepteur": 2,
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 2,
        "contenu": "kk,n",
        "id_emetteur": 1,
        "id_recepteur": 2,
        "created_at": null,
        "updated_at": null
    }
]
```


#### create message

```
POST api/messages/{user}
```
!!token requiered

```json
[
	{
    "contenu":"votre message"
    }  
]
```


#### ForumDiscussion

#### GET all forum discussions and comments of a university.


```
GET api/forum_discussion_universitaire/{universitaire}
```

```json
[
    {
        "id": 1,
        "titre": "testtes",
        "contenu": "cj fds jsfd sdjkfdsj sdfjkdkfsjeijfsd dsf,fn",
        "user_id": 2,
        "deleted_at": null,
        "created_at": "2024-05-03T13:37:18.000000Z",
        "updated_at": "2024-05-03T13:37:18.000000Z",
        "universitaire_id": 1,
        "commentaires": [
            {
                "id": 2,
                "contenu": "cxv,",
                "user_id": 4,
                "forum_discussion_id": 1,
                "deleted_at": null,
                "created_at": null,
                "updated_at": "2024-05-05T17:51:22.000000Z"
            },
            {
                "id": 3,
                "contenu": "etgf",
                "user_id": 1,
                "forum_discussion_id": 1,
                "deleted_at": null,
                "created_at": "2024-05-03T14:05:16.000000Z",
                "updated_at": "2024-05-03T14:05:16.000000Z"
            }
        ]
    },
    {
        "id": 2,
        "titre": "kkkkktesttes",
        "contenu": "ùmmdmfmfcj fds jsfd sdjkfdsj sdfjkdkfsjeijfsd dsf,fn",
        "user_id": 7,
        "deleted_at": null,
        "created_at": "2024-05-03T13:37:35.000000Z",
        "updated_at": "2024-05-05T17:45:17.000000Z",
        "universitaire_id": 1,
        "commentaires": [
            {
                "id": 1,
                "contenu": "etf",
                "user_id": 8,
                "forum_discussion_id": 2,
                "deleted_at": null,
                "created_at": null,
                "updated_at": "2024-05-03T14:13:11.000000Z"
            }
        ]
    }
]
```



#### GET all comments of a forum discussion

```
GET api/forum_discussion_commantaire/{forum}
```

```json
[
	{
    "id": 2,
    "titre": "kkkkktesttes",
    "contenu": "ùmmdmfmfcj fds jsfd sdjkfdsj sdfjkdkfsjeijfsd dsf,fn",
    "user_id": 7,
    "deleted_at": null,
    "created_at": "2024-05-03T13:37:35.000000Z",
    "updated_at": "2024-05-03T13:39:36.000000Z",
    "commentaires": [
        {
            "id": 2,
            "contenu": "cxv,",
            "user_id": 4,
            "forum_discussion_id": 2,
            "deleted_at": null,
            "created_at": null,
            "updated_at": null
        }
      ]
    } 
]
```



#### GET all forum discussion

```
GET api/forum_discussion
```

```json
[
	{
        "id": 1,
        "titre": "testtes",
        "contenu": "cj fds jsfd sdjkfdsj sdfjkdkfsjeijfsd dsf,fn",
        "user_id": 2,
        "deleted_at": null,
        "created_at": "2024-05-03T13:37:18.000000Z",
        "updated_at": "2024-05-03T13:37:18.000000Z"
    },
    {
        "id": 2,
        "titre": "kkkkktesttes",
        "contenu": "ùmmdmfmfcj fds jsfd sdjkfdsj sdfjkdkfsjeijfsd dsf,fn",
        "user_id": 7,
        "deleted_at": null,
        "created_at": "2024-05-03T13:37:35.000000Z",
        "updated_at": "2024-05-03T13:39:36.000000Z"
    }
]
```



#### create forum discussion

```
POST api/forum_discussion
```

```json
[
	{
    "titre":"dfwlfdktesttes",
    "contenu":"ùmmdmfmfcj fds jsfd sdjkfdsj sdfjkdkfsjeijfsd dsf,fn",
     "user_id":"7"
     }
]
```



#### update forum discussion

```
PUT api/forum_discussion
```

```json
[
	{
    "titre":"dfwlfdktesttes",
    "contenu":"ùmmdmfmfcj fds jsfd sdjkfdsj sdfjkdkfsjeijfsd dsf,fn",
     "user_id":"7"
     }
]
```


#### delete forum discussion

```
DELETE api/forum_discussion
```

```json
[
	{
    "message": "Forum supprimée avec succès"
    }
]
```



#### commentaire


#### create commentaire

```
POST api/commantaire
```

```json
[
	{
    "contenu":"etgf",
    "user_id":1,
    "forum_discussion_id":1

    }
]
```



#### update commentaire

```
PUT api/commantaire/{commentaire}
```

```json
[
	{
    "contenu":"etgf",
    "user_id":1,
    "forum_discussion_id":1

    }
]
```


#### delete commentaire

```
DELTE api/commantaire/{commentaire}
```

```json
[
	{
    "message": "Commentaire supprimée avec succès"
    }
]
```



#### manager_universitaires



#### GET all manager universitaires

```
GET /api/Manageruniversitaires/{manager}
```
```json
[
     {
        "id": 2,
        "adresse": "hjkjghghjghy",
        "nom": "Université Example",
        "site_web": "https://www.example.com",
        "type": "Public",
        "tel": "+1234567890",
        "created_at": null,
        "updated_at": "2024-05-13T12:22:54.000000Z",
        "image": null,
        "user_id": 7
    },
    {
        "id": 3,
        "adresse": "universt",
        "nom": "Mohammadia",
        "site_web": "dfgdf",
        "type": "df",
        "tel": "5563",
        "created_at": null,
        "updated_at": null,
        "image": null,
        "user_id": 0
    }
]
```


#### add universitaires to manager

```
POST /api/Manageruniversitaires/{manager}
```

```json
body:
 {
    "universiteIds": [1, 2, 3]
 }

[
     {
    "message": "Relations insérées avec succès"
     }
]
```


#### delete one universitaires manager

```
delete /Manageruniversitaires/{managerid}/{universiteId}
```

```json

[
     {
    "message": "Relation supprimée avec succès"
     }
]
```

#### multi delete one universitaires manager

```
delete /api/Manageruniversitaires/multidelet/{managerid}
```

```json
body:
 {
    "universiteIds": [1, 2, 3]
 }

[
     {
    "message": "Relations supprimée avec succès"
     }
]
```
