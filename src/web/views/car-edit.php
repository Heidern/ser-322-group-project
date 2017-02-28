<div class="btn-toolbar form-group">
    <div class="btn-group">
        <a class="btn-sm btn-info" href="cars.php">Back to list</a>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" action="car-edit.php" method="post">
        <?php if (isset ($viewModel->vin)): ?>
            <input type="hidden" name="original_vin" value="<?php echo $viewModel->vin ?>" />
        <?php endif; ?>
            <?php FormTextField ("VIN", "vin", $viewModel->vin); ?>
            <?php FormTextField ("Trans. Serial Number", "trans_serial_number", $viewModel->transSerialNumber); ?>
            <?php FormTextField ("Model", "model_id", $viewModel->modelId); ?>
            <?php FormTextField ("Year", "year", $viewModel->year); ?>
            <?php FormTextField ("Engine Serial Number", "engine_serial_number", $viewModel->engineSerialNumber); ?>
            <?php FormTextField ("Engine", "engine_id", $viewModel->engineId); ?>
            <?php FormTextField ("Drive Train", "drive_train_id", $viewModel->driveTrainId); ?>
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