<?php
if(isset($_REQUEST['2dehands'])){
	$shDAO = DAOFactory::getSecondHandDAO();
	$secondHand = $shDAO->load($_REQUEST['2dehands']);
	if($secondHand->active)
	{
		echo 'actief';
		$info="Meer informatie over 2dehands item: ".$secondHand->title;
	}
} 
?>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group col-lg-4">
                <?php 
		        	check_label('contact_name',$required,$errors,$lang);
				?>
                  <input type="text" name="contact_name" class="form-control" id="contact_name"
                  	value="<?php if(isset($_SESSION['contact_name'])){echo $_SESSION['contact_name'];}?>" 
                  >
                </div>
                <div class="form-group col-lg-4">
                  <?php 
		        	check_label('contact_email',$required,$errors,$lang);
					?>
                  <input type="text" name="contact_email" class="form-control" id="contact_email"
                  	value="<?php if(isset($_SESSION['contact_email'])){echo $_SESSION['contact_email'];}?>" 
                  >
                </div>
                <div class="form-group col-lg-4">
                  <?php 
		        	check_label('contact_phone',$required,$errors,$lang);
					?>
                  <input type="text" name="contact_phone" class="form-control" id="contact_phone"
                  	value="<?php if(isset($_SESSION['contact_phone'])){echo $_SESSION['contact_phone'];}?>" 
                  >
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-lg-12">
                  <?php 
		        	check_label('contact_message',$required,$errors,$lang);
				   ?>
                  <textarea name="contact_message" class="form-control" rows="6" id="contact_message"><?php if(isset($_SESSION['contact_message'])){echo $_SESSION['contact_message'];}else{if(isset($info)){echo $info;}}?>
                  </textarea>
                </div>
                <div class="form-group col-lg-12">
                  <input type="hidden" name="save" value="contact">
                  <button type="submit" name="send" class="btn btn-primary"><?php echo $lang['lbl_send'];?></button>
                </div>
              </form>
              <?php
				function check_label($field,$required,$errors,$lang){
					if(isset($required[$field]) || isset($errors[$field])){
						echo '<label style="color:red" for="input1">'. $lang[$field] .'</label>';
					}else{
						echo '<label for="input1">'. $lang[$field] .'</label>';
					}
				 }
				
				?>