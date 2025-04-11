<?php get_header(); ?>

<main class="container mx-auto px-4 py-12">
  <h1 class="text-3xl font-bold mb-8">
    <?php
      if (is_category()) {
        single_cat_title();
      } elseif (is_tag()) {
        single_tag_title();
      } elseif (is_author()) {
        the_author();
      } else {
        echo 'Archives';
      }
    ?>
  </h1>

  <div class="grid gap-6">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article class="bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-2">
          <a href="<?php the_permalink(); ?>" class="hover:underline text-yellow-600"><?php the_title(); ?></a>
        </h2>
        <p class="text-gray-700"><?php the_excerpt(); ?></p>
      </article>
    <?php endwhile; else : ?>
      <p>No posts found.</p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
