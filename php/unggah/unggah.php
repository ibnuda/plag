<?php

include_once './unggah.class.php';

$unggah = new Unggah();
?>

<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<form role="form">
				<!--div class="form-group">
					 <label for="exampleInputEmail1">Email address</label><input class="form-control" id="exampleInputEmail1" type="email" />
				</div>
				<div class="form-group">
					 <label for="exampleInputPassword1">Password</label><input class="form-control" id="exampleInputPassword1" type="password" />
				</div-->
				<div class="form-group">
					 <label for="exampleInputFile">Unggah Berkas</label><input id="exampleInputFile" type="file" />
					<p class="help-block">
                        Ukuran berkas maksimal 100kb.<br>
                        Jenis berkas yang didukung adalah plain text (.txt).<br>
					</p>
				</div>
				<!--div class="checkbox">
					 <label><input type="checkbox" /> Check me out</label>
                </div--> 
                <button type="submit" class="btn btn-default">Unggah</button>
			</form>
		</div>
	</div>
</div>
