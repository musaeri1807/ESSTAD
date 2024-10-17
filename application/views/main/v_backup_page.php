

<div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header">
          <i class="fa fa-edit"></i>

          <h3 class="box-title">Buttons</h3>
        </div>
        <div class="box-body pad table-responsive">
          <p>
            <a href="<?php echo base_url('Replication/backupDb') ?>" class="btn btn-info"><i class="fa fa-download"></i> Backup & Replication Database</a><code><?php echo $this->session->flashdata('message'); ?></code>
          </p>
          <table class="table datatable">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama File</th>
                <th><i class="fa fa-cogs"></i></th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              foreach ($db as $row) : ?>
                <tr>
                  <td><?php echo $i++ ?></td>
                  <td><?php echo $row['date_created'] ?></td>
                  <td><?php echo $row['files'] ?></td>
                  <td>
                    <a href="<?php echo base_url('Replication/downloadDb/') . $row['files'] . '.txt'; ?>" class="btn btn-success"><i class="fa fa-download"></i> Download</a>

                    <a href="<?php echo base_url('Replication/backupDbDelete/') . $row['files'] ?>" class="btn btn-danger hapus_backup"><i class="fa fa-trash"></i> Delete</a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.col -->
  </div>

