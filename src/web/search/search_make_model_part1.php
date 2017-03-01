<?xml version = "1.0" encoding = "utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 


<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
    <title>CarDB</title>
    <style type = "text/css">
        body { font-family: arial, sans-serif }
        div { font-size: 10pt;
        text-align: center }
        table { border: 0 }
        td { padding-top: 2px;
        padding-bottom: 2px;
        padding-left: 10px;
        padding-right: 10px }
        .error { color: red }
        .distinct { color: blue }
    </style>
</head>
<body>    
    <h1>CarDB Query Application</h1>
    <a href="home.html">back</a>
    <br/><br/>
    
    <fieldset>    
        <legend><font size = "4"><b>Make and Model search</b></font></legend>
        
        <?php
            $query = "SELECT * FROM make";
            if ( !( $database = mysqli_connect( "localhost", "root", "", "car_dealer") ) )
				die( "Could not connect to database");
			if ( !( $result = mysqli_query( $database, $query  ) ) ) {
				print( "Could not execute query!" );
				die( mysqli_error($database));
			}                
			mysqli_close( $database );
            if (mysqli_num_rows($result) === 0) {
                print("<span class = 'error'>Sorry, the database returned no manufacturers.</span>");
            } else {
                print('<form method = "post" action = "search_make_model_part2.php">Select a make from the database: <select name="make_choice">');
                for ( $counter = 0; $row = mysqli_fetch_row( $result ); $counter++ ) {
                    print( "<option value = " . $row[0] . ">" . $row[1] . "</option>");
                }
                print('</select><input type = "submit" value = "Continue" /></form>');
            }
        ?>
    </fieldset>
    <p><font size = "2" ><i>Searches for any car of a particular make, then model.</i></p>
</body>
</html>
