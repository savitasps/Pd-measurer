<!DOCTYPE html>


<html itemscope itemtype="http://schema.org/Blog">


	<head>


		<meta charset="UTF-8">


		


		<meta property="og:type" content="article" />


		


		<meta property="og:site_name" content="<?php echo $_GET['title'];?>"/>


		


		<meta name="description" content="<?php echo $_GET['descr'];?>" data-page-subject="true" >


		<meta property="og:description" content="<?php echo $_GET['descr'];?>">


		


		<meta itemprop="name" content="<?php echo $_GET['title'];?>">


		<meta property="og:title" content="<?php echo $_GET['title'];?>">


		


		<meta itemprop="image" content="<?php echo $_GET['img'];?>">


		<meta property="og:image" content="<?php echo $_GET['img'];?>">	


					


		<?php if ( $_SERVER['HTTP_USER_AGENT'] !== 'LinkedInBot/1.0 (compatible; Mozilla/5.0; Jakarta Commons-HttpClient/3.1 +http://www.linkedin.com)' && $_SERVER['HTTP_USER_AGENT'] !== 'Mozilla/5.0 (Windows NT 6.1; rv:6.0) Gecko/20110814 Firefox/6.0 Google (+https://developers.google.com/+/web/snippet/)' && $_SERVER['REMOTE_ADDR'] !== '108.174.2.200' && $_SERVER['REMOTE_ADDR'] !== '66.249.81.90' && $_SERVER['REMOTE_ADDR'] !== '31.13.97.116' ) {


			echo '<meta http-equiv="refresh" content="0;url='.$_GET['url'].'">';


		} ?>


		


		<title><?php echo $_GET['title'];?></title>


		


		<style type="text/css">     


			body {background:#fff;font-family: arial,helvetica,lucida,verdana,sans-serif;margin:0;padding:0;}h1 {background:#f5f5f5;border-top:1px solid #eee;border-bottom:1px solid #eee;margin-top:10%;padding:50px;font-size:1.4em;font-weight:normal;text-align:center;color:#000;}


		</style>


		


	</head>


	


	<body>	


		<h1>contacting ...</h1>


	</body>


	


</html>