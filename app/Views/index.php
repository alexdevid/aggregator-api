<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TEST</title>
    </head>
    <body>
		<?php foreach ($categories as $cat): ?>
			<div style="float: left;">
				<h3><?= $cat->name; ?> (<?= count($cat->pictures); ?>)</h3>
				<ol>
					<?php foreach ($cat->pictures as $pic): ?>
						<li><a href="<?= $pic->url; ?>" target="blank"><?= $pic->url; ?></a></li>
					<?php endforeach; ?>
				</ol>
			</div>
		<?php endforeach; ?>
    </body>
</html>
