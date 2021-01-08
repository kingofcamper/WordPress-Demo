<?php get_header();

	while (have_posts()) {
		the_post(); 
?>
		<header class="site-header">
    <div class="container">
      <h1 class="school-logo-text float-left"><a href="<?php echo site_url() ?>"><strong>Fictional</strong> University</a></h1>
      <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
      <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
      <div class="site-header__menu group">
        <nav class="main-navigation">
          <ul>
            <li><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
            <li><a href="#">Programs</a></li>
            <li><a href="<?php echo site_url('/event') ?>">Events</a></li>
            <li><a href="#">Campuses</a></li>
            <li><a href="<?php echo site_url('/blog') ?>">Blog</a></li>
          </ul>
        </nav>
        <div class="site-header__util">
          <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
          <a href="#" class="btn btn--small  btn--dark-orange float-left">Sign Up</a>
          <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        </div>
      </div>
    </div>
  </header>
  <?php
  pageBanner(array(
    'title' => 'Hello thre is the title',
    'subtitle' => 'Hi this is sub'
  ));
  ?>
  <div class="container container--narrow page-section">
  	<?php 
  		$the_parent = wp_get_post_parent_id(get_the_ID());
  		if($the_parent){
  	?>

    <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($the_parent); ?>"><i class="fa fa-home" aria-hidden="true"></i> Back To <?php  echo get_the_title($the_parent); ?></a> <span class="metabox__main"><?php the_title(); ?> </span></p>
    </div>
<?php } ?>

    <?php
    $testArray = get_pages(array(
    	'child_of' => get_the_ID(),
    ));
    if($the_parent or $testArray){ ?>
    <div class="page-links">
      <h2 class="page-links__title"><a href="<?php echo get_permalink($the_parent); ?>"><?php echo get_the_title($the_parent); ?></a></h2>
      <ul class="min-list">
      	<?php 
      		if($the_parent){
      			$findChildrenOf = $the_parent;
      		}
      		else{
      			$findChildrenOf = get_the_ID();
      		}
	      		wp_list_pages(array(
	      			'title_li' => NULL,
	      			'child_of' => $findChildrenOf,
	      			'sort_column' => 'menu_order',
	      		))
      	?>
        
      </ul>
    </div>
<?php } ?>
	
    <div class="generic-content">
      <?php get_search_form(); ?>
    </div>

  </div>

  <div class="page-section page-section--beige">
    <div class="container container--narrow generic-content">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>

      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
    </div>
  </div>
<?php }
	get_footer();
?>
