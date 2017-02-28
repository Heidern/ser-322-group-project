<h3>Engines</h3>
<div class="btn-toolbar form-group">
    <div class="btn-group">
        <a class="btn-sm btn-success" href="engine-edit.php">New</a>
    </div>
</div>
<div class="panel panel-default">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Code</th>
                <th>Horse Power</th>
                <th>Torque</th>
                <th>Plant</th>
                <th>Cylinders</th>
                <th>Block Type</th>
                <th>Block Material</th>
                <th>Displacement</th>
                <th>Fuel Type</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($viewModel as $m) {
                echo "<tr>";
                echo "<td>$m->engineCode</td>";
                echo "<td>$m->horsePower</td>";
                echo "<td>$m->torque</td>";
                echo "<td>$m->enginePlant</td>";
                echo "<td>$m->numCylinders</td>";
                echo "<td>$m->blockType</td>";
                echo "<td>$m->blockMaterial</td>";
                echo "<td>$m->displacement</td>";
                echo "<td>$m->fuelType</td>";
                echo "<td class=\"text-right\"><a class=\"btn-sm btn-info\" href=\"engine-edit.php?code=$m->engineCode\">Edit</a></td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
</div>