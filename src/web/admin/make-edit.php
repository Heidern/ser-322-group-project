<?php
require __DIR__ . '\\..\\vendor\\autoload.php';

use Core\Entities\Make;
use Core\Mappers\MakeMapper;

use ViewModels\MakeEditViewModel;

function getMake ($makeId) {
	if (isset ($makeId)) {			

		$makeMapper = new MakeMapper ();

		$make = $makeMapper->getMakeById ($makeId);

		return MakeEditViewModel::createFromDto ($make);
	}
	else return MakeEditViewModel::createFromDefaults ();
}

function saveMake (MakeEditViewModel $vm) {

	$make = null;

	if (isset ($vm->id)) {
		$make = new Make ();
		$make->setId ($vm->id);
		$make->setName ($vm->name);

		$makeMapper = new MakeMapper ();
		$makeMapper->updateMake ($make);		
	}
	else {
		$make = new Make ();
		$make->setName ($vm->name);

		$makeMapper = new MakeMapper ();
		$makeMapper->addMake ($make);		
	}	

	return MakeEditViewModel::createFromDto ($make);
}

$viewModel = null;
$messages = null;

if (isset ($_POST["submit"])) {
	$makeId = filter_input (INPUT_POST, "make-id", FILTER_VALIDATE_INT);
	if ($makeId === false) throw new Error ("Invalid make.");

	$vm = new MakeEditViewModel ();

	$vm->id = $makeId;
	$vm->name = filter_input (INPUT_POST, "name");

	$viewModel = saveMake ($vm);

	$messages = array();
	$messages [] = "Make saved successfully.";
}
else if (isset ($_GET)) {
	$makeId = filter_input (INPUT_GET, "id", FILTER_VALIDATE_INT);

	if ($makeId === false) throw new Error ("Invalid make.");
	$viewModel = getMake ($makeId);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>	
	<title>Admin - Edit Make</title>
	<link rel="stylsheet" href="/css/admin.css" />
</head>
<body>
	<h1>CarDB Query Application</h1>
	<div>
		<a href="makes.php">Back to list</a>
	</div>
	<form action="make-edit.php" method="post">
<?php if (isset ($viewModel->id)): ?>
		<input type="hidden" name="make-id" value="<?php echo $viewModel->id ?>" />
<?php endif; ?>
		<fieldset>
			<legend>Make</legend>
			<label for="txt-name">Name:</label><input name="name" id="txt-make" type="text" value="<?php echo $viewModel->name; ?>" />
		</fieldset>	
		<div>
			<input type="submit" name="submit" id="btn-save" value="Save" />
		</div>
	</form>
<?php if (isset ($messages)): ?>
	<ul id="messages">		
		<?php
		foreach ($messages as $m) { 
			echo "<li>" . $m . "</li>";
		}
		?>
	</ul>
<?php endif; ?>
</body>