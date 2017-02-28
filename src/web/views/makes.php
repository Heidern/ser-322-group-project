<fieldset>
    <div>
        <a href="make-edit.php">New</a>
    </div>		
    <legend>Makes</legend>
    <table>
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
                echo "<td><a href=\"make-edit.php?id=$m->id\">Edit</a></td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
</fieldset>