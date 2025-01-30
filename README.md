# 🛡 XSS Vulnerable App: Guide d'Exploitation

Ce projet est une application web volontairement vulnérable aux attaques XSS (Cross-Site Scripting) permettant aux étudiants d’expérimenter et de comprendre ces vulnérabilités.

> **⚠️ Avertissement** : **Ce projet est strictement éducatif.** N’utilisez pas ces techniques en dehors d’un environnement contrôlé.

---

## 📌 Prérequis

### 🔹 **Outils nécessaires**
- **Docker** (Vérifiez l’installation avec `docker --version`).
- **Navigateur Web** (Chrome, Firefox, etc.).
- **Connaissance en HTML/JS** (base recommandée).

---

## 🚀 Installation et Lancement

1️⃣ **Cloner le projet**  
```sh
git clone https://github.com/votre-repo/xss-vulnerable-app.git
cd xss-vulnerable-app
```

2️⃣ **Construire l’image Docker**  
```sh
docker build -t xss-vulnerable-app .
```

3️⃣ **Exécuter le conteneur**  
```sh
docker run -d -p 8080:80 xss-vulnerable-app
```

4️⃣ **Accéder à l'application**  
```sh
http://localhost:8080
```

---

## 🔥 Scénarios d’attaque XSS

### 1️⃣ **Injection XSS via Pop-up**
#### 📝 Description :
Ce scénario illustre comment injecter un script malveillant qui déclenche une **alerte** sur le navigateur.

#### 🎯 Objectif :
- Injecter un script dans le champ pour **afficher un pop-up**.

#### ✅ Solution :
Saisissez cette **payload XSS** et validez le formulaire :
```html
<script>alert('XSS réussie!');</script>
```
💡 **Impact** : Un attaquant peut injecter du JavaScript et exécuter du code arbitraire.

---

### 2️⃣ **XSS via DOM Manipulation**
#### 📝 Description :
Ce scénario montre comment le JavaScript d’une page peut être manipulé dynamiquement sans interaction serveur.

#### 🎯 Objectif :
- Exploiter une injection pour **modifier le DOM**.

#### ✅ Solution :
Dans la console du navigateur (F12 > Console), exécutez :
```javascript
document.body.innerHTML = "<h1 style='color:red;'>Site piraté !</h1>";
```
💡 **Impact** : L’utilisateur ne voit plus la page d’origine, un attaquant peut afficher un faux site.

---

### 3️⃣ **XSS via Insertion de Lien Malveillant**
#### 📝 Description :
L’objectif est de **piéger** un utilisateur en lui faisant cliquer sur un **lien injecté** dans un commentaire.

#### 🎯 Objectif :
- Insérer un lien malveillant dans un champ commentaire.

#### ✅ Solution :
Saisissez cette **payload XSS** et validez le formulaire :
```html
<a href="https://google.com" target="_blank">Cliquez ici</a>
```
💡 **Impact** : Un attaquant peut rediriger un utilisateur vers un **site malveillant**.

---

## 🛡 Comment Se Protéger ?
✅ **Éviter d’afficher directement les entrées utilisateur** (utiliser `htmlspecialchars()`).  
✅ **Implémenter un Content Security Policy (CSP)**.  
✅ **Échapper systématiquement** les entrées dans le DOM (`innerText` au lieu de `innerHTML`).  
✅ **Filtrer les entrées utilisateurs** côté serveur.

---

## 🐝 Disclaimer

**Ce projet est destiné à l’éducation uniquement.** Toute utilisation non autorisée des concepts appris est **strictement interdite**.

Auteur : DANNENMULLER ZACHARIE