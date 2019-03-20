<?php get_header();?>
<div class="main-heading">
	<h1><?php the_title(); ?></h1>
</div>

<?php $args = array(
	'show_option_all'    => '',
	'show_option_none'   => __('No categories'),
	'orderby'            => 'name',
	'order'              => 'ASC',
	'style'              => 'list',
	'show_count'         => 0,
	'hide_empty'         => 1,
	'use_desc_for_title' => 1,
	'child_of'           => 0,
	'feed'               => '',
	'feed_type'          => '',
	'feed_image'         => '',
	'exclude'            => '1',
	'exclude_tree'       => '',
	'include'            => '',
	'hierarchical'       => true,
	'title_li'           => __( '' ),
	'number'             => NULL,
	'echo'               => 1,
	'depth'              => 0,
	'current_category'   => 0,
	'pad_counts'         => 0,
	'taxonomy'           => 'category',
	'walker'             => 'Walker_Category',
	'hide_title_if_empty' => false,
	'separator'          => ' ',
);
?>
<ul class="categoriess">
<?php wp_list_categories( $args ); ?>
</ul>

<?php get_sidebar();?>

<?php echo get_the_excerpt( $post );?> <!--lr5 n6-->


<aside>
	<nav class="aside-posts-navigation">
		<? wp_nav_menu(array('menu' => 'aside-posts', 'menu_class' => 'aside-posts')); ?>
	</nav>	
</aside>

<section>
	<?php while (have_posts()): the_post();?>
		<?php the_content();?>
		<?php
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		?>
	<?php endwhile; ?>
</section>

<?php $val_field1 = get_post_meta($post->ID,'field1', true);
	  $val_field2 = get_post_meta($post->ID,'field2',true);


print_r($val_field1);
echo "<br>";
print_r($val_field2);
?>

<br>
<br>

<?php previous_post_link('Назад к %link --'); ?>

<?php next_post_link('Вперед к %link'); ?>



<?php get_footer(); ?>