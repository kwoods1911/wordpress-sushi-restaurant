<footer class="bg-gray-200 text-center p-4 mt-10">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
    </footer>
    <?php wp_footer(); ?>

    <script>
        const toggleBtn = document.getElementById('menu-toggle');
        const menu = document.getElementById('main-menu');
        const bar1 = document.getElementById('bar1');
        const bar2 = document.getElementById('bar2');
        const bar3 = document.getElementById('bar3');

        toggleBtn.addEventListener('click', () => {
            menu.classList.toggle('hidden');


                // Animate bars into an "X"
                bar1.classList.toggle('rotate-45');
                bar1.classList.toggle('translate-y-2');

                bar2.classList.toggle('opacity-0');

                bar3.classList.toggle('- rotate-45');
                bar3.classList.toggle('- translate-y-2');
        });
    </script>
</body>
</html>
