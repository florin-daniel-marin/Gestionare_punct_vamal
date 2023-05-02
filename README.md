# Gestionare_punct_vamal
##
## Despre website
  Aplicație Web ce simulează gestionarea unui punct vamal (aici: Isaccea) cu două tipuri de utilizatori: Inspector si Admin. Proiect realizat la materia Baze de date, pentru testarea cunoștiințelor de limbaj SQL. Structura ierarhică a Directiei Generale a Vămilor este simplificată pentru acest proiect și corespunde foarte puțin situației reale de conducere și control vamal. 
  
  API cu functionalitati CRUD: (Create, Update, Delete) cu home page si funcționalități diferite pentru user normal și pentru administrator. Tema tipică pentru poziția de Full Stack Developer.    
  
  Programat în PHP și Microsoft SQL Server 2014, iar partea de Front End în AJAX, Jquery, CSS.  
  
## Functionalități
### Descriere
  La un punct vamal din țară, personalul vamal trebuie să introducă și să contabilizeze date despre persoanele care au intrat/ ieșit din țară. Aplicația este folosită de inspectori pentru a introduce în baza de date a vămii datele celor controlați. Datoriă securității naționale, în ceea ce privește controlul traficului la intrarea în țară, datele introduse la verificarea tranzistanților, nu pot fi modificate decât în condiții absolut speciale. Ofițerii vamali cu grad superior, au acces la contul de admin, cu funcționalitate mult mai largă în baza de date.  
  
  Programul ofițeriilor este împărțit pe ture de câte 8 ore, iar la logare pe site se introduc datele inspectorului vamal: gradul, numele, parola. Pentru începerea programului de muncă, este nevoie să se introducă gradul și numele celor doi controlori vamali de tură (dacă există).
  
  După completarea datelor de înregistrare, inspectorul vamal poate -adăuga date despre persoane verificate și -vizualiza date introduse de el în tura respectivă și -vizualiza date despre sesiunea curentă și -modifica parola contului său.   
  
  De altfel, administratorul trebuie să vadă în timp real toate datele despre sesiuniile curente, despre ture și logări, despre ofițerii vamali, cât și despre toate datele de control a traficului de intrare/ ieșire din țară, tranzistanți, etc. Administratorul poate sa vadă și să modifice parola ofițerilor și poate să deconecteze orice desktop conectat.
  
  Datele preluate in baza de date, structura bazei de date, utilizatorii și structura proiectului sunt rezultatul reimaginării aplicației folosită de o vamă. Nu reflectă nimic din sistemul folosit de Autoritatea Vamală Română și nici din structura organizatorică a acesteia. Proiectul simplifică mult personalul vamal, la cazuri simple de înțeles și intuitive. Funcțiile aplicației sunt simplificate, astfel încât să fie vizibile doar funcționalitățiile ce pun în valoare tema proiectului. Aplicația poate fi îmbunătățită cu metode de securitate și protejare a datelor (mai multe la finalul prezentării) și adăugarea de tabele, pagini web și câmpuri noi.

### Structură
   În continuare descriu structura aplicației pentru diferitele tipuri de utilizatori, care asigură necesitățile și setează limite pentru personalul punctului vamal, pentru conducerea punctului vamal, inspectori, controlori, administratori de rețea.  
   
   **Conducerea** punctului vamal - **șeful biroului** Direcției Regionale Vamale, **șef adjunct**, **șef de tură**, **inspector vamal superior** și **administratorul de rețea** - au acces la toate funcțiile peste baza de date și informații despre rețeaua de calculatoare și despre angajații punctului vamal. 
   
   **Inspectorii** - **Inspector Vamal Superior**, **Inspector Vamal Principal**, **Inspector Vamal Asistent** și **Inspector Vamal Debutant** - verifică persoanele și le introduc în baza de date.  
   
  **Controlorii** - **Controlor Vamal Superior**, **Controlor Vamal Asistent**, **Controlor Vamal Debutant** - nu au cont pe aplicație, datele despre ei sunt în tura contului inspectorului.  
  
  Deci, aplicația are nevoie de două tipuri de utilizatori: user (inspector) și admin (conducerea și administratorul de rețea).  
### 1. Utilizator „user” - Verificare control vamă  
#### Ofiteri cu cont „user”:  
      - Inspector Vamal Superior  
      - Inspector Vamal Principal  
      - Inspector Vamal Asistent  
      - Inspector Vamal Debutant  
##### Controlori de tură (max. 2) pentru Inspectorul Vamal:
      - Controlor Vamal Superior
      - Controlor Vamal Asistent
      - Controlor Vamal Debutant
#### Funcții: (user-functions)
- Log in și log out (f0)
- Adaugă, modifică sau șterge controlori la tura curentă (f1)
- Adaugă și vizualizează date despre persoane verificate în baza de date (f2)
- Adaugă și vede raporturile în baza de date (u3)
- Poate să vadă informațiile despre sesiune salvate (f4)
- Log in și log out și modificare parolă (f5)
- Modifice parola contului său (f5)
  
###  2. Utilizator „admin” - Administrator rețea punct vamal și conducerea punctului vamal
#### Ofiteri cu cont „admin”:
      - Șef Birou Vamal
      - Șef Adjunct Birou Vamal
      - Șef de tură
#### Funcții: (admin-functions)  
- **Generale:** (f0)
  - Log in și log out
  
- **Extrage date din baza de date:** (f1)
  - Vizualizează toate datele din baza de date
  - Căutare avansată în baza de date
    
- **Prelucrare din baza de date:**  (f2)
  - Creează liste și rapoarte în HTML  
  - Arhivă toate persoanele din tranzitul vamal  
  - Listă persoane care au intrat în țară  
  - Listă persoane care au ieșit din țară  
  - Listă persoane care au primit permisiune  
  - Listă persoane care nu au primit permisiune  
  - Listă persoane din tranzitul vamal care sunt urmăriți de INTERPOL  
  - Listă toți ofițerii vamali angajați  
  - Listă sesiuni active  
        
- **Despre traficul vamal:** (f3)
  - Modifică sau șterge date despre persoanele din baza de date  
  - Modifică sau șterge rapoarte despre verificări  
    
- **Despre angajați:** (f4)
  - Modifică sau șterge ofițerii vamali angajați 
  - Modifică parola utilizatorilor  
    
- **Despre sesiuni:** (f5) 
  - Vede sesiuni active
  - Deconectează utilizator conectat 
  

## Implementare
### Baza de date
Tabele:
##### - Persoane
##### - Verificări
##### - Intrați în țară
##### - Ieșiți din țară
##### - Ofițeri
##### - Ture
##### - Logări

### Relații între tabele

### Back End (Server side)
#### Informațiile de sesiune salvate:
      - User_type: user sau admin
      - Nrdesktop: numărul calculatorului din punctul vamal
      - Informațiile despre inspectorul logat: Grad, nume, prenume, parola, ID Ofiter
      - Informații despre tură și despre logare (index, momentul începerii)
  
#### Legături cu baza de date
Folderul **Session** - operații pe tabelele: Log, Tură și Ofițeri  
Folderele **User/Admin** pentru cele două tipuri de conturi:  
1. **User:**
- Routes/Login.php <- creează tura și logare (f0)
- Routes/Controlors.php <- adaugă controlorii la logare (f1)
- Routes/Display.php <- toate persoanele verificate ordonate după dată (f2)
- Routes/Transit.php <- adaugă info în baza de date a vamei (verificările) (f3)
- Routes/currentSession.php <- afișează info salvate în sesiunea curentă (tură, logare, cont și controlori) (f4)
- Routes/Password.php <- parolă nouă pentru cont (f5)
2. **Admin**
- Routes/Login.php (f0)  
- Routes/sql_cereri.php (f1 și f2) <- Cereri sub formă de tabele extrase din baza de date
- Routes/Transit.php (f3) <- Control asupra tuturor datelor despre tranzitul vamal (edit, delete)
- Routes/Angajati.php (f4) <- Control angajați și conturile lor
- Routes/Sessions.php (f5) <- Rețea: vede sesiuniile active și control asupra rețelei
### Front End
Ajax, jQuery
##### Detalii tehnice


##### Structură website
###### Conturi
  Cont „user” și „admin”. 

###### Sesiune
  Detaliile despre sesiune, care rămân aceleași până la Log out sunt:
  - Desktop nr.
  - Index tură
  - Logare curentă: momentul logării, indexul.
  - Statusul logării: 1 (activ)
  - Controlori vamali de tură
###### Pagini web:
1.User: Main page, Workbench, Tranzit vamal, Sesiune, Logout  
2.Admin: Main page, Verificari, Angajati, Online, Logout
  
  
  Este foarte important ca inspectorii să nu aibe acces la modificarea sau ștergerea datelor introduse în baza de date: Inspectorii pot: -adăuga date și -vizualiza **doar** datele introduse de ei în tura respectivă. Administratorul punctului vamal, cu grad superior, are acces la versiunea îmbunătățită a site-ului. El are permisiunea întreagă: de a adăuga, modifica, șterge și vizualiza date din baza de date.  lucrează mai mulți inspectori pe ture. O tură este formată dintr-un Inspector vamal 
### 

## How to use
**Dependencies**  
1. Install **XAMPP with PHP version 8.1.x** from https://www.apachefriends.org/download.html 

Atributile postului - Autoritatii Vamale Romane 
HOTĂRÂRE nr. 152 din 1 martie 2000 pentru modificarea Hotărârii Guvernului nr. 147/1996 privind organizarea şi funcţionarea Direcţiei Generale a Vămilor/ Anexa 1
https://www.customs.ro/assets/pdf/Nona//LISTA_FUNCTIILOR_LA_NIVELUL_AVR_LA_30.09_.2022_.pdf
