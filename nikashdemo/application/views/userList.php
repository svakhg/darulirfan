
<table class="table table-bordered table-condensed table-striped table-hover">
    <tr>
        <th>User Name</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php
    foreach ($userList as $user) {
        ?>
        <tr>
            <td><?php echo $user->user_name; ?></td>
            <td><?php echo $user->status; ?></td>
            <td><?php echo $user->comp_name; ?></td>
        </tr>
        <?php
    }
    ?>
</table>