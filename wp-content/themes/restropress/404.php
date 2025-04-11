<?php get_header(); ?>
<!-- file hangles broken URLS and missing content. -->
<main class="container mx-auto px-4 py-16 text-center">
  <h1 class="text-4xl font-bold text-red-600 mb-4">404 - Page Not Found</h1>
  <p class="text-lg text-gray-700 mb-6">Sorry, the page you're looking for doesn't exist.</p>
  <a href="<?php echo home_url(); ?>" class="inline-block bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">
    Back to Homepage
  </a>
</main>

<?php get_footer(); ?>

