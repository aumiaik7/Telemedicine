<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Insert New User Group </title>
	<meta name="description" content="flexi auth, the user authentication library designed for developers."/> 
	<meta name="keywords" content="demo, flexi auth, user authentication, codeigniter"/>
	<?php $this->load->view('includes/head'); ?> 
</head>

<body id="insert_user_group">

<div id="body_wrap">
		<!-- Header -->  
	<?php $this->load->view('includes/header_1'); ?> 

	<!-- Demo Navigation -->
	<?php $this->load->view('includes/demo_header'); ?> 
	
	<!-- Intro Content -->
	<div class="content_wrap intro_bg">
		<div class="content clearfix"> 
			<div class="intro_text">
				<h1>Telemedicine Project</h1>
                <p class="a">It is an initiative to provide quality health service to the rural areas of Bangladesh</p>
				<p></p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
			<div class="col100">
				<h2>Insert New User Group</h2>
				<a href="<?php echo $base_url;?>auth_admin/manage_user_groups">Manage User Groups</a>

			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				
				<?php echo form_open(current_url());	?>  	
					<fieldset>
						<legend>Group Details</legend>
						<ul>
							<li class="info_req">
								<label for="group">Group Name:</label>
								<input type="text" id="group" name="insert_group_name" value="<?php echo set_value('insert_group_name');?>" class="tooltip_trigger"
									title="The name of the user group."/>
							</li>
							<li>
								<label for="description">Group Description:</label>
								<textarea id="description" name="insert_group_description" class="width_400 tooltip_trigger"
									title="A short description of the purpose of the user group."><?php echo set_value('insert_group_description');?></textarea>
							</li>
							<li>
								<label for="admin">Is Admin Group:</label>
								<input type="checkbox" id="admin" name="insert_group_admin" value="1" <?php echo set_checkbox('insert_group_admin',1);?> class="tooltip_trigger"
									title="If checked, the user group is set as an 'Admin' group."/>
							</li>
						</ul>
					</fieldset>

					<fieldset>
						<legend>Insert New Group</legend>
						<ul>
							<li>
								<label for="submit">Insert Group:</label>
								<input type="submit" name="insert_user_group" id="submit" value="Submit" class="link_button large"/>
							</li>
						</ul>
					</fieldset>
				<?php echo form_close();?>
			</div>
		</div>
	</div>	
	
	<!-- Footer -->  
	<?php $this->load->view('includes/footer'); ?> 
</div>

<!-- Scripts -->  
<?php $this->load->view('includes/scripts'); ?> 

</body>
</html>