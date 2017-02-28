<fieldset>
    <div>
        <a href="model-edit.php">New</a>
    </div>		
    <legend>Models</legend>
    <table>
        <thead>
            <tr>
                <th>Make</th>
                <th>Model</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($viewModel as $m) {
                echo "<tr>";
                echo "<td>$m->makeName</td>";
                echo "<td>$m->name</td>";
                echo "<td><a href=\"model-edit.php?id=$m->id\">Edit</a></td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
</fieldset>