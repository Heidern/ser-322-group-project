# ser-322-group-project

## CarDB

These files use the given structure (CarDB is the homepage, additional pages are under “resources”) Download them to a local machine to test.

To set up a local PHP-enabled host with testdata:

1. Install XAMPP (minimum php version 7.0.x)
2. Launch XAMPP
3. Use checkboxes to activate Apache and MySQL modules
4. Click "Start" on Apache and MySQL
3. Open "Shell" and type:
```ssh
cd path\to\your\app (C:\SER322)
mysql < db\car-dealer-db.sql -u root
cd src\web
php -S localhost:8000
```
4. Bring up your browser and go to:
```
http://localhost:8000/cardb.html
```
