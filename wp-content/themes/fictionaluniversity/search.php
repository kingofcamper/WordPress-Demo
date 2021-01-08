<?php 

get_header(); 
pageBanner(array(
    'title' => 'Search Results',
    'subtitle' => 'Your search for &ldquo;' . get_search_query() . '&rdquo;'
  ));
?>

<div class="container container--narrow page-section">
  <?php 

  if(have_posts()){
    while(have_posts()){
    the_post(); 
    get_template_part('template-parts/content', get_post_type());
    }
    echo paginate_links();
  } else{
    echo '<h2 class="headlin headline--small-plus">No results match this search.</h2>';
  }
  
  get_search_form();

  ?>


</div>

<?php
get_footer();

?>