<?xml version = "1.0" encoding = "utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<!-- carsearchform.php -->
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
    <title>Form Validation</title>
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
    <a href="../CarDB.html">home</a>
    <br/><br/>
    
    <fieldset>    
        <legend><font size = "4"><b>Mile per gallon search</b></font></legend>
        
        <span class = 'error'>THIS PAGE DOES NOT YET FUNCTION CORRECTLY</span>
        <!-- "Request" Query Code goes in this field: --> 
        <form method = "post" action = "search_mpg_range.php">
            <span class = "prompt">MPG range:</span>
            <select id="mpg_range">
				<option value="low">Under 20mpg</option>
				<option value="mid">20-30mpg</option>
				<option value="high">Over 30mpg</option>
			</select>
            <input type = "submit" value = "Search" />
        </form>
        <br/>
        
        <!-- "Return" data from DB goes in this field: -->
        
        <?php
            $isPost = ($_SERVER['REQUEST_METHOD'] === 'POST');
            if ($isPost) {
                extract( $_POST );
                $query = "SELECT * FROM cars WHERE vin = '" . $vin . "'";
// USERNAME/PASSWORD needs to be made standard
                if ( !( $database = mysql_connect( "localhost", "root", "" ) ) )
                    die( "Could not connect to database");
                if ( !mysql_select_db( "car_dealer", $database ) )
                    die( "Could not open car_dealers database");
                if ( !( $result = mysql_query( $query, $database ) ) ) {
                    print( "Could not execute query!" );
                    die( mysql_error());
                }                
                mysql_close( $database );
                
                // Check if no results were found:
                if (mysql_num_rows($result) === 0) {
                    print("<span class = 'error'>Sorry, no cars of that range are currently in the database.");
                } else {
                    print('<table id="datatable" border="1">');
                    for ( $counter = 0; $row = mysql_fetch_row( $result ); $counter++ ) {
                        print( "<tr>" );
                            foreach ( $row as $key => $value )
                                print( "<td>$value</td>" );
                        print( "</tr>" );
                    }
                    print('</table>');
                }
            }
                
                // Create datatable with results:
                
            
        ?>
    </fieldset>
    <p><font size = "2" ><i>Searches for VIN in 'cars' and returns any entries.</i></p>
</body>
</html>
