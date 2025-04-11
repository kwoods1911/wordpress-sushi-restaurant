<?php get_header();?>


<main class="container mx-auto px-4 py-8">
  <h1 class="text-3xl font-bold mb-6"><?php the_title(); ?></h1>
  <p>Reach us via the form below or call us at (123) 456-7890.</p>

  <!-- Placeholder contact form -->
  <form class="mt-6 space-y-4 max-w-lg">
    <input type="text" name="name" placeholder="Your Name" class="w-full p-2 border rounded">
    <input type="email" name="email" placeholder="Your Email" class="w-full p-2 border rounded">
    <textarea name="message" placeholder="Your Message" class="w-full p-2 border rounded"></textarea>
    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Send</button>
  </form>
</main>


<? get_footer();?>







