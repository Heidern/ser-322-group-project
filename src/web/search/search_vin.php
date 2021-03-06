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
        <legend><font size = "4"><b>VIN search</b></font></legend>
        <form method = "post" action = "search_vin.php">
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
                    $query = "SELECT VIN, name as make_name, model_name, year, drive_train_id,  trans_serial_number, engine_id, engine_serial_number FROM make NATURAL JOIN (SELECT VIN, make_id as id, name AS model_name, year, drive_train_id,  trans_serial_number, engine_id, engine_serial_number FROM model NATURAL JOIN (SELECT VIN, model_id as id, year, drive_train_id,  trans_serial_number, engine_id, engine_serial_number FROM car WHERE vin = '" . $vin . "') AS model_car) AS model_make_car";
                    if ( !( $database = mysqli_connect( "localhost", "root", "", "car_dealer" ) ) )
                        die( "Could not connect to database");
                    if ( !( $result = mysqli_query( $database, $query  ) ) ) {
                        print( "Could not execute query!" );
                        die( mysqli_error($database));
                    }                
                    mysqli_close( $database );
                    
                    // Check if no results were found:
                    if (mysqli_num_rows($result) === 0) {
                        print("<span class = 'error'>The VIN, " . $vin . ", was not found in the database.</span>");
                    } else {
                        print('<table id="datatable" border="1"><tr>
							<th>VIN</th>
							<th>Make</th>
							<th>Model</th>
							<th>Year</th>
							<th>Drive-train ID</th>
							<th>Transm. Serial#</th>
							<th>Engine ID</th>
							<th>Engine Serial#</th>
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
    <p><font size = "2" ><i>Searches for a car with a specific VIN in and determines make and model. (Try 12345678901234567)</i></p>
</body>
</html>
