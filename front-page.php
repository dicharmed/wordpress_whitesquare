<?php get_header(); ?>
<?php get_sidebar();?>
<aside>
	<nav class="aside-list-of-pages-navigation">
		<? wp_nav_menu(array('menu' => 'aside-list-of-pages', 'menu_class' => 'aside-list-of-pages')); ?>
	</nav>	
</aside>


<section>
	<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; endif; ?>
</section>

<div style="text-align:center; margin-bottom: 20px;">
	<?php previous_post_link('Назад к  %link --'); ?>
	<?php next_post_link('Вперед к %link '); ?>
</div>



<ul><!--exlude Categories by ID-->
<?php
global $post;
$args = array( 'numberposts' => -1, 'category' =>"-5,-1", 'orderby' => 'title', 'order'=> 'ASC');
$myposts = get_posts( $args );
foreach( $myposts as $post ){ setup_postdata($post);
	?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php
}
wp_reset_postdata();
?>
</ul>

<br>

<ul>//exlude Authors by ID-->
<?php
global $post;
$args = array( 'numberposts' => -1, 'author' =>"-1", 'orderby' => 'title', 'order'=> 'ASC');
$myposts = get_posts( $args );
foreach( $myposts as $post ){ setup_postdata($post);
	?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php
}
wp_reset_postdata();
?>
</ul>

<br>

<ul>//exlude Authors by ID-->
<?php
global $post;
$args = array( 'numberposts' => -1, 'exclude' =>"119, 198, 66, 82", 'orderby' => 'title', 'order'=> 'ASC');
$myposts = get_posts( $args );
foreach( $myposts as $post ){ setup_postdata($post);
	?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php
}
wp_reset_postdata();
?>
</ul>
<br>

<ul>//by 2016 Year-->
<?php
global $post;
$args = array( 'numberposts' => -1, 'date_query' =>array(array('year'=>"2016")), 'orderby' => 'author');
$myposts = get_posts( $args );
foreach( $myposts as $post ){ setup_postdata($post);
	?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php
}
wp_reset_postdata();
?>
</ul>
<br>

<ul>//by WorkTime-->
<?php
global $post;
$args = array( 'numberposts' => -1, 'date_query' =>array(
																array(
																	'hour'      => 8, // с 8 часов утра (24-часовой формат времени)
																	'compare'   => '>=', // больше либо равно
																),
																array(
																	'hour'      => 17,
																	'compare'   => '<=', // меньше либо равно
																),
																array(
																	'dayofweek' => array( 1, 5 ), // дни недели, 1 - понедельник, 5 - пятница
																	'compare'   => 'BETWEEN'
																),
																'relation' => 'AND' // этот параметр равен AND по умолчанию и поэтому его можно не указывать
														), 'orderby' => 'title');
$myposts = get_posts( $args );
foreach( $myposts as $post ){ setup_postdata($post);
	?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php
}
wp_reset_postdata();
?>
</ul>

<br>

<ul>//by Weekdays-->
<?php
global $post;
$args = array( 'numberposts' => -1, 'date_query' =>array(																
																array(
																	'dayofweek' => array( 6, 7 ), // дни недели, 1 - понедельник, 5 - пятница
																	'compare'   => 'BETWEEN'
																),
																'relation' => 'AND' // этот параметр равен AND по умолчанию и поэтому его можно не указывать
														), 'orderby' => 'date');
$myposts = get_posts( $args );
foreach( $myposts as $post ){ setup_postdata($post);
	?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php
}
wp_reset_postdata();
?>
</ul>
<br>

<ul>//by THIS Year-->
<?php
global $post;
$args = array( 'numberposts' => -1, 'date_query' =>array(array('year'=>"2019")), 'orderby' => 'comment_count');
$myposts = get_posts( $args );
foreach( $myposts as $post ){ setup_postdata($post);
	?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php
}
wp_reset_postdata();
?>
</ul>

<br>

<ul>//by offset first four posts-->
<?php
global $post;
$args = array( 'numberposts' => -1,'posts_per_page'=> 10, 'offset'=> 4, 'orderby' => 'ID');
$myposts = get_posts( $args );
foreach( $myposts as $post ){ setup_postdata($post);
	?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php
}
wp_reset_postdata();
?>
</ul>
<br>

<ul>//by five random posts-->
<?php
global $post;
$args = array( 'posts_per_page' => 5, 'orderby' => 'rand');
$myposts = get_posts( $args );
foreach( $myposts as $post ){ setup_postdata($post);
	?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php
}
wp_reset_postdata();
?>
</ul>

<br>

<ul>//order by author ID and date-->
<?php
global $post;
$args = array( 'numberposts' => -1, 'orderby' => array( 'author' => 'ASC', 'date' => 'DESC' ));
$myposts = get_posts( $args );
foreach( $myposts as $post ){ setup_postdata($post);
	?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php
}
wp_reset_postdata();
?>
</ul>

<br>

<ul>//PAGES-->
<?php
global $post;
$args = array( 'numberposts' => -1, 'post_type'=>'page','orderby' => array( 'author' => 'DESC', 'date' => 'ASC' ));
$myposts = get_posts( $args );
foreach( $myposts as $post ){ setup_postdata($post);
	?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php
}
wp_reset_postdata();
?>
</ul>

<br>
<ul>//exclude PAGES ID-->
<?php
global $post;
$args = array( 'numberposts' => -1, 'post_type'=>'page', 'exclude'=>"2,126,131",'orderby' => array( 'author' => 'DESC', 'date' => 'ASC' ));
$myposts = get_posts( $args );
foreach( $myposts as $post ){ setup_postdata($post);
	?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php
}
wp_reset_postdata();
?>
</ul>

<br>
<ul>//exclude att-->
<?php
global $post;
$args = array( 'numberposts' => -1, 'post_type'=>'attachment', 'date_query' =>array(array('year'=>"2017", 'month'=> 4)));
$myposts = get_posts( $args );
foreach( $myposts as $post ){ setup_postdata($post);
	?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php
}
wp_reset_postdata();
?>
</ul>
<?php get_footer(); ?>
