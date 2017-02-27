<?php
require __DIR__ . '\\..\\vendor\\autoload.php';

use Core\Entities\Make;
use Core\Mappers\MakeMapper;

$makeMapper = new MakeMapper ();

$makes = $makeMapper->getAllMakes ();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>	
	<title>Admin - Makes</title>
	<link rel="stylsheet" href="/css/admin.css" />
</head>

<body>
	<h1>CarDB Query Application</h1>
	<fieldset>
		<div>
			<a href="make-edit.php">New</a>
		</div>		
		<legend>Makes</legend>
        <table>
			<thead>
				<th>Name</th>
				<th></th>
			</thead>
			<table>
            <?php
                foreach ($makes as $m) {
					echo "<tr>";
                    echo "<td>" . $m->getName() . "</td>";
					echo '<td><a href="make-edit.php?id=' . $m->getId() . '">Edit</a>';
                }
            ?>
			</table>
        </table>
	</fieldset>	
</body>