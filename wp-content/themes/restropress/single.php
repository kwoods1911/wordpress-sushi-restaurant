<?php get_header(); ?>

<main class="container mx-auto px-4 py-12 max-w-3xl">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1 class="text-3xl font-bold mb-4"><?php the_title(); ?></h1>
    <p class="text-gray-600 mb-2">Published on <?php echo get_the_date(); ?></p>
    <div class="prose max-w-none mb-6">
      <?php the_content(); ?>
    </div>
  <?php endwhile; else : ?>
    <p>No content found.</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>



