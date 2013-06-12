<form method="POST" action="upload_test.php" NAME="myform" ENCTYPE="multipart/form-data">
<input type="file" name="file">
<input type="submit" name="submit">
</form>
<?php

echo "<pre>";
print_r($_FILES);
echo "</pre>";

?>
