

----SETUP------


Create a database and name it 'teorema'

import the file teorema.sql into you database.

-------
Database setup is in teorema\option\settings.php

Verifie if the data inside in order to get connected to your databse

-------

copy the folder 'teorema' into the folder 'htdocs' .
if you are working locally the link is mormally  C:\xampp\htdocs
-------
Lounch in the XAMPP control panel Apache and MySQL 
-------
open in your browser localhost/teorema/ if you are working localy otherwise adapt.



----How to use----

In order to get access to the setting page you need to login as admin. 

email: john_doe@example.com
password: 123

If you login as 

email: danieln@hotmail.de
password: www

You want have acces to setting but to all the rest. 

----What it does ----

You can cross two "pure" plants (P) which produces 4 plants (F1) , those are stored in the database 'novas_plantas'

You can create/delete/update pure plants 

You can create/delete/update new caracteristic

	If you create a new cara. the program automaticly adds new colums to the databases novas_plantas and plants.
	If you dont update the plants you will see ## or'undefiend' in the tables.
	This indicates you have to update in the plant in the page 'crear nova planta pura'.
	To update tip in the name of the plant you want to update and indicate the new caracteristic.

You can create/delete/update users
	
	You HAVE to be logged in as a user with admin rights, otherwise you want see the page.
