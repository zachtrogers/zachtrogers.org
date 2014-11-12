<?php

	$app->post("/portfolioDelete", function () use ($app, $query) {
		$id = $app->request()->post('id');
		$image = $app->request()->post('image');
		$results = $query('DELETE FROM ztr_portfolio WHERE id = \'' . $id . '\'');
		$path = "/var/www/vhosts/zachtrogers.org/dev.zachtrogers.org/img/portfolio/" . $image;
		@unlink($path);
		$app->flash('status', 'Portfolio Entry Deleted');
		$app->redirect('/#portfolio');
  });

	$app->get("/portfolioDelete/:url", $authenticate($app), function ($url) use ($app, $query) {
		$results = $query('SELECT title, url, id, image FROM ztr_portfolio WHERE url =\'' . $url . '\'');
		$results = $results->fetch_assoc();
		$id = $results['id'];
		$image = $results['image'];
		$url = $results['url'];
		$title = $results['title'];
		$flash = $app->view()->getData('flash');
		$status = '';
		if (isset($flash['status'])) {
        $status = $flash['status'];
     }
	  $app->render('../templates/admin/portfolio/portfolioDelete.php', array('results' => $results, 'status' => $status, 'title' => $title, 'url' => $url, 'id' => $id, 'image' => $image));
 	});