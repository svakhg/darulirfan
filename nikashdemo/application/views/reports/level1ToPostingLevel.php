<?php
$count = 1;
?>
<div class="AllList">
    <ul>
        <?php
        foreach ($accountHead as $row) {
            ?>
        <li class="accType"><?php echo @$row->type; ?>
                <ul><?php
                    foreach ($level1[$row->account_id] as $row1) {
                        ?>
                        <li><?php echo @$row1->level1_name; ?>
                            <ul><?php
                                foreach ($level2[$row1->id] as $row2) {
                                    ?>
                                    <li><?php echo @$row2->level2_name; ?>
                                        <ul type="disc"><?php
                                            foreach ($level3[$row2->id] as $row3) {
                                                ?>
                                                <li><?php echo @$row3->level3_name; ?>

                                                </li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </li>

        <?php } ?>
    </ul>
</div>
<style>
    .AllList li{
        margin-left: 20px;
        line-height: 30px;
    }
    .AllList .accType{
        margin-left: 0;
    }
</style>