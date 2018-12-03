
	<div id="all">
		
		<div class="staff">
			<label> Username</label>
			<input id="zz123" type="text" name="" disabled="disabled" >
			<label> Phone </label>
			<input id="zz124" type="text" name="" disabled="disabled" >
			<a onclick="appear()" href="#"> Thay đổi mật khẩu ->  </a>
			<div id="avatar">
				
			</div>

		</div>
		</div>

	<div id="changepw">
		<form method="POST">
		
			<div  class="staff">
				
				<label> Mật khẩu cũ</label>
				<input id="1" type="text" name="old_pw"  placeholder="" >
				<label> Mật khẩu mới  </label>
				<input id="new_pw" type="text" name="new_pw"  placeholder="" >
				<label> Nhập lại mật khẩu mới  </label>
				<input id="renew_pw" type="text" name="renew_pw"  placeholder="" >
				<input type="submit" name="submit" value="OK" onclick="mk()">
				<input id="zz125" type="text" name="" disabled="disabled" value="<?php echo $al ?>">
				
			</div>
		</form>

	</div>




	
