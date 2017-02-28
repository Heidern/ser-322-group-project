<div class="btn-toolbar form-group">
    <div class="btn-group">
        <a class="btn-sm btn-info" href="models.php">Back to list</a>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" action="model-edit.php" method="post">
        <?php if (isset ($viewModel->id)): ?>
            <input type="hidden" name="model-id" value="<?php echo $viewModel->id ?>" />
        <?php endif; ?>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="ddl-makes">Makes:</label>
                <div class="col-sm-10">
                    <select class="form-control" name="make-id">
                    <?php
                    foreach ($viewModel->makes as $m) {
                        if ($m->id === $viewModel->makeId)
                            echo "<option value=\"$m->id\" selected=\"selected\">$m->name</option>";
                        else echo "<option value=\"$m->id\">$m->name</option>";
                    }
                    ?>
                    </select>
                </div>
            </div>
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
