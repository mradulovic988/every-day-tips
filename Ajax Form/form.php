<form action="mailer.php" method="post" id="formName">
	<div id="frmContact">
		<div class="notification">
			<p class="notification_desc"><?php _e('Please fill in the fields below and submit a ticket, and our team will get back to you as soon as possible.'); ?></p>
		</div>
		<div>
			<label style="padding-top:20px;"></label><span id="userName-info" class="info"></span><br/>
			<input type="text" name="userName" id="userName" class="demoInputBox form-control" placeholder="Name" required>
		</div>
		<div>
			<label></label><span id="userEmail-info" class="info"></span><br/>
			<input type="text" name="userEmail" id="userEmail" class="demoInputBox form-control" placeholder="Email" required>
		</div>
		<div>
			<label></label><span id="subject-info" class="info"></span><br/>
			<input type="text" name="subject" id="subject" class="demoInputBox form-control" placeholder="Subject" required>
		</div>
		<div>
			<label></label><span id="content-info" class="info"></span><br/>
			<textarea name="content" id="content" class="demoInputBox form-control" cols="60" rows="6" placeholder="Message" required></textarea>
		</div>
		<div class="button_wrapper">
			<button name="submit" class="btnAction btn btn-outline-success" onClick="sendContact();"><?php _e('Send'); ?></button>
			<a href="https://www.fixrunner.com/login" target="_blank" class="btnAction btn btn-outline-info login"><?php _e('Login'); ?></a>
		</div>
		<img class="ajax-loader" src="<?php echo plugins_url( '../assets/img/ajax-loader.gif', __FILE__ ); ?>"/>
	</div>
	<div id="mail-status"></div>
</form>

