<h1 align="center">API DOCUMENTATION</h1>

All routes starts with /api
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

