    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Department Name</h4>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= base_url('Organization/Save_dep'); ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" name="department" class="form-control" placeholder="Department Name" required>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary swalDefaultSuccess">Save</button>
                            <button type="submit" class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->

            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
                <!-- table -->
                <!-- /.card-header -->
                <div class="card card-primary">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">Action</th>
                                    <th>Department List</th>
                                    <th style="width: 30px">#</th>
                                </tr>
                            </thead>
                            <?php $no = 1; ?>
                            <tbody>
                                <?php foreach ($department as $dep) { ?>

                                    <tr>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="<?php echo base_url(); ?>organization/dep_edit/<?= $dep->id; ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                <a href="<?= base_url('Organization/Delete_dep') . '/' . $dep->id ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                        <td><?= $dep->dep_name; ?></td>
                                        <td><?= $no++; ?></td>
                                        <!-- <td><?= sprintf("%03d", $dep->id); ?></td> -->

                                    </tr>
                                <?php } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width: 10px">Action</th>
                                    <th>Department List</th>
                                    <th style="width: 30px">#</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    <!-- /.content -->