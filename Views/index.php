<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body style="width: 800px; margin: 50px auto;">
		<?php foreach ($pictures as $picture): ?>
			<img src="<?= $picture->url; ?>" title="<?= $picture->category->name; ?>" style="width: 100%; margin-bottom: 30px;"/>
		<?php endforeach; ?>
    </body>
</html>
