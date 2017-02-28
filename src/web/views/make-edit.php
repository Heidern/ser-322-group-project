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
<?php if (isset ($viewMessages)): ?>
<ul id="messages">		
    <?php
    foreach ($viewMessages as $m) { 
        echo "<li>$m</li>";
    }
    ?>
</ul>
<?php endif; ?>