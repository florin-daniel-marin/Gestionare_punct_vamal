# Gestionare_punct_vamal
##
## Despre website
  Aplicație Web ce simulează gestionarea unui punct vamal (aici Isaccea) cu două tipuri de utilizatori: Inspector si Admin. Proiect realizat la materia Baze de date, pentru testarea cunoștiințelor de limbaj SQL.  
  API cu functionalitati CRUD: (Create, Update, Delete) cu home page si funcționalități diferite pentru user normal și pentru administrator. Tema tipică pentru poziția de Full Stack Developer.  
  Programat în PHP și Microsoft SQL Server 2014, iar partea de Front End în AJAX, Jquery, CSS.  
  
## Functionalități
### Descriere temă
  La un punct vamal din țară, personalul vamal trebuie să introducă și să contabilizeze date despre persoanele care au intrat/ ieșit din țară. Aplicația este folosită de inspectori pentru a introduce în baza de date a vămii datele celor controlați. Datoriă securității naționale, în ceea ce privește controlul traficului la intrarea în țară, datele introduse la verificarea tranzistanților, pot fi modificate în condiții absolut speciale. Ofițerii vamali cu grad superior, au acces la contul de admin, cu funcționalitate mult mai largă în baza de date.  
  Programul ofițeriilor este împărțit pe ture de câte 8 ore, iar la logare pe site se introduc datele Inspectorului vamal: gradul, numele, parola. Pentru începerea programului de muncă, adică introducerea persoanelor verificate în baza de date, este nevoie să se introducă gradul, numele și prenumele a celor doi Controlori vamali de tură (dacă există: doi, unu sau nici unul).  
  După completarea datelor de înregistrare, inspectorul vamal poate -adăuga date despre persoane verificate și -vizualiza date introduse de el în tura respectivă și -vizualiza date despre sesiunea curentă și -modifica parola contului său.  
  De altfel, administratorul trebuie să vadă în timp real toate datele despre sesiuniile curente, despre ture și logări, despre ofițerii vamali, cât și despre toate datele de control a traficului de intrare/ ieșire din țară, tranzistanți, etc. Administratorul poate sa vadă și să modifice parola ofițerilor și poate să deconecteze orice desktop conectat.  

### Structură funcții
#### 1. User „user” - Verificare control vamă
##### Ofiteri cu cont „user”:
      - Inspector Vamal Superior
      - Inspector Vamal Principal
      - Inspector Vamal Asistent
      - Inspector Vamal Debutant
  
  2. User „admin” - Administrator rețea punct vamal (cont cu acces întreg)
##### Ofiteri cu cont „admin”:
      - Șef Birou Vamal
      - Șef Adjunct Birou Vamal
      - Șef de tură
      - Administrator

  
  
  Este foarte important ca inspectorii să nu aibe acces la modificarea sau ștergerea datelor introduse în baza de date: Inspectorii pot: -adăuga date și -vizualiza **doar** datele introduse de ei în tura respectivă. Administratorul punctului vamal, cu grad superior, are acces la versiunea îmbunătățită a site-ului. El are permisiunea întreagă: de a adăuga, modifica, șterge și vizualiza date din baza de date.  lucrează mai mulți inspectori pe ture. O tură este formată dintr-un Inspector vamal 
### 

## How to use
**Dependencies**  
1. Install **XAMPP with PHP version 8.1.x** from https://www.apachefriends.org/download.html 
