<?php

?>
<style>
	#image_container{
		margin: 20px 0 0 20px;
		width:640px;
		height:360px;
		overflow:hidden;
		border:30px solid grey;
		background-color:red;
	}    
	#image_container img{
	}
</style>
<script>
	var image = '';
	var originalWidth = 0, destWidth = 640;
	var originalHeight = 0, destHeight = 360;
	var ratio = 0;
	function go(){
		image = document.getElementById('theImage');
		var newImg = new Image();
		newImg.src = image.src;
		image.width = destWidth;
	};
	function zoom_less(quantity){
		image.width -= quantity;
	}
	function zoom_more(quantity){
		image.width += quantity;
	}
	function move_up(quantity){ 
		image.style.marginTop = (parseInt(image.style.marginTop) - quantity) + 'px';
	}  
	function move_down(quantity){
		image.style.marginTop = (parseInt(image.style.marginTop) + quantity) + 'px';
	} 
	function move_left(quantity){ 
		image.style.marginLeft = (parseInt(image.style.marginLeft) - quantity) + 'px';
	}    
	function move_right(quantity){ 
		image.style.marginLeft = (parseInt(image.style.marginLeft) + quantity) + 'px';
	}
	function download(){
		var url = 'download.php?file='+image.src+'&marginLeft='+image.style.marginLeft+'&marginTop='+image.style.marginTop+'&width='+image.width;
		window.open(url,'_blank');
	}
</script>
<table>
	<tr>
		<td>
			<div id="image_container">
				<img id="theImage" src="<?php echo $imageFile;?>" style="margin-top:0;margin-left:0;"/>
			</div>
		</td>
		<td>
			<div>
				<table>
					<tr>
						<td colspan="3" style="text-align:center">
							<input type="button" value="Zoom + +" onclick="zoom_more(10);"/><br />
							<input type="button" value="Zoom +" onclick="zoom_more(1);"/><br />
							<input type="button" value="Zoom -" onclick="zoom_less(1);"/><br />
							<input type="button" value="Zoom - -" onclick="zoom_less(10);"/><br /><br />
						</td>
					</tr>
					<tr>
						<td></td>
						<td style="text-align:center;"><input type="button" value="↑↑" onclick="move_up(10);"/></td>
						<td></td>
					</tr> 
					<tr>
						<td></td>
						<td style="text-align:center;"><input type="button" value="↑" onclick="move_up(1);"/></td>
						<td></td>
					</tr>
					<tr>
						<td style="text-align:center;"><input type="button" value="←←" onclick="move_left(10);"/><input type="button" value="←" onclick="move_left(1);"/></td> 
						<td></td>
						<td style="text-align:center;"><input type="button" value="→" onclick="move_right(1);"/><input type="button" value="→→" onclick="move_right(10);"/></td>
					</tr> 
					<tr>
						<td></td>
						<td style="text-align:center;"><input type="button" value="↓" onclick="move_down(1);"/></td>
						<td></td>
					</tr>  
					<tr>
						<td></td>
						<td style="text-align:center;"><input type="button" value="↓↓" onclick="move_down(10);"/></td>
						<td></td>
					</tr>
					<tr>
						<td colspan="3" style="text-align:center">
							<br /><br />
							<input type="button" value="Télécharger" onclick="download();"/>
						</td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
</table>
<hr />
<script>
	go();
</script>