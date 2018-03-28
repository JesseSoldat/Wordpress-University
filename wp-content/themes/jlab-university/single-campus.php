<?php get_header(); ?>


<?php
while(have_posts()) {
  the_post(); 
  pageBanner();
  ?>

  <div class="container container--narrow page-section">

    <div class="metabox metabox--position-up metabox--with-home-link">
      <p>
        <a class="metabox__blog-home-link" 
          href="<?php echo get_post_type_archive_link('campus'); ?>">
          <i class="fa fa-home" aria-hidden="true"></i> 
          All Campuses
        </a> 
        <span class="metabox__main">
          <?php the_title(); ?>
        </span>
      </p>
    </div>

    <div class="generic-content"><?php the_content(); ?></div>

    <div class="acf-map">
      <?php 
          $mapLocation = get_field('map_location');
      ?>
        <div  class="marker" 
          data-lat="<?php echo $mapLocation['lat']; ?>" 
          data-lng="<?php echo $mapLocation['lng']; ?>"
        >
        <h4> 
          <?php the_title(); ?>
        </h4>
        <hr>
        <?php echo $mapLocation['address']; ?>
        <br>
      </div>
    </div>

    <?php 
      //$relatedProfessors------------------------
      $relatedProfessors = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'professor',
        'orderby' => 'title',
        'order' => 'ASC',
        'meta_query' => array(
          array(
            'key' => 'related_programs',
            'compare' => 'LIKE',
            'value' => '"' . get_the_ID() . '"'
          )
        )
      ));

      if($relatedProfessors->have_posts()) {
        echo '<hr class="section-break">';
        echo '<h4 class="headline headline--medium">' . get_the_title() . ' Professors</h4><br>';
        echo '<ul class="professor-cards"';
        while($relatedProfessors->have_posts()) {
          $relatedProfessors->the_post();
      ?>
          <li class="professor-card__list-item">
            <a class="professor-card"
              href="<?php the_permalink(); ?>"
            > 
              <img src="<?php the_post_thumbnail_url('professorLandscape') ?>" 
                alt="professor" 
                class="professor-card__image"
              >
              <span class="professor-card__name">
                <?php the_title(); ?>
              </span>
            </a>
          </li>

      <?php
        }
        echo '</ul>';
      }
      //clean up after custom query to reset GLOBAL post object
      //so that functions like the_ID(); and the_title(); will get the id and title for the page and not the custom query
      //reset to default URL query
      wp_reset_postdata();

      //$homepageEvents----------------------------------------
      $today = date('Ymd');
      $homepageEvents = new WP_Query(array(
        'posts_per_page' => 2,
        'post_type' => 'event',
        'meta_key' => 'event_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
          array(
            'key' => 'event_date',
            'compare' => '>=',
            'value' => $today,
            'type' => 'numeric'
          ),
          array(
            'key' => 'related_programs',
            'compare' => 'LIKE',
            'value' => '"' . get_the_ID() . '"'
          )
        )
      ));

      if($homepageEvents->have_posts()) {
        echo '<hr class="section-break">';
        echo '<h4 class="headline headline--medium">Upcoming ' . get_the_title() . ' Events</h4><br>';

        while($homepageEvents->have_posts()) {
          $homepageEvents->the_post();
          get_template_part('template-parts/content', 'event');
          echo '<br><br>'; 
        }
      }
        //clean up after custom query
        wp_reset_postdata();
    ?>

  </div>
<?php 
}
?>

<?php get_footer(); ?>
