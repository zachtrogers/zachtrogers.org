<?php
	$app->get("/portfolio", function () use ($app, $query) {
	  $results = $query('SELECT title, date, languages, description, image, siteUrl, url, id FROM ztr_portfolio ORDER BY id DESC');
    $status = '';
    if (isset($flash['status'])) {
      $status = $flash['status'];
   	}
    $app->render('../templates/public/portfolio.php', array('results' => $results, 'status' => $status));
	});