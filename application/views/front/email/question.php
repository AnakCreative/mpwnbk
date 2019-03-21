<div style="margin:0px auto; color: #555555; line-height: 120%;min-width: 320px;max-width: 600px;width: 100%;">
	<div style="font-size: 12px; line-height: 14px; color: #555555; margin: 0px auto; border: 1px solid #BBBBBB; padding: 15px;">
		<p style="margin: 0; font-size: 12px; line-height: 14px;">
			<span style="font-size: 14px; line-height: 16px;">Nama : <strong> <?=(!empty($name)) ? $name : '';?></strong></span>
		</p>
		<p style="margin: 0; font-size: 12px; line-height: 14px;">
			<span style="font-size: 14px; line-height: 16px;">Email : <strong> <?=(!empty($email)) ? $email : '';?></strong></span>
		</p>

		<br><br>

		<p style="margin: 0; font-size: 12px; line-height: 14px;">
			<span style="font-size: 14px; line-height: 16px;"><?=(!empty($message)) ? $message : '';?></span>
		</p>
	</div>
</div>
