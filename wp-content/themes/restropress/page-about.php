<?php

get_header(); ?>



<main>

<main class="container mx-auto px-4 py-8">
  <h1 class="text-3xl font-bold mb-6"><?php the_title(); ?></h1>
  <div class="prose max-w-none">
    <?php while (have_posts()) : the_post(); the_content(); endwhile; ?>
  </div>
</main>


<?php get_footer(); ?>