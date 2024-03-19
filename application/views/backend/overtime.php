<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
         <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-calendar-check-o" style="color:#1976d2"></i>Attendance</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Attendance</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <div class="row m-b-10"> 
                    <div class="col-12">
                        <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>attendance/Save_Overtime" class="text-white"><i class="" aria-hidden="true"></i> Add Overtime </a></button>
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>attendance/Attendance_Report" class="text-white"><i class="" aria-hidden="true"></i> Attendance Report </a></button>
                        <?php }else{?>
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>attendance/Save_Attendance" class="text-white"><i class="" aria-hidden="true"></i> Add Attendance </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="#" class="text-white" data-toggle="modal" data-target="#Bulkmodal"><i class="" aria-hidden="true"></i>  Add Bulk Attendance</a></button>
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>attendance/Attendance_Report" class="text-white"><i class="" aria-hidden="true"></i> Attendance Report </a></button>

                        <?php }?>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Attendance List  </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="attendance123" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Employee Name</th>
                                                <th>Note</th>
                                                <th>Day </th>
                                                <th>Date </th>
                                                <th>Sign In Ov</th>
                                                <th>Sign Out Ov</th>                                               
                                                <th>Overtime</th>
                                                <th> x 1,5</th>
                                                <th> x 2</th>
                                                <th> x 3</th>
                                                <th> x 4</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>Employee Name</th>
                                                <th>PIN</th>
                                                <th>Day </th>
                                                <th>Date </th>
                                                <th>Sign In</th>
                                                <th>Sign Out</th>
                                                <th>Working Hour</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot> -->
                                        <?php $N="N";$Y="Y";?>
                                        <tbody>
                                           <?php foreach($attendancelist as $value): ?>
                                            <?php if($value->note !==NULL) { ?>                                            
                                            <tr>
                                                <?php $OVTT=$value->OT;$OVT=round($OVTT);?>

                                                <?php if (date('l', strtotime($value->atten_date))=='Saturday' OR date('l', strtotime($value->atten_date))=='Sunday') {?>
                                                    <td class="btn-sm btn-danger"><mark><?php echo $value->name; ?></mark></td>
                                                    <td class="btn-sm btn-danger"><?php echo $value->note; ?></td>
                                                    <td class="btn-sm btn-danger"><?php echo date('l', strtotime($value->atten_date)) ;?></td>
                                                <?php } else {?>
                                                    <td class="btn-sm btn-success"><mark><?php echo $value->name; ?></mark></td>
                                                    <td class="btn-sm btn-success"><?php echo $value->note; ?></td>
                                                    <td class="btn-sm btn-success"><?php echo date('l', strtotime($value->atten_date)) ;?></td>
                                                <?php }?>
                                                
                                                <td><?php echo date('m/d/Y',strtotime($value->atten_date)) ; ?></td>
                                                <td><?php echo $value->start_overtime; ?></td>
                                                <td><?php echo $value->end_overtime; ?></td>                                                                                          
                                                <!-- Overtime -->
                                                <?php if ($OVT<1) {?>
                                                <td>0</td>
                                                <?php } else {?>                                            
                                                <td><?php echo $OVTT=$value->OT." => "; echo $OVT; ?></td>
                                                <?php }?>
                                                <!-- 1.5 -->
                                                <?php if ($OVT >= 1 AND date('l', strtotime($value->atten_date))!=='Saturday' AND date('l', strtotime($value->atten_date))!=='Sunday') { ?>
                                                   <td><?php $Q=1*1.5; echo $Q;?></td> 
                                                <?php }else{ ?> 
                                                    <td>0</td>
                                                <?php } ?>
                                                <!-- 2 -->
                                                <?php if (date('l', strtotime($value->atten_date))!=='Saturday' AND date('l', strtotime($value->atten_date))!=='Sunday') { ?>
                                                        <!-- $OVT-1 *2  -->
                                                        <?php if ( $OVT < 1) {?>
                                                        <td>0</td>                                                     
                                                        <?php }else{ ?>   
                                                        <td><?php $Q= ($OVT-1)*2; echo $Q;?></td>
                                                        <?php } ?>
                                                   
                                                <?php }else{ ?> 
                                                    
                                                    <?php if ( $OVT <= 7) {?>
                                                        <td><?php $Q= $OVT*2; echo $Q;?></td>                                                    
                                                        <?php }else{ ?>   
                                                        <td><?php $Q=7*2; echo $Q;?></td> 
                                                        <?php } ?> 
                                                <?php } ?>
                                                <!-- 3 -->
                                                <?php if (date('l', strtotime($value->atten_date))!=='Saturday' AND date('l', strtotime($value->atten_date))!=='Sunday') { ?>
                                                        <!-- $OVT-1 *2  -->
                                                        <!-- <?php if ( $OVT <= 8) {?>
                                                            <td>0</td>                                                    
                                                        <?php }else{ ?>   
                                                            <td><?php $Q=1*3; echo $Q;?></td>   
                                                        <?php } ?> -->
                                                    <td>0</td>     
                                                   
                                                <?php }else{ ?> 
                                                        <?php if ( $OVT <= 8) {?>
                                                            <td>0</td>                                                    
                                                        <?php }else{ ?>   
                                                            <td><?php $Q=1*3; echo $Q;?></td>   
                                                        <?php } ?>
                                                <?php } ?>
                                                
                                                <!-- 4 -->
                                                <?php if (date('l', strtotime($value->atten_date))!=='Saturday' AND date('l', strtotime($value->atten_date))!=='Sunday') { ?>
                                                        <!-- $OVT-1 *2  -->
                                                        <!-- <?php if ( $OVT <=9) {?>
                                                            <td>0</td>                                                    
                                                        <?php }else{ ?>   
                                                            <td><?php $Q=($OVT-8)*4; echo $Q;?></td>   
                                                        <?php } ?> -->
                                                    <td>0</td>  
                                                <?php }else{ ?> 
                                                    <?php if ( $OVT <= 8) {?>
                                                            <td>0</td>                                                    
                                                    <?php }else{ ?>   
                                                            <td><?php $Q=($OVT-8)*4; echo round($Q);?></td>   
                                                    <?php } ?>
                                                <?php } ?>
                                                <td class="jsgrid-align-center ">                                             
                                                    <a href="Save_Attendance?A=<?php echo $value->id; ?>" title="Edit" class="btn btn-sm btn-primary waves-effect waves-light" data-value="Approve" ><i class="fa fa-pencil-square-o"></i>Toha</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<div id="Bulkmodal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                           <form method="post" action="import" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Add Attendance</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Import Attendance<span><img src="<?php echo base_url(); ?>assets/images/finger.jpg" height="100px" width="100px"></span>Upload only CSV file</h4>
                                             
                                            <input type="file" name="csv_file" id="csv_file" accept=".csv"><br><br>
                                                                                        
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success waves-effect">Save</button>
                                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                            </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>                             
<?php $this->load->view('backend/footer'); ?>
<script>
    $('#attendance123').DataTable({
        "aaSorting": [[2,'desc']],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>