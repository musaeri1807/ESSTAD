
<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
         <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-university" aria-hidden="true"></i> Invoice</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"><i class="fa fa-university" aria-hidden="true"></i> Invoice</li>
                    </ol>
                </div>
            </div>
            <style type="text/css">
                table.table.table-hover thead{
                    background-color: #e8e8e8;
                }
            </style>
            <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">
<!--                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#TypeModal" data-whatever="@getbootstrap" class="text-white TypeModal"><i class="" aria-hidden="true"></i> Add Payroll </a></button>-->
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>Payroll/Salary_List" class="text-white"><i class="" aria-hidden="true"></i>  Back</a></button>
                        <button type="button" class="btn btn-primary print_payslip_btn"><i class="fa fa-print"></i><i class="" aria-hidden="true" onclick="printDiv()"></i>  Print</button>
                    </div>
                </div> 

                <div class="row payslip_print" id="payslip_print">
                    <div class="col-md-12">
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-md-4 col-xs-6 col-sm-6">
                                    <img src="<?php echo base_url();?>assets/images/TDPay.png" style=" width:180px; margin-right: 10px;" />
                                </div>
                                <div class="col-md-8 col-xs-6 col-sm-6 text-left payslip_address">
                                    <p>
                                        <?php echo $settingsvalue->address; ?>
                                    </p>
                                    <p>
                                        <?php echo $settingsvalue->address2; ?>
                                    </p>
                                    <p>
                                        Phone: <?php echo $settingsvalue->contact; ?>, Email: <?php echo $settingsvalue->system_email; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-left">
                                    <h5 style="margin-top: 15px;">Payslip for the period of <?php echo $salary_info->month.' '.$salary_info->year ?></h5>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 5px;">
                                <div class="col-md-12"><!-- 
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php $obj_merged = (object) array_merge((array) $employee_info, (array) $salaryvaluebyid, (array) $salarypaybyid, (array) $salaryvalue, (array) $loanvaluebyid); print_r($obj_merged); ?>
                                            <?php print_r($otherInfo[0]); ?>
                                        </div>
                                    </div> -->
                                    <table class="table table-condensed borderless payslip_info">
                                        <tr>
                                            <td>Employee PIN</td>
                                            <td>: <?php echo $obj_merged->em_code; ?></td>
                                            <td>Employee Name</td>
                                            <td>: <?php echo $obj_merged->first_name; ?> <?php  echo $obj_merged->last_name; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Department</td>
                                            <td>: <?php echo $otherInfo[0]->dep_name; ?></td>
                                            <td>Designation</td>
                                            <td>: <?php echo $otherInfo[0]->name; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pay Date</td>
                                            <td>: <?php echo date('j F Y',strtotime($salary_info->paid_date)); ?></td>
                                            <td>Date of Joining</td>
                                            <td>: <?php echo $obj_merged->em_joining_date; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Days Worked</td>
                                            <td>: 
                                                <?php
                                                //    $days = ceil($salary_info->total_days / 8);
                                                   $days = 43;
                                                   echo $days;
                                                ?>
                                            </td>
                                            <?php if(!empty($bankinfo->bank_name)){ ?>
                                            <td>Bank Name</td>
                                            <td>: <?php echo $bankinfo->bank_name; ?></td>
                                            <?php } else { ?>
                                            <td>Pay Type</td>
                                            <td>: <?php echo 'Hand Cash'; ?></td>
                                            <?php } ?>
                                        </tr>
                                        <?php if(!empty($bankinfo->bank_name)){ ?>
                                        <tr>
                                            <td>Account Name</td>
                                            <td>: <?php echo $bankinfo->holder_name; ?></td>
                                            <td>Account Number</td>
                                            <td>: <?php echo $bankinfo->account_number; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                            <style>
                                .table-condensed>thead>tr>th, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>tbody>tr>td, .table-condensed>tfoot>tr>td { padding: 2px 5px; }
                            </style>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-condensed borderless" style="border-left: 1px solid #ececec;">
                                        <thead class="thead-light" style="border: 2px solid #ececec;">
                                            <tr>
                                                <th>Description</th>
                                                <th ></th>
                                                <th class="text-right">Earnings</th>
                                                <th class="text-right">Deductions</th>
                                                
                                            </tr>
                                            
                                        </thead>
                                        <tbody style="border: 1px solid #ececec;">
                                            <tr>
                                                <td>Basic Salary (Gaji Pokok)</td>
                                                <td ></td>
                                                <!-- <td class="text-right"><?php echo $addition[0]->basic; ?> IDN</td> -->
                                                <td class="text-right"><?= $additionB=5274201; ?> IDN</td>
                                                <td class="text-right"> - </td>
                                            </tr>
                                            <tr>
                                                <?php
                                                $OTRP=30487;
                                                $OT1=1.5;
                                                $OT2=2;
                                                $OT3=3;
                                                $OT4=4;
                                                
                                                ?>
                                                <td>1 Over Time (<?= $OT1 ;?>) x <?= 'Rp '. $OTRP ?></td>
                                                <td class="text-center">x <?= $OTT1=3 ?> </td>
                                                <td class="text-right"> <?php $RPOT1=$OT1*$OTRP*$OTT1 ; echo $RPOT1  ;?> IDN</td>
                                                <td class="text-right">  </td>
                                            </tr>
                                            <tr>                                             
                                                <td>2 Over Time (<?= $OT2?>) x <?= 'Rp '. $OTRP ?></td>
                                                <td class="text-center">x <?= $OTT2=11 ;?> </td>
                                                <td class="text-right"><?php $RPOT2=$OT2*$OTRP*$OTT2 ; echo $RPOT2  ;?> IDN</td>
                                                <td class="text-right">  </td>
                                            </tr>
                                            <tr>                                                
                                                <td>3 Over Time (<?= $OT3?>) x <?= 'Rp '. $OTRP ?></td>
                                                <td class="text-center">x <?= $OTT3=1 ?> </td>
                                                <td class="text-right"><?php $RPOT3=$OT3*$OTRP*$OTT3 ; echo $RPOT3  ;?> IDN</td>
                                                
                                                <td class="text-right">  </td>
                                            </tr>
                                            <tr>
                                                <td>4 Over Time (<?= $OT4?>) x <?= 'Rp '. $OTRP ?></td>
                                                <td class="text-center">x <?= $OTT4=0 ?> </td>
                                                <td class="text-right"><?php $RPOT4=$OT4*$OTRP*$OTT4 ; echo $RPOT4  ;?> IDN</td>
                                                <td class="text-right">  </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td> - </td>
                                                <td class="text-right"></td>
                                                <td class="text-right"> </td>
                                            </tr>
                                            <tr>
                                                <td> <mark> Presence Allowance (Tunjungan Kehadiran) </mark></td>
                                                <td> - </td>
                                                <td class="text-right"> 262,500 IDN</td>
                                                <td class="text-right"> - </td>
                                            </tr>
                                            <tr>
                                                <td> <mark>Performance Allowance (Tunjangan Kinerja) </mark></td>
                                                <td > - </td>
                                                <td class="text-right"> 332,275  IDN</td>
                                                <td class="text-right"> - </td>
                                            </tr>
                                            <tr>
                                                <td><mark>Shiff Allowance (Tunjangan Shift)</mark></td>
                                                <td > - </td>
                                                <td class="text-right"><?php echo $addition[0]->conveyance; ?>  IDN</td>
                                                <td class="text-right"> - </td>
                                            </tr>
                                            <tr>
                                                <td><mark>Work Risk Allowance (Tunjangan Resiko Kerja)</mark></td>
                                                <td > - </td>
                                                <td class="text-right"><?php echo $addition[0]->conveyance; ?>  IDN</td>
                                                <td class="text-right"> -</td>
                                            </tr>                                           
                                            <tr>
                                                <td><mark>Kompensasi</mark></td>
                                                <td > - </td>
                                                <td class="text-right"><?php echo $salary_info->bonus; ?> <span> 0 </span> </td>
                                                <td class="text-right">-</td>
                                            </tr>
                                            <tr>
                                                <td><mark>THR</mark></td>
                                                <td > - </td>
                                                <td class="text-right"><?php echo $salary_info->bonus; ?> <span> 0 </span> </td>
                                                <td class="text-right">-</td>
                                            </tr>
                                            <tr>
                                                <td>Loan</td>
                                                <td > - </td>
                                                <td class="text-right">-</td>
                                                <td class="text-right">-</td>
                                            </tr>
                                            <tr>
                                                <td><mark>Tax PPH 21 </mark></td>
                                                <td > - </td>
                                                <td class="text-right"> -</td>
                                                <td class="text-right"> 44,829 IDN</td>
                                            </tr>
                                            <tr>
                                                <td>BPJS Kesehatan</td>
                                                <td class="text-center" > 1 %</td>
                                                <td class="text-right"> -</td>
                                                <td class="text-right"> <?php $BPJSKES= $additionB*1/100; echo  $BPJSKES; ?> IDN</td>
                                            </tr>
                                            <tr>
                                                <td>BPJS Ketenagakerjaan (JHT)</td>
                                                <td class="text-center" > 2 % </td>
                                                <td class="text-right"> -</td>
                                                <td class="text-right"> <?php $BPJSKer1= $additionB*2/100; echo  $BPJSKer1;?> IDN</td>
                                            </tr>
                                            <tr>
                                                <td>BPJS Ketenagakerjaan (Pensiun)</td>
                                                <td class="text-center" > 1 %</td>
                                                <td class="text-right"> -</td>
                                                <td class="text-right"><?php $BPJSKer2= $additionB*1/100; echo  $BPJSKer2; ?> IDN</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="tfoot-light">
                                            <tr>
                                                <th>Total</th>
                                                <th></th>
                                                <!-- <th class="text-right"><?php $total_add = $salary_info->basic + $salary_info->medical + $salary_info->house_rent + $salary_info->bonus+$a; echo round($total_add,2); ?> IDN</th>
                                                <th class="text-right"><?php $total_did = $salary_info->loan+$salary_info->diduction; echo round($total_did,2); ?> IDN</th> -->

                                                <th class="text-right"><?php $total_add = $additionB +$RPOT1 +$RPOT2 +$RPOT3 +$RPOT3 +$RPOT4  ; echo $total_add; ?> IDN</th>
                                                <th class="text-right"><?php $total_did = $BPJSKES+$BPJSKer1+$BPJSKer2; echo $total_did; ?> IDN</th>
                                            </tr>
                                            <tr>
                                                <th >Net Pay</th>
                                                <th></th>
                                                <th></th>
                                                <!-- <th class="text-right"><?php echo $salary_info->total_pay/*round($total_add - $total_did,2)*/; ?> IDN</th> -->
                                                <th class="text-right"><?= $total_add-$total_did; ?> IDN</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 25px;">
                                <div class="col-md-6">
                                    _____________________________________
                                    <br>
                                    Employer's Signature
                                </div>
                                <div class="col-md-6 text-right">
                                    _____________________________________
                                    <br>
                                    Payroll Signature
                                </div>
                            </div> 
                        </div>

                        
                    </div>
                </div>
                <div class="modal fade" id="Salarymodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">Salary Form</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <form method="post" action="Add_Salary" id="salaryform" enctype="multipart/form-data">
                            <div class="modal-body">
                                    <!--   <div class="form-group">
                                        <label>Salary Type</label>
                                        <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="typeid" required>
                                            <?php #foreach($typevalue as $value): ?>
                                            <option value="<?php #echo $value->id ?>"><?php #echo $value->salary_type; ?></option>
                                            <?php #endforeach; ?>
                                        </select>
                                    </div> -->                                        
                                    <div class="form-group">
                                        <label class="control-label">Employee Id</label>
                                        <input type="text" name="emid" class="form-control" id="recipient-name1" value="" readonly>
                                    </div>                                         
                                    <div class="form-group">
                                        <label class="control-label">Basic</label>
                                        <input type="text" name="basic" class="form-control" id="recipient-name1" value="">
                                    </div>
                                    <h4>Addition</h4>                                         
                                    <div class="form-group">
                                        <label class="control-label">Medical</label>
                                        <input type="text" name="medical" class="form-control" id="recipient-name1"  value="">
                                    </div>                                         
                                    <div class="form-group">
                                        <label class="control-label">House Rent</label>
                                        <input type="text" name="houserent" class="form-control" id="recipient-name1" value="">
                                    </div>                                         
                                    <div class="form-group">
                                        <label class="control-label">Bonus</label>
                                        <input type="text" name="bonus" class="form-control" id="recipient-name1" value="">
                                    </div>
                                    <h4>Deduction</h4>                                         
                                    <div class="form-group">
                                        <label class="control-label">Provident Fund</label>
                                        <input type="text" name="provident" class="form-control" id="recipient-name1" value="">
                                    </div>                                         
                                    <div class="form-group">
                                        <label class="control-label">Bima</label>
                                        <input type="text" name="bima" class="form-control" id="recipient-name1" value="" >
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Tax</label>
                                        <input type="text" name="tax" class="form-control" id="recipient-name1"  value="">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Others</label>
                                        <input type="text" name="others" class="form-control" id="recipient-name1"  value="">
                                    </div>                                          
                                
                            </div>
                            <div class="modal-footer">                                       
                            <input type="hidden" name="sid" value="" class="form-control" id="recipient-name1">                                       
                            <input type="hidden" name="aid" value="" class="form-control" id="recipient-name1">                                       
                            <input type="hidden" name="did" value="" class="form-control" id="recipient-name1">                                       
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
<script type="text/javascript">
    $(document).ready(function () {
        $(".SalarylistModal").click(function (e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#salaryform').trigger("reset");
            $('#Salarymodel').modal('show');
            $.ajax({
                url: 'GetSallaryById?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).done(function (response) {
                console.log(response);
                // Populate the form fields with the data returned from server
                $('#salaryform').find('[name="sid"]').val(response.salaryvalue.id).end();
                $('#salaryform').find('[name="aid"]').val(response.salaryvalue.addi_id).end();
                $('#salaryform').find('[name="did"]').val(response.salaryvalue.de_id).end();
               /* $('#salaryform').find('[name="typeid"]').val(response.salaryvalue.type_id).end();*/
                $('#salaryform').find('[name="emid"]').val(response.salaryvalue.emp_id).end();
                $('#salaryform').find('[name="basic"]').val(response.salaryvalue.basic).end();
                $('#salaryform').find('[name="medical"]').val(response.salaryvalue.medical).end();
                $('#salaryform').find('[name="houserent"]').val(response.salaryvalue.house_rent).end();
                $('#salaryform').find('[name="bonus"]').val(response.salaryvalue.bonus).end();
                $('#salaryform').find('[name="provident"]').val(response.salaryvalue.provident_fund).end();
                $('#salaryform').find('[name="bima"]').val(response.salaryvalue.bima).end();
                $('#salaryform').find('[name="tax"]').val(response.salaryvalue.tax).end();
                $('#salaryform').find('[name="others"]').val(response.salaryvalue.others).end();
            });
        });
    });
</script>    
    <script src="<?php echo base_url(); ?>assets/js/jquery.PrintArea.js" type="text/JavaScript"></script>
    <script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $(".print_payslip_btn").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.payslip_print").printArea(options);
        });
    });
    </script>                          
<?php $this->load->view('backend/footer'); ?>