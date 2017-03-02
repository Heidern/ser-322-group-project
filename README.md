# ser-322-group-project
## TEAM 9 Group members:
Marcinina Alvaran,
Enos Franceschini,
Gerardo Gaz,
David Morris,
Sadai Sarmiento Carneiro,

## Additional files
"car_dealer.sql" holds the script to create the car_dealer database without data. (src/db/car-dealer-db.sql includes test data)
"sql_queries.txt" lists non-trivial database query scripts used on the database.

## Setting up the database
To set up a local PHP-enabled host with testdata:

1. Install XAMPP (MINIMUM php version 7.0.x)
2. Launch XAMPP (with administrator privileges)
3. Use checkboxes to activate Apache and MySQL services
4. Click "Start" on Apache and MySQL
3. Open "Shell" and type:
```ssh
cd path\to\your\app (C:\SER322)
mysql < src\db\car-dealer-db.sql -u root
cd src\web
php -S localhost:8000
```
4. Bring up your browser and go to:
```
http://localhost:8000/cardb.html
```
