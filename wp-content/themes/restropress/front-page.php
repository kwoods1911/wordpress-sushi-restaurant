<?php get_header(); ?>

<main class="container mx-auto p-6 space-y-12">

    <!-- Hero Section -->
    <section class="text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome to <?php bloginfo('name'); ?></h1>
        <p class="text-gray-700 text-lg">Delicious food, quick delivery, and a cozy atmosphere.</p>
    </section>

    <!-- Featured Dishes -->
    <section>
        <h2 class="text-2xl font-semibold mb-4">Featured Dishes</h2>
        <div class="grid md:grid-cols-3 gap-6">
            <!-- You can later loop dynamic posts here -->
            <div class="bg-white shadow p-4 rounded">
                <img src="https://via.placeholder.com/400x250" class="rounded mb-3" alt="Dish 1">
                <h3 class="text-lg font-bold">Spicy Chicken</h3>
                <p class="text-sm text-gray-600">Tender chicken with a spicy kick.</p>
            </div>
            <div class="bg-white shadow p-4 rounded">
                <img src="https://via.placeholder.com/400x250" class="rounded mb-3" alt="Dish 2">
                <h3 class="text-lg font-bold">Veggie Delight</h3>
                <p class="text-sm text-gray-600">Fresh veggies in a creamy sauce.</p>
            </div>
            <div class="bg-white shadow p-4 rounded">
                <img src="https://via.placeholder.com/400x250" class="rounded mb-3" alt="Dish 3">
                <h3 class="text-lg font-bold">Seafood Pasta</h3>
                <p class="text-sm text-gray-600">Rich pasta with fresh seafood.</p>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="text-center">
        <h2 class="text-2xl font-semibold mb-4">Order Now</h2>
        <a href="/order" class="bg-red-500 text-white px-6 py-3 rounded hover:bg-red-600 transition">See Full Menu</a>
    </section>

</main>



<?php get_footer(); ?>