<?php get_header(); ?>

<main class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4"> <?php the_title(); ?></h1>
    <div>
        <?php
            while (have_posts()) : the_post();

            the_content();

            endwhile;
        ?>
    </div>
</main>



<?php get_footer(); ?>