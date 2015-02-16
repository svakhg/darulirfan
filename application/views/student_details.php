
<div class="row-border">
    <?php if ($student === false) { ?>
        <p>There are currently no active data</p>
    <?php } else { ?>
        <h1><?php echo $student->std_name; ?>, <?php echo $student->std_id; ?></h1>
        <div class="col-lg-4">
            <h5>Class : <?php echo $student->class_id; ?></h5>
            <h5>Roll No. : <?php echo $student->roll_no; ?></h5>
            <?php $gender = ($student->gender == 1) ? 'Male' : 'Female'; ?> 
            <h5>Gender : <?php echo $gender; ?></h5>
            
            <h5>Present Address : <?php echo $student->present_address; ?></h5>
        </div>
        <div class="col-lg-4">
            <h5>Father Name : <?php echo $student->father_name; ?>, <?php echo $student->father_mobile_no; ?></h5>
            <h5>Mother Name : <?php echo $student->mother_name; ?>, <?php echo $student->mother_mobile_no; ?></h5>
            <h5>Guardian Name : <?php echo $student->guardian_name; ?>, <?php echo $student->guardian_mobile_no; ?></h5>
            
            <?php (!empty($student->guardian_name)) ? $student->guardian_name . 'd' : 'sdf'; ?> 
        </div>
    <?php } ?>    
</div>
<div class="row well-large">
    <table id= "table" class="table table-bordered table-hover table-condensed table-striped">
        <thead>
            <tr>

                <th>
                    Fee Category
                </th>
                <th >
                    Amount
                </th>

                <th>
                    Date
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if ($results === FALSE): ?>
            <p>There are currently no active data</p>
            <?php
        else:
            foreach ($results as $data) {
                ?>
                <tr>
                    <td>
                        <?php echo $data->name; ?> (<?php echo $data->month; ?>)
                    </td>
                    <td>
                        <?php echo $data->amount; ?>
                    </td>
                    <td>
                        <?php echo $data->created; ?>
                    </td>
                </tr>
            <?php } endif; ?>
        <tr class="">
            <td>Total Amount - </td>
            <td><?php if ($total === false) { ?>
                    <p>There are currently no active data</p>
                <?php
                } else {
                    echo $total->amount;
                }
                ?>

            </td>
        </tr>
        </tbody>
    </table>

    <a href="#/std_report/pay_fees/<?php echo $student->id; ?>" class="btn btn-large btn-primary">Pay Fees</a>
</div>




