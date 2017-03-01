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
        <legend><font size = "4"><b>Performance Specifications search</b></font></legend>
        <form method = "post" action = "search_spec_by_vin.php">
            <span class = "prompt">VIN:</span>
            <input type = "text" name = "vin" />
            <input type = "submit" value = "Search" />
        </form>
        <br/>
        
        <?php
            $isPost = ($_SERVER['REQUEST_METHOD'] === 'POST');
            if ($isPost) {
                extract( $_POST );
                if (!preg_match("@^[a-zA-Z0-9]{17}$@", $vin)) {
                    print("<span class = 'error'>Please enter a valid 17 digit VIN number</span>");
                } else {
                    $query ="SELECT name as make_name, model_name, year, drive_train_id, engine_id, accel_to_sixty_mph, mpg, breaking_distance FROM make NATURAL JOIN (SELECT make_id as id, name as model_name, year, engine_id, drive_train_id, accel_to_sixty_mph, mpg, breaking_distance FROM model NATURAL JOIN (SELECT * FROM performance_spec NATURAL JOIN (SELECT * FROM car WHERE vin = '" . $vin . "') AS car_spec) AS car_spec_model WHERE model_id = id) AS car_spec_model_make";
                    if ( !( $database = mysqli_connect( "localhost", "root", "", "car_dealer" ) ) )
                        die( "Could not connect to database");
                    if ( !( $result = mysqli_query( $database, $query  ) ) ) {
                        print( "Could not execute query!" );
                        die( mysqli_error($database));
                    }                
                    mysqli_close( $database );
                    
                    // Check if no results were found:
                    if (mysqli_num_rows($result) === 0) {
                        print("<span class = 'error'>Performance specifications for VIN, " . $vin . ", were not found in the database.</span>");
                    } else {
                        print('Specs for VIN: ' . $vin . '
						<table id="datatable" border="1"><tr>
							<th>Make</th>
							<th>Model</th>
							<th>Year</th>
							<th>Drive-train ID</th>
							<th>Engine ID</th>
							<th>Accel to 60mph</th>
							<th>MPG</th>
							<th>Breaking Distance</th>
						</tr>');
                        for ( $counter = 0; $row = mysqli_fetch_row( $result ); $counter++ ) {
                            print( "<tr>" );
                                foreach ( $row as $key => $value )
                                    print( "<td>$value</td>" );
                            print( "</tr>" );
                        }
                        print('</table>');
                    }
                }
                
                // Create datatable with results:
                
            }
        ?>
    </fieldset>
    <p><font size = "2" ><i>Searches for perfomance specifications using a specific VIN. (Try 12345678901234567)</i></p>
</body>
</html>
