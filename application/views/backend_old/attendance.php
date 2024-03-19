<!-- Content Wrapper. Contains page content -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!-- Date and time range -->
                    <form action="<?php echo base_url('attendance/attendanceList'); ?>" method="post">
                        <div class="card-header">
                            <button type="" class="btn btn-success">Attendance</button>
                            <button type="" class="btn btn-danger">Overtime</button>


                            <button type="submit" class="btn btn-info float-right mt-1">Filter Periode</button>
                            <input type="date" class="btn  float-right" name="enddate" required>
                            <label class="float-right mt-2">End</label>
                            <input type="date" class="btn  float-right" name="startdate" required>
                            <label class="float-right mt-2">Start</label>

                    </form>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Employee Name</th>
                                <th>NIP</th>
                                <th>Day</th>
                                <th>Date</th>
                                <th>In</th>
                                <th>Out</th>
                                <th>Working Hour</th>
                            </tr>
                        </thead>
                        <?php $no = 1; ?>
                        <tbody>
                            <?php foreach ($attendancelist as $attList) { ?>

                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $attList['emp_id'] ?></td>
                                    <td><?= $attList['emp_id'] ?></td>
                                    <td><?= $attList['atten_date'] ?></td>
                                    <td><?= $attList['atten_date'] ?></td>
                                    <td><?= $attList['signin_time'] ?></td>
                                    <td><?= $attList['signout_time'] ?></td>
                                    <td>X</td>
                                </tr>
                            <?php } ?>

                        </tbody>

                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Employee Name</th>
                                <th>NIP</th>
                                <th>Day</th>
                                <th>Date</th>
                                <th>In</th>
                                <th>Out</th>
                                <th>Working Hour</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->