<?php
	include_once 'Gallery.php';

	$gallery = new Gallery();	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>CSS3 Gallery & Lightbox</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/demo.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	
	<div class="container">
		<header>
			<h1>CSS3 <span>Gallery & Lightbox</span></h1>
			<h2>A simple CSS-only Gallery & lightbox</h2>
		</header>

		<section>
			<ul class="lb-album">

			<?php
				foreach($gallery->getImages() as $index => $image)	{
					$id 	= 	"image-$index";
					$href	=	"#$id";
					$full	=	$image['full'];
					$thumb	=	$image['thumb'];

			?>

				<li>
					<a href="<?php echo $href;?>">
						<img src="<?php echo $thumb;?>" alt="<?php echo $id;?>">
						
					</a>
					<div class="lb-overlay" id="<?php echo $id;?>">
						<img src="<?php echo $full;?>" alt="<?php echo $id;?>" />
						
						<a href="#page" class="lb-close">x Close</a>
					</div>
				</li>					
			
			<?php
				}
			?>

			</ul>
		</section>
	</div>
</body>
</html>