<?php

	$app->post("/portfolioEdit/", function () use ($app, $query) {
    $title = addslashes($app->request()->post('title'));
    $url = $app->request()->post('url');
    $date = addslashes($app->request()->post('date'));
    $languages = addslashes($app->request()->post('languages'));
    $description = addslashes($app->request()->post('description'));
    $siteUrl = addslashes($app->request()->post('siteUrl'));
		$image = addslashes($app->request()->post('image'));
		$id = addslashes($app->request()->post('id'));
		if($_FILES["fileName"]["tmp_name"]){
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
	    $path = "/var/www/vhosts/zachtrogers.org/dev.zachtrogers.org/img/portfolio/" . $image;
	    @unlink($path);
	    $image = $nameDisplay;
	  }
		$results = $query('UPDATE ztr_portfolio SET title= \'' . $title . '\', url= \'' . $url . '\', date= \'' . $date . '\', languages= \'' . $languages . '\', description= \'' . $description . '\', siteUrl= \'' . $siteUrl . '\', image= \'' . $image . '\' WHERE id = \'' . $id . '\'');
		$app->flash('status', 'Portfolio Entry Updated');
		$app->redirect('/portfolioEdit/' . $url . '');

		if($results != "error"){
			$app->flash('status', 'Portfolio Entry Updated');
			$app->redirect('/portfolioEdit/' . $url . '');
		}else{
			echo $results;
		}
  });

	$app->get("/portfolioEdit/:url", $authenticate($app), function ($url) use ($app, $query) {
		$results = $query('SELECT title, date, languages, description, image, siteUrl, url, id FROM ztr_portfolio WHERE url =\'' . $url . '\'');
		$results = $results->fetch_assoc();
		$title = $results['title'];
		$url = $results['url'];
		$date = $results['date'];
		$languages = $results['languages'];
		$description = $results['description'];
		$image = $results['image'];
		$siteUrl = $results['siteUrl'];
		$id = $results['id'];
		$flash = $app->view()->getData('flash');
		$status = '';
		if (isset($flash['status'])) {
        $status = $flash['status'];
     }
	  $app->render('../templates/admin/portfolio/portfolioEdit.php', array('results' => $results, 'status' => $status, 'title' => $title, 'date' => $date, 'languages' => $languages, 'description' => $description, 'image' => $image, 'url' => $url, 'siteUrl' => $siteUrl, 'id' => $id));
 	});