<h3>Cars</h3>
<div class="btn-toolbar form-group">
    <div class="btn-group">
        <a class="btn-sm btn-success" href="car-edit.php">New</a>
    </div>
</div>
<div class="panel panel-default">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>VIN</th>
                <th>Trans. Serial Number</th>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>Engine Serial Number</th>
                <th>Engine</th>
                <th>Drive Train</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($viewModel as $m) {
                echo "<tr>";
                echo "<td>$m->vin</td>";
                echo "<td>$m->transSerialNumber</td>";
                echo "<td>$m->make</td>";
                echo "<td>$m->model</td>";
                echo "<td>$m->year</td>";
                echo "<td>$m->engineSerialNumber</td>";
                echo "<td>$m->engineId</td>";
                echo "<td>$m->driveTrainId</td>";
                echo "<td class=\"text-right\"><a class=\"btn-sm btn-info\" href=\"car-edit.php?vin=$m->vin\">Edit</a></td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
</div>