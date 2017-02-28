<div class="btn-toolbar form-group">
    <div class="btn-group">
        <a class="btn-sm btn-info" href="makes.php">Back to list</a>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" action="make-edit.php" method="post">
        <?php if (isset ($viewModel->id)): ?>
            <input type="hidden" name="make-id" value="<?php echo $viewModel->id ?>" />
        <?php endif; ?>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="txt-name">Name:</label>
                <div class="col-sm-10">
                    <input class="form-control" name="name" id="txt-make" type="text" value="<?php echo $viewModel->name; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-offset-2 col-sm-10">
                    <input class="btn btn-primary" type="submit" name="submit" id="btn-save" value="Save" />
                </div>
            </div>
        </form>
    </div>    
</div>
<?php if (isset ($viewMessages)): ?>
<div class="alert alert-info" role="alert">
    <?php
    foreach ($viewMessages as $m) { 
        echo "<p>$m</p>";
    }
    ?>
</div>
<?php endif; ?>
