<div>
    <!-- Page Title -->
   <div class="row page-titles">
       <div class="col-md-5 align-self-center">
           <h3 class="text-themecolor titleheader">Member Insurance</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('insurance'); ?>">Insurance List</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Update existing Member Insurance</a></li>
            </ol>
       </div>
   </div>
   <!-- End Page Title -->

   <div class="row">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header">
                   <h6>Co-Insured Dependents</h6>
               </div>
               <div class="card-body">
                <table id="co_insured_dependents" class="table  color-table success-table tablesaw table-bordered table-hover table no-wrap" style="overflow:scroll;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Birth Date</th>
                            <th>Age</th>
                            <th>Relationship</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
               </div>
           </div>
       </div>
   </div>

   <div class="row">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header">
                   <h6>Beneficiaries to receive the benefits</h6>
               </div>
               <div class="card-body">
                <table id="ben_benefits" class="table  color-table success-table tablesaw table-bordered table-hover table no-wrap" style="overflow:scroll;">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Birth Date</th>
                            <th>Age</th>
                            <th>Relationship</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
               </div>
           </div>
       </div>
   </div>
</div>

<?php $this->load->view('new_dependents_modal'); ?>
<?php $this->load->view('edit_dependents_modal'); ?>
<?php $this->load->view('addBeneficiaries'); ?>
<?php $this->load->view('editBeneficiaries'); ?>
