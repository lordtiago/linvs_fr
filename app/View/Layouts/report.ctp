<?php header("Content-type: application/pdf");  ?>
<html>
    <head>
        <meta name="robots" content="noindex,nofollow">
	<?php echo $this->Html->charset(); ?>
	<?php
		echo $this->Html->css('bootstrap');
        echo $this->Html->css('report', array('media' => 'all'));
		echo $scripts_for_layout;
	?>
    </head>
    <body>
        <div class="sheet">
            <?php echo $content_for_layout; ?>
        </div>
    </body>
</html>
