<section id="portfolios" class="section">

    <div class="container">
        <h1 class="section-title">ANGKATAN <?=$subpage;?></h1>
        <div class="row">
            <div class="col-md-12">
                <div class="controls text-center">
                    <a class="filter btn btn-common active" data-filter="all">All</a>
                    <a class="filter btn btn-common" data-filter=".seni">Seni</a>
                    <a class="filter btn btn-common" data-filter=".craft">Craft</a>
                    <?php
                      if($subpage < 2018) { ?>
                        <a class="filter btn btn-common" data-filter=".komputer">Komputer</a>
                    <?php }
                    ?>
                    <a class="filter btn btn-common" data-filter=".desain">Desain</a>
                </div>
            </div>

            <div id="portfolio" class="row">

							<?php
								if (!empty($alumni->result())) {
								foreach($alumni->result() as $row){?>

                <a href="<?=base_url('alumni/'.$row->id);?>" class="col-sm-6 col-md-4 col-lg-3 mb-3 mix <?=$row->group;?>" style="display: inline-block;" data-bound="">
                  <div class="team-item">
                    <figure class="team-profile">
                        <img src="<?=base_url('image/alumni/'.$row->img);?>" alt="<?=$row->firstname.' '.$row->lastname;?>">
                    </figure>
                    <div class="info">
                        <h2><?=$row->firstname.' '.$row->lastname;?></h2>
                        <div class="orange-line"></div>
                        <p><?=$row->group;?></p>
                    </div>
                  </div>
                </a>

							<?php
								}
							}?>

            </div>
        </div>
    </div>

</section>
