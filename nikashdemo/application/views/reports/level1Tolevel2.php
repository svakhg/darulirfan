<?php
$count = 1;
?>
<div>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Level 2 Head</th>
            <th>Level 1 Head</th>
        </tr>
        <?php
        $lvl1 = '';
        foreach ($select_result as $row) {
            ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $row->level2_name; ?></td>
                <?PHP
//                $lvl1 = $row->level1_name;
                if ($lvl1 == $row->level1_name) {
                    $print = '"';
                } else {
                    $print = $row->level1_name;
                    $lvl1 = $row->level1_name;
                }
                ?>
                <td><?php echo $print; ?></td>

            </tr>
            <?php
        }
        ?>
    </table>
</div>