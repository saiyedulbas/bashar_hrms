<?php 
$session = $this->session->userdata('username');
$user_info = $this->Xin_model->read_user_info($session['user_id']);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="<?php echo base_url();?>skin/hrms_vendor/assets/css/style.css">
  <title>FAQ | Teton Support</title>
  <style type="text/css">
  .cd-faq__item{
	  background:#BCE6F4;
  }
  .cd-faq__trigger{
	  color:hsl(60, 3.3%, 11.8%);
  }
  .cd-faq__trigger::before, .cd-faq__trigger::after {
	  background:#121313;
  }
  </style>
</head>
<body>
<header class="cd-header flex flex-column flex-center" style="background-image:url('<?php echo base_url();?>uploads/clients/faq.png');background-size:cover">
  <div class="text-component text-center">
    <h1 style="color:rebeccapurple;font-weight:bold">Frequently Asked Questions</h1>
	<?php 
	if($session['user_id'] == 201 || $session['user_id'] == 153 || $session['user_id'] == 531 || $session['user_id'] == 532){?>
		<p > <a style="color:rebeccapurple"  class="btn btn-success cd-article-link" href="<?php echo site_url('admin/chat/newpusher/');?>"  target="_blank">Teton Support Center | Talk to an Agent</a></p>
	<?php }?>
    
  </div>
</header>

<section class="cd-faq js-cd-faq container max-width-md margin-top-lg margin-bottom-lg">
	<ul class="cd-faq__categories">
		<li><a class="cd-faq__category cd-faq__category-selected truncate" href="#basics">Teton Support Center</a></li>
		<li><a class="cd-faq__category truncate" href="#mobile">Leave Related</a></li>
		<li><a class="cd-faq__category truncate" href="#account">Project Related</a></li>
		<li><a class="cd-faq__category truncate" href="#payments">Account Informations</a></li>
		<li><a class="cd-faq__category truncate" href="#privacy">Office Shift Related</a></li>
		<li><a class="cd-faq__category truncate" href="#delivery">Profile  Informations</a></li>
	</ul> <!-- cd-faq__categories -->

	<div class="cd-faq__items">
		<ul id="basics" class="cd-faq__group">
			<li class="cd-faq__title"><h2 style="color:rebeccapurple;font-weight:bold">Teton Support Center</h2></li>
			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>How to talk to a live agent?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>Right now, Zubair Matin, Anthony D Silva and Masud are allowed to use this privilege. If you are one of them then you must see that Teton Support Center page</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>Would i be able to send some files in that live support desk?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>Yes, you can. You can literally send any type of files you want.</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>Is it allowed to send files when no agents are live?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>Yes, it is allowed to send files even when no agents are live</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>If i find that no agents are live at a moment then when the agents are live, how will i be notified?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>Easiest way to find out is, just check the page frequently. And there is a mail notification as well.</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>
		</ul> <!-- cd-faq__group -->

		<ul id="mobile" class="cd-faq__group">
			<li class="cd-faq__title"><h2 style="color:rebeccapurple;font-weight:bold">Leave Related</h2></li>
			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>How to apply for leave?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>To apply for a leave, there is an option in leave management. Visit that page and apply accordingly</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>How to earn leave encashment?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>Talk to HR for leave encashment and necessary informations</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>How to apply for ADU?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>Talk to the responsible person to know necessary informations</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>
		</ul> <!-- cd-faq__group -->

		<ul id="account" class="cd-faq__group">
			<li class="cd-faq__title"><h2 style="color:rebeccapurple;font-weight:bold">Project Related</h2></li>
			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>How to add projects or update it?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>There is an option in sidebar menu to add new project and check the update of the progress of any particular project. So, visit the option and see the option work live</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>How to add tasks?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>To add new task, there is another option in sidebar. Visit that option watch it work</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>How time log works?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>All the projects and according time logs will be shared in this option. So, in order to see this work, you gotta be visiting this options so often</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>How the kanban board works?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>The kanban board provides the informations about the ongoing projects. In order to see this option in action, you should visit it</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>
		</ul> <!-- cd-faq__group -->

		<ul id="payments" class="cd-faq__group">
			<li class="cd-faq__title"><h2 style="color:rebeccapurple;font-weight:bold">Account Informations</h2></li>
			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>What if I forget my password?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>There is a password recovery option. All you need to do is just visit that page and change it accordingly</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>How to see the project summary?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>There is a project option in sidebar menu. You can visit the page and find out your necessary informations</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>Will i be able to change my password?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>Yes, you will</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>
		</ul> <!-- cd-faq__group -->

		<ul id="privacy" class="cd-faq__group">
			<li class="cd-faq__title"><h2 style="color:rebeccapurple;font-weight:bold">Office Shift Related</h2></li>
			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>I worked on the weekend but TForce is showing me absent on those days.  What is the problem here?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>It's office shift related thing. Talk to HR to change your office shift to your desired one</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>Will I be able to change the office shift?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>To change it, you gotta talk to HR. And HR will change it accordingly</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>Will I be able to see the timesheet?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>In order to see it, HR permission needed. So, talk to him.</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>Will I be able to change the HR calendar? </span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>No, only HR will be allowed to change it</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>
		</ul> <!-- cd-faq__group -->

		<ul id="delivery" class="cd-faq__group">
			<li class="cd-faq__title"><h2 style="color:rebeccapurple;font-weight:bold">Profile Related Informations</h2></li>
			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>Will I be able to see my monthly Payslip?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>yes, you will</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>Will i be able to change my profile picture?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>Yes, you will</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>Will i be able to personal informations?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>Yes, you will</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>Will i be able to change the immigration data?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>Yes, you will</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>
<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>Will i be able to change the social networking profiles?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>Yes, you will</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>
			
<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>Will i be able to change the emergency contacts?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>Yes, you will</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>
			
<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>Will i be able to change the academic qualifications?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>Yes, you will</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>
			
			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>Will i be able to change the immmigration?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>Yes, you will</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>
			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>Will i be able to change the documents?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>Yes, you will</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>
			
		</ul> <!-- cd-faq__group -->
	</div> <!-- cd-faq__items -->

	<a href="#0" class="cd-faq__close-panel text-replace">Close</a>
  
  <div class="cd-faq__overlay" aria-hidden="true"></div>
</section> <!-- cd-faq -->
<script src="<?php echo base_url();?>skin/hrms_vendor/assets/css/util.js"></script> <!-- util functions included in the CodyHouse framework -->
<script src="<?php echo base_url();?>skin/hrms_vendor/assets/css/main.js"></script> 
</body>
</html>