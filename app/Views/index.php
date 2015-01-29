<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TEST</title>
		<link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    </head>
    <body>
		<script type="text/javascript">
			var Models = [
				<?php foreach ($pictures as $pic): ?>
					{
						url: "<?= $pic->url; ?>",
						category: {name: "<?=$pic->category->name; ?>", id: <?=$pic->category->id; ?>}
					},
				<?php endforeach; ?>
			];
		</script>
		<script type="text/javascript" src="/bower_components/jquery/dist/jquery.min.js"></script>
		<script type="text/javascript" src="/bower_components/angular/angular.min.js"></script>
		<script type="text/javascript" src="/assets/js/app.js"></script>
	</body>
</html>
