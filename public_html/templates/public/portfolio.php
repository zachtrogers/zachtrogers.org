<article id="portfolio">  
    <a name="portfolio"></a>
    <h3>Portfolio</h3>
    <p>Here is some of my most recent work, click on each one for more information.</p>
    <div>
    <?if (!empty($userId)):?>
        <button title="New" type="button" onclick="location.href='/portfolioNew'">
            <span>
                New Entry
            </span>
          </button>
        <?endif;?>
            <?if(!empty($status)):?>
            <p class="status"><?=$status?></p>
            <?endif;?>
            <div>
            <?php 
                while ($row = $results->fetch_assoc()){
            ?>
                    <div>
                        <h2><?php echo $row['title']?></h2>
                        <?if (!empty($userId)):?>
                            <button title="Edit" type="button" onclick="location.href='/portfolioEdit/<?php echo $row['url']?>'">
                                <span>
                                  Edit
                                </span>
                            </button>
                            <button title="Delete" type="button" onclick="location.href='/portfolioDelete/<?php echo $row['url']?>'">
                                <span>
                                    Delete
                                </span>
                            </button>
                        <?endif;?>
                        <div>
                            <h4>Date Created</h4>
                            <p><?php echo $row['date']?></p>
                        </div>
                        <div>
                            <h4>Project Description</h4>
                            <p><?php echo $row['description']?></p>
                        </div>
                        <div>
                            <h4>Languages Used</h4>
                            <p><?php echo $row['languages']?></p>
                        </div>
                        <a href="<?php echo $row['siteUrl'];?>" target="_blank">Visit Site</a>
                        <img class="portfolioImage" src="/img/portfolio/<?php echo $row['image']?>">
                    </div>
                    <?php
                }
            ?>
            </div>
    </div>
</article>