<h3>Drive Trains</h3>
<div class="btn-toolbar form-group">
    <div class="btn-group">
        <a class="btn-sm btn-success" href="drive-train-edit.php">New</a>
    </div>
</div>
<div class="panel panel-default">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Code</th>
                <th>Transmission Type</th>
                <th>Torque Rating</th>
                <th>Gears</th>
                <th>Manufacturers</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($viewModel as $m) {
                echo "<tr>";
                echo "<td>$m->driveTrainCode</td>";
                echo "<td>$m->transType</td>";
                echo "<td>$m->torqueRating</td>";
                echo "<td>$m->numGears</td>";
                echo "<td>$m->manufacturers</td>";
                echo "<td class=\"text-right\"><a class=\"btn-sm btn-info\" href=\"drive-train-edit.php?code=$m->driveTrainCode\">Edit</a></td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
</div>