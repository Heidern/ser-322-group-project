<div class="btn-toolbar form-group">
    <div class="btn-group">
        <a class="btn-sm btn-info" href="drive-trains.php">Back to list</a>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" action="drive-train-edit.php" method="post">
        <?php if (isset ($viewModel->driveTrainCode)): ?>
            <input type="hidden" name="original_drive_train_code" value="<?php echo $viewModel->driveTrainCode ?>" />
        <?php endif; ?>
            <?php FormTextField ("Code", "drive_train_code", $viewModel->driveTrainCode); ?>
            <?php FormTextField ("Transmission Type", "trans_type", $viewModel->transType); ?>
            <?php FormTextField ("Torque Rating", "torque_rating", $viewModel->torqueRating); ?>
            <?php FormTextField ("Gears", "num_gears", $viewModel->numGears); ?>
            <?php FormTextField ("Manufacturers", "manufacturers", $viewModel->manufacturers); ?>
            <div class="form-group">
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