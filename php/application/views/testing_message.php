<!doctype html>
<html lang="en">
<head>Testing</head>
<body>
<?php
$env_var = getenv('OPENSHIFT_HOMEDIR')."/app-root/repo/php/application/views/ostrich.jpg";
echo '<img src="'.$env_var.'" alt="Ostrich">' . "test";
?>
</body>
</html>
