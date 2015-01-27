<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TEST</title>
    </head>
    <body>
		test
		<?php foreach ($categories as $cat): ?>
			<div><?= $cat->name; ?></div>
		<?php endforeach; ?>
    </body>
</html>
