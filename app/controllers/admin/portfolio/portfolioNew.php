<?php

	$app->post("/portfolioNew", function () use ($app, $query) {
    $title = addslashes($app->request()->post('title'));
    $url = addslashes($app->request()->post('url'));
    $date = addslashes($app->request()->post('date'));
    $languages = addslashes($app->request()->post('languages'));
    $description = addslashes($app->request()->post('description'));
    $siteUrl = addslashes($app->request()->post('siteUrl'));
    if ($_FILES){
	    $target = "/var/www/vhosts/zachtrogers.org/dev.zachtrogers.org/img/portfolio/";
	    $nameOrig = $_FILES['fileName']['name'];
	    $nameDisplay = date("YmdHis").'_'.$nameOrig;
	    $tempName = ($_FILES["fileName"]["tmp_name"]);
	    $name = $target . $nameDisplay;
	    $userLink = "/img/portfolio/" . $nameDisplay;
	    if (($_FILES["fileName"]["type"] == "image/gif")
	      || ($_FILES["fileName"]["type"] == "image/jpeg")
	      || ($_FILES["fileName"]["type"] == "image/png" )
	      || ($_FILES["fileName"]["type"] == "image/jpg" )
	      && ($_FILES["fileName"]["size"] < 31457280)){
	      move_uploaded_file($tempName, $name);
	    }
	  }else{
	  	$nameDisplay = '';
	  }
		$image = $nameDisplay;
		$results = $query('INSERT INTO ztr_portfolio (title, url, date, languages, description, image, siteUrl) VALUES ("' . $title . '", "' . $url . '", "' . $date . '", "' . $languages . '", "' . $description . '", "' . $image . '", "' . $siteUrl . '")');
		if($results != "error"){
			$app->redirect('portfolioEdit/' . $url . '');
		}else{
			echo $results;
		}
  });

	$app->get("/portfolioNew", $authenticate($app), function () use ($app) {
	    $app->render('../templates/admin/portfolio/portfolioNew.php');
 	});