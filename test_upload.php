<form action='test_upload.php' enctype="multipart/form-data" method="post">
	<input type='file' name='file_test' />
	<input type='submit' />
</form>


<?php

var_dump($_FILES);exit;

?>

