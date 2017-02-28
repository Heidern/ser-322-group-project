<div>
    <a href="models.php">Back to list</a>
</div>
<form action="model-edit.php" method="post">
<?php if (isset ($viewModel->id)): ?>
    <input type="hidden" name="model-id" value="<?php echo $viewModel->id ?>" />
<?php endif; ?>
    <fieldset>
        <legend>Model</legend>
        <div>
            <label for="ddl-makes">Makes:</label>
            <select name="make-id">
            <?php
            foreach ($viewModel->makes as $m) {
                if ($m->id === $viewModel->makeId)
                    echo "<option value=\"$m->id\" selected=\"selected\">$m->name</option>";
                else echo "<option value=\"$m->id\">$m->name</option>";
            }
            ?>
            </select>
        <div>
        <div>
            <label for="txt-name">Name:</label><input name="name" id="txt-make" type="text" value="<?php echo $viewModel->name; ?>" />
        </div>
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