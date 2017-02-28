<div class="btn-toolbar form-group">
    <div class="btn-group">
        <a class="btn-sm btn-info" href="engines.php">Back to list</a>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" action="engine-edit.php" method="post">
        <?php if (isset ($viewModel->engineCode)): ?>
            <input type="hidden" name="original_engine_code" value="<?php echo $viewModel->engineCode ?>" />
        <?php endif; ?>
            <?php FormTextField ("Engine Code", "engine_code", $viewModel->engineCode); ?>
            <?php FormTextField ("Horse Power", "horse_power", $viewModel->horsePower); ?>
            <?php FormTextField ("Torque", "torque", $viewModel->torque); ?>
            <?php FormTextField ("Engine Plant", "engine_plant", $viewModel->enginePlant); ?>
            <?php FormTextField ("Cylinders", "num_cylinders", $viewModel->numCylinders); ?>
            <?php FormTextField ("Block Type", "block_type", $viewModel->blockType); ?>
            <?php FormTextField ("Block Material", "block_material", $viewModel->blockMaterial); ?>
            <?php FormTextField ("Displacement", "displacement", $viewModel->displacement); ?>
            <?php FormTextField ("Fuel Type", "fuel_type", $viewModel->fuelType); ?>
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
