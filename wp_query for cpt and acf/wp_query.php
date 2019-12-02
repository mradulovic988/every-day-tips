<!-- =========================
	Ubaci while petlju u if
========================== -->

<section class="medium-padding100">
		<div class="container">
			<div class="row">
				<?php $loop = new WP_Query (array(
							'post_type' => 'info',
							'orderby' => 'post_id',
							'order' => 'ASC'
						)); ?>
				<?php while ($loop -> have_posts()) : $loop -> the_post(); ?>

				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					
					<div class="crumina-module crumina-info-box info-box--standard-hover">
						<div class="info-box-image">
								<?php if (has_post_thumbnail()) {
									the_post_thumbnail();
								} ?>
							</div>

							<div class="info-box-content">
								<a href="#" class="h5 info-box-title"><?php the_title(); ?></a>
								<div class="info-box-text"><?php the_content(); ?>
								</div>
							</div>

							<a href="#" class="btn-next">
								<svg class="utouch-icon icon-hover utouch-icon-arrow-right-1"><use xlink:href="#utouch-icon-arrow-right-1"></use></svg>
								<svg class="utouch-icon utouch-icon-arrow-right1"><use xlink:href="#utouch-icon-arrow-right1"></use></svg>
							</a>
					</div>
				</div>
				<?php endwhile; ?><?php wp_reset_query(); ?>
			</div>
		</div>
</section>

<!-- ... end Info Boxes -->