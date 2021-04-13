<?php
/* Accounting > New Expense view
*/
?>
<?php $session = $this->session->userdata('username');?>
<?php $get_animate = $this->Xin_model->get_content_animate();?>
<?php $role_resources_ids = $this->Xin_model->user_role_resource(); ?>
<?php $user_info = $this->Xin_model->read_user_info($session['user_id']);?>
<div id="smartwizard-2" class="smartwizard-example sw-main sw-theme-default">
  <ul class="nav nav-tabs step-anchor">
    <?php if(in_array('286',$role_resources_ids) || $user_info[0]->user_role_id==1) { ?>
    <li class="nav-item clickable"> <a href="<?php echo site_url('admin/accounting/accounting_dashboard/');?>" data-link-data="<?php echo site_url('admin/accounting/accounting_dashboard/');?>" class="mb-3 nav-link hrms-link"> <span class="sw-icon ion ion-md-speedometer"></span> <?php echo $this->lang->line('xin_hr_finance');?>
      <div class="text-muted small"><?php echo $this->lang->line('hr_accounting_dashboard_title');?></div>
      </a> </li>
    <?php } ?>
    <?php if(in_array('72',$role_resources_ids)) { ?>
    <li class="nav-item clickable"> <a href="<?php echo site_url('admin/accounting/bank_cash/');?>" data-link-data="<?php echo site_url('admin/accounting/bank_cash/');?>" class="mb-3 nav-link hrms-link"> <span class="sw-icon ion ion-ios-cash"></span> <?php echo $this->lang->line('xin_acc_account_list');?>
      <div class="text-muted small"><?php echo $this->lang->line('xin_add_new');?> <?php echo $this->lang->line('xin_acc_accounts');?></div>
      </a> </li>
      <?php } ?>
    <?php if(in_array('75',$role_resources_ids)) { ?>
    <li class="nav-item clickable"> <a href="<?php echo site_url('admin/accounting/deposit/');?>" data-link-data="<?php echo site_url('admin/accounting/deposit/');?>" class="mb-3 nav-link hrms-link"> <span class="sw-icon ion ion-logo-usd"></span> <?php echo $this->lang->line('xin_acc_deposit');?>
      <div class="text-muted small"><?php echo $this->lang->line('xin_add_new');?> <?php echo $this->lang->line('xin_acc_deposit');?></div>
      </a> </li>
      <?php } ?>
    <?php if(in_array('76',$role_resources_ids)) { ?>
    <li class="nav-item clickable"> <a href="<?php echo site_url('admin/accounting/expense/');?>" data-link-data="<?php echo site_url('admin/accounting/expense/');?>" class="mb-3 nav-link hrms-link"> <span class="sw-icon fas fa-money-check-alt"></span> <?php echo $this->lang->line('xin_acc_expense');?>
      <div class="text-muted small"><?php echo $this->lang->line('xin_add_new');?> <?php echo $this->lang->line('xin_acc_expense');?></div>
      </a> </li>
      <?php } ?>
     <?php if(in_array('76',$role_resources_ids)) { ?>
    <li class="nav-item active"> <a href="<?php echo site_url('admin/accounting/chart_of_account/');?>" data-link-data="<?php echo site_url('admin/accounting/chart_of_account/');?>" class="mb-3 nav-link hrms-link"> <span class="sw-icon fas fa-money-check-alt"></span> <?php echo $this->lang->line('xin_accounting_chart_of_account');?>
      <div class="text-muted small"><?php echo $this->lang->line('xin_add_new');?> <?php echo $this->lang->line('xin_accounting_chart_of_account');?></div>
      </a> </li>
      <?php } ?>
    <?php if(in_array('77',$role_resources_ids)) { ?>
    <li class="nav-item clickable"> <a href="<?php echo site_url('admin/accounting/transfer/');?>" data-link-data="<?php echo site_url('admin/accounting/transfer/');?>" class="mb-3 nav-link hrms-link"> <span class="sw-icon ion ion-md-swap"></span> <?php echo $this->lang->line('xin_acc_transfer');?>
      <div class="text-muted small"><?php echo $this->lang->line('xin_transfer_funds');?></div>
      </a> </li>
      <?php } ?>
    <?php if(in_array('78',$role_resources_ids)) { ?>
    <li class="nav-item clickable"> <a href="<?php echo site_url('admin/accounting/transactions/');?>" data-link-data="<?php echo site_url('admin/accounting/transactions/');?>" class="mb-3 nav-link hrms-link"> <span class="sw-icon fas fa-cube"></span> <?php echo $this->lang->line('xin_acc_transactions');?>
      <div class="text-muted small"><?php echo $this->lang->line('xin_view_all');?> <?php echo $this->lang->line('xin_acc_transactions');?></div>
      </a> </li>
    <?php } ?>  
  </ul>
</div>
<hr class="border-light m-0 mb-3">
<style>
    ul.tree li {
    list-style-type: none;
    position: relative;
}

ul.tree li ul {
    display: none;
}

ul.tree li.open > ul {
    display: block;
}

ul.tree li a {
    color: black;
    text-decoration: none;
}

ul.tree li a:before {
    height: 1em;
    padding:0 .1em;
    font-size: .8em;
    display: block;
    position: absolute;
    left: -1.3em;
    top: .2em;
}
ul.tree li > a:not(:last-child):before {
    content: '+';
}

ul.tree li.open > a:not(:last-child):before {
    content: '-';
}
    
    
    
    ul.tree, ul.tree ul {
    list-style: none;
     margin: 0;
     padding: 0;
   } 
   ul.tree ul {
     margin-left: 10px;
   }
   ul.tree li {
     margin: 0;
     padding: 0 7px;
     line-height: 20px;
     color: #369;
     font-weight: bold;
     border-left:1px solid rgb(100,100,100);

   }
   ul.tree li:last-child {
       border-left:none;
   }
   ul.tree li:before {
      position:relative;
      top:-0.3em;
      height:1em;
      width:12px;
      color:white;
      border-bottom:1px solid rgb(100,100,100);
      content:"";
      display:inline-block;
      left:-7px;
   }
   ul.tree li:last-child:before {
      border-left:1px solid rgb(100,100,100);   
   }
</style>
<div class="card <?php echo $get_animate;?>">
  <div class="card-header with-elements"> <span class="card-header-title mr-2"><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_accounting_chart_of_account');?></span> </div>
  <div class="card-body">
     <ul class="tree">
  <li class="open"><a href="#">COA</a>
    <ul>
        <li class="open"><i class="fas fa-folder"></i>  <a href="#">Assets</a>
        <ul>
          <li class="open"> <i class="fas fa-folder"></i>  <a href="#">Current Assets</a>
               <ul>
                <li > <i class="fas fa-folder"></i>  <a href="#">Cash & Cash Equivalent</a>
                    <ul>
                        <li > <i class="fas fa-folder"></i>  <a href="#">Cash At Bank</a></li>
                        <li > <i class="fas fa-folder"></i>  <a href="#">Cash In Hand</a></li>
                   </ul>
                </li>
               </ul>
          </li>
          <li class="open"><i class="fas fa-folder"></i>  <a href="#">Non Current Asset</a></li>
        </ul>
      </li>
      <li class="open"><i class="fas fa-folder"></i>  <a href="#">Equity</a></li>
      <li class="open"><i class="fas fa-folder"></i>  <a href="#">Expense</a>
        <ul>
          <li class="open"><i class="fas fa-folder"></i>  <a href="#">Employee Salary</a></li>
           <?php 
            foreach($all_expense_types as $expense){
          ?>
            <li class="open"><i class="fas fa-folder"></i>  <a href="#"><?php echo $expense->name;?></a></li>
          <?php }?>
        </ul>
      </li>
      <li class="open"><i class="fas fa-folder"></i>  <a href="#">Income</a>
        <ul>
          <?php 
            foreach($all_running_project as $project){
          ?>
            <li class="open"><i class="fas fa-folder"></i>  <a href="#"><?php echo $project->title;?></a></li>
          <?php }?>
        </ul>
      </li>
      <li class="open"><i class="fas fa-folder"></i>  <a href="#">Liabilities</a>
        <ul>
          <li class="open"><i class="fas fa-folder"></i>  <a href="#">Current Liabilities</a>
               <ul>
                <li > <i class="fas fa-folder"></i>  <a href="#">Account Payable</a>
                    <ul>
                        <li > <i class="fas fa-folder"></i>  <a href="#">1 Adnan Ahmed</a></li>
                        <li > <i class="fas fa-folder"></i>  <a href="#">2 Faruque Hossen</a></li>
                        <li > <i class="fas fa-folder"></i>  <a href="#">3 Toufiq Islam</a></li>
                   </ul>
                </li>
               </ul>
          </li>
          <li class="open"><i class="fas fa-folder"></i>  <a href="#">Non Current Liabilities</a></li>
        </ul>
      </li>
    </ul>
  </li>

</ul>
  </div>
</div>
<script>
    var tree = document.querySelectorAll('ul.tree a:not(:last-child)');
for(var i = 0; i < tree.length; i++){
    tree[i].addEventListener('click', function(e) {
        var parent = e.target.parentElement;
        var classList = parent.classList;
        if(classList.contains("open")) {
            classList.remove('open');
            var opensubs = parent.querySelectorAll(':scope .open');
            for(var i = 0; i < opensubs.length; i++){
                opensubs[i].classList.remove('open');
            }
        } else {
            classList.add('open');
        }
    });
}
</script>