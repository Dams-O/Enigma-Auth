---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_0f8ecc008bbceb798251c0de85808ef8 -->
## Enregistrer un nouveau user.

C'est ici que l'on va ajouter un nouvel utilisateur grâce à son nom, son email et son mot de passe.

> Example request:

```bash
curl -X POST \
    "/api/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"Name":"eveniet","Email":"aut","Password":"assumenda"}'

```

```javascript
const url = new URL(
    "/api/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "Name": "eveniet",
    "Email": "aut",
    "Password": "assumenda"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST /api/register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `Name` | string |  optional  | Nom de l'utilisateur
        `Email` | email |  optional  | L'email de l'utilisateur
        `Password` | string |  optional  | Mot de passe entré par l'utilisateur
    
<!-- END_0f8ecc008bbceb798251c0de85808ef8 -->

<!-- START_b982a9c2785c94e078bbe534a1f12d68 -->
## Récupérer un token JWT via les informations utilisateurs.

Lorsqu'un utilisateur réussit à ce connecter, nous allons lui retourner un token avec différentes informations.

> Example request:

```bash
curl -X POST \
    "/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"Email":"quod","Password":"magnam"}'

```

```javascript
const url = new URL(
    "/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "Email": "quod",
    "Password": "magnam"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "token": "token",
    "token_type": "bearer",
    "expire_in": "14400"
}
```

### HTTP Request
`POST /api/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `Email` | String |  optional  | L'email entré par l'utilisateur
        `Password` | String |  optional  | Mot de passe entré par l'utilisateur
    
<!-- END_b982a9c2785c94e078bbe534a1f12d68 -->

<!-- START_eb9b212776875babfe01f41eb780d3b1 -->
## Récupérer le ou les utilisateur(s) connecté(s)

Cette fonction retourne le nom de l'utilisateur uniquement s'il est connecté.

> Example request:

```bash
curl -X GET \
    -G "/api/profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "/api/profile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "user": "Name de l'utilisateur"
}
```

### HTTP Request
`GET /api/profile`


<!-- END_eb9b212776875babfe01f41eb780d3b1 -->

<!-- START_b1f8ce5c516b48f856fb396b04dfd494 -->
## Récupère les informations d&#039;un seul utilisateur.

Cette fonction récupère les informations d'un utilisateur grâce à son id.

> Example request:

```bash
curl -X GET \
    -G "/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "Id": "1",
    "Name": "Olive",
    "Email": "Olivier@gmail.fr",
    "Password": "ergerh98egerkjgnerjgne74grjegeirg3"
}
```

### HTTP Request
`GET /api/users/{id}`


<!-- END_b1f8ce5c516b48f856fb396b04dfd494 -->

<!-- START_511eeadfce956cbeea74ce3763392dcd -->
## Récupère tous les utilisateurs en base.

Récupère toutes les informations des utilisateurs présent dans la base de donnée.

> Example request:

```bash
curl -X GET \
    -G "/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "Id": "1",
    "Name": "Test1",
    "Email": "test@test.fr",
    "Password": "ergerh98egerkjgnerjgne74grjegeirg3"
}
```
> Example response (200):

```json
{
    "Id": "2",
    "Name": "Test2",
    "Email": "test2@test.fr",
    "Password": "ergereiufhzeufh2zdozf7ienf5h98egerkjgnerjgne74grjegeirg3"
}
```

### HTTP Request
`GET /api/users`


<!-- END_511eeadfce956cbeea74ce3763392dcd -->


