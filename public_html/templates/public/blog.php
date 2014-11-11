<? require 'templates/header.php' ?>

	<div id="wrapper" class="noVideo">
      <div class="background">
					<article id="blog">
						<h3>Blog</h3>
						<section>
							<?if (!empty($user)):?>
              	<button title="New" type="button" onclick="location.href='/blogNew'">
		            <span>
		              <span>
		                <span>
		                  New Entry
		                </span>
		              </span>
		            </span>
		          </button>
					    <?endif;?>
							<?if(!empty($status)):?>
							<p class="status"><?=$status?></p>
							<?endif;?>
						    <?php 
								while ($row = $results->fetch_assoc()) {
									?>
										<h2><a href="/blog/<?php echo $row['url']?>"><?php echo $row['title']?><a/></h2>
										<div class="fb-like" data-href="http://www.zachtrogers.org/blog/<?php echo $row['url']?>" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
										<?if (!empty($user)):?>
		                	<button title="Edit" type="button" onclick="location.href='/blogEdit/<?php echo $row['url']?>'">
				                <span>
				                  Edit
				                </span>
					          </button>
										<button title="Delete" type="button" onclick="location.href='/blogDelete/<?php echo $row['url']?>'">
			                <span>
			                  Delete
			                </span>
					          </button>
		                <?endif;?>
									<div>
										<?php echo $row['post']?>
									</div>
									<div>
										<span><?php echo date("l, F jS, Y @ H:ia",strtotime($row['dateSubmitted']));?></span>
										<span>By: <?php echo $row['displayName']?></span>
									</div>
									<div class="fb-comments" data-href="http://www.zachtrogers.org/blog/<?php echo $row['url']?>" data-numposts="3" data-order-by="reserve_time" data-width="100%" data-colorscheme="light"></div>
									<?php
								}
							?>
						</section>
					</article>
				<? require 'templates/public/menu.php' ?>
				<? require 'templates/footer.php' ?>