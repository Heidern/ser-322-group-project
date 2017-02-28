<h3>Makes</h3>
<div class="btn-toolbar form-group">
    <div class="btn-group">
        <a class="btn-sm btn-success" href="make-edit.php">New</a>
    </div>
</div>
<div class="panel panel-default">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>                
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($viewModel as $m) {
                echo "<tr>";
                echo "<td>$m->name</td>";
                echo "<td class=\"text-right\"><a class=\"btn-sm btn-info\" href=\"make-edit.php?id=$m->id\">Edit</a></td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
</div>