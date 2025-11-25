<!-- Head -->
<?= view("components/head") ?>

<body>
<!-- Header -->
<header class="bg-[var(--primary)] shadow text-white">
    <div class="flex justify-between items-center mx-auto px-6 py-4 max-w-7xl">
        <a href="/" class="flex items-center gap-3">
            <div class="flex justify-center items-center bg-[var(--primary)] shadow rounded-md w-12 h-12">
                <span class="font-montserrat font-bold text-white text-xl">GP</span>
            </div>
            <span class="ml-2 font-montserrat font-semibold text-lg">Gappy's Plushies</span>
        </a>

        <nav class="hidden md:flex items-center gap-4">
            <div class="flex flex-col items-center">
                <button type="button"
                    class="bg-[var(--primary)] hover:bg-[#ffb300] px-5 py-2.5 rounded-md focus:outline-none focus:ring-[var(--primary-accent)] focus:ring-2 focus:ring-offset-2 font-montserrat font-medium text-white active:scale-95 transition">
                    Moodbaord
                </button>
            </div>
            <div class="flex flex-col items-center">
                <button type="button"
                    class="bg-[var(--primary)] hover:bg-[#ffb300] px-5 py-2.5 rounded-md focus:outline-none focus:ring-[var(--primary-accent)] focus:ring-2 focus:ring-offset-2 font-montserrat font-medium text-white active:scale-95 transition">
                    Moodbaord
                </button>
            </div>
            <div class="flex flex-col items-center">
                <button type="button"
                    class="bg-[var(--primary)] hover:bg-[#ffb300] px-5 py-2.5 rounded-md focus:outline-none focus:ring-[var(--primary-accent)] focus:ring-2 focus:ring-offset-2 font-montserrat font-medium text-white active:scale-95 transition">
                    Moodbaord
                </button>
            </div>
            <div class="flex flex-col items-center">
                <button type="button"
                    class="bg-[var(--primary)] hover:bg-[#ffb300] px-5 py-2.5 rounded-md focus:outline-none focus:ring-[var(--primary-accent)] focus:ring-2 focus:ring-offset-2 font-montserrat font-medium text-white active:scale-95 transition">
                    Moodbaord
                </button>
            </div>
        </nav>

        <!-- Mobile menu button -->
        <div class="md:hidden">
            <button id="mobileMenuBtn" aria-label="Open menu" class="p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-white/50">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile menu (hidden by default) -->
    <div id="mobileMenu" class="hidden md:hidden px-6 pb-4">
        <a href="#features" class="block mb-2">
            <button class="bg-[var(--primary)] hover:bg-[#ffb300] px-4 py-2 rounded-md w-full font-montserrat font-medium text-white">Features</button>
        </a>
        <a href="#pricing" class="block mb-2">
            <button class="bg-[var(--primary)] hover:bg-[#ffb300] px-4 py-2 rounded-md w-full font-montserrat font-medium text-white">Pricing</button>
        </a>
        <a href="#contact" class="block">
            <button class="bg-transparent hover:bg-white/10 px-4 py-2 border border-white/30 rounded-md w-full font-montserrat font-medium text-white">Contact</button>
        </a>
    </div>

    <script>
        (function(){
            const btn = document.getElementById('mobileMenuBtn');
            const menu = document.getElementById('mobileMenu');
            if (btn && menu) {
                btn.addEventListener('click', () => menu.classList.toggle('hidden'));
            }
        })();
    </script>
</header>
    <!-- Header -->
    <div class="p-20 py-10 min-h-screen font-inter x-4">
        <!-- Title -->
        <h1 class="mb-6 font-montserrat font-bold text-gray-900 text-3xl">Mood Board</h1>

        <!-- Color Palette Section -->
        <section class="mb-10">
            <h2 class="mb-4 font-montserrat font-semibold text-xl">Color Palette</h2>
            <div class="flex gap-6 mb-4">
                <div class="flex flex-col items-center">
                    <div class="shadow border-4 border-orange-300 rounded-lg w-16 h-16" style="background: var(--primary);"></div>
                    <span class="mt-2 font-inter font-medium text-gray-700 text-sm">Primary Orange<br>#ff7f2a</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="shadow border-4 border-blue-300 rounded-lg w-16 h-16" style="background: var(--primary-accent);"></div>
                    <span class="mt-2 font-inter font-medium text-gray-700 text-sm">Accent Blue<br>#2563eb</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="shadow border-4 border-gray-300 rounded-lg w-16 h-16" style="background: var(--primary-ghost);"></div>
                    <span class="mt-2 font-inter font-medium text-gray-700 text-sm">White<br>#fff</span>
                </div>
            </div>
        </section>

        <!-- Font Styles Section -->
        <section class="mb-10">
            <h2 class="mb-4 font-montserrat font-semibold text-xl">Font Styles</h2>
            <div class="flex gap-8">
                <div class="flex flex-col items-center">
                    <span class="font-pacifico text-gray-900 text-2xl">Pacifico Example</span>
                    <span class="mt-2 font-pacifico text-gray-700 text-sm">Pacifico</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="font-comfortaa text-gray-900 text-2xl">Comfortaa Example</span>
                    <span class="mt-2 text-gray-700 text-sm">Comfortaa</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="font-quicksand text-gray-900 text-2xl">Quicksand Example</span>
                    <span class="mt-2 text-gray-700 text-sm">Quicksand</span>
                </div>
            </div>
        </section>

        <!-- Logo Styles Section -->
        <section class="mb-10">
            <h2 class="mb-4 font-montserrat font-semibold text-xl">Logo Styles</h2>
            <div class="flex gap-8">
                <!-- Square Logo -->
                <div class="flex flex-col items-center">
                    <div class="flex justify-center items-center bg-[var(--primary-orange)] shadow rounded-lg w-20 h-20">
                        <span class="font-montserrat font-bold text-white text-3xl">GP</span>
                    </div>
                    <span class="mt-2 text-gray-700 text-sm">Square</span>
                </div>
                <!-- Circle Logo -->
                <div class="flex flex-col items-center">
                    <div class="flex justify-center items-center shadow rounded-full w-20 h-20 bg-[var(--accent-blue)]">
                        <span class="font-pacifico font-bold text-white text-3xl">GP</span>
                    </div>
                    <span class="mt-2 text-gray-700 text-sm">Circle</span>
                </div>
            </div>
        </section>

        <!-- Button Styles Section -->
        <section class="mb-10">
            <h2 class="mb-4 font-montserrat font-semibold text-xl">Button Styles</h2>
            <div class="flex gap-6">
                <div class="flex gap-6">

                    <div class="flex flex-col items-center">
                        <button type="button"
                            class="bg-[var(--primary-accent)] hover:bg-white px-5 py-2.5 border-[var(--primary-accent)] border-2 rounded-md focus:outline-none focus:ring-[var(--primary-accent)] focus:ring-2 focus:ring-offset-2 font-montserrat font-medium text-white hover:text-[var(--primary-accent)] active:scale-95 transition">
                            Primary
                        </button>
                        <span class="mt-2 text-gray-700 text-sm">Primary</span>
                    </div>

                    <div class="flex flex-col items-center">
                        <button type="button"
                            class="bg-[var(--primary)] hover:bg-[#ffb300] px-5 py-2.5 rounded-md focus:outline-none focus:ring-[var(--primary-accent)] focus:ring-2 focus:ring-offset-2 font-montserrat font-medium text-white active:scale-95 transition">
                            Secondary
                        </button>
                        <span class="mt-2 text-gray-700 text-sm">Secondary</span>
                    </div>

                    <div class="flex flex-col items-center">
                        <button type="button"
                            class="bg-transparent hover:bg-gray-100 px-5 py-2.5 border border-gray-400 hover:border-[var(--primary-accent)] rounded-md focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 font-montserrat font-medium text-gray-800 hover:text-[var(--primary-accent)] transition">
                            Tertiary
                        </button>
                        <span class="mt-2 px-2 text-gray-700 group-hover:text-[var(--primary-accent)] text-sm transition">
                            Tertiary (ghost)
                        </span>
                    </div>

                    <div class="flex flex-col items-center">
                        <button type="button" disabled aria-disabled="true"
                            class="bg-gray-200 opacity-60 px-5 py-2.5 rounded-md focus:outline-none font-montserrat font-medium text-gray-400 cursor-not-allowed">
                            Disabled
                        </button>
                        <span class="mt-2 text-gray-700 text-sm">Disabled</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Card Example Section -->
        <section>
            <h2 class="mb-4 font-montserrat font-semibold text-xl">Card Example</h2>
            <?php
            // Example variables
            $img = 'path/to/image.jpg';
            $name = 'Card Title';
            $desc = 'This is a description of the card.';
            $itemLink = 'https://example.com';
            $price = "0.00"

            ?>
            <div class="flex flex-wrap gap-6">
                <div class="flex flex-col items-center bg-[var(--primary)] shadow-lg p-4 border border-gray-100 rounded-lg max-w-sm overflow-hidden">
                    <img src="<?= esc($img ?? 'path/to/image.jpg') ?>" alt="<?= esc($name ?? 'Image') ?>" class="mx-auto rounded-md w-[90%] object-cover aspect-square">

                    <div class="flex flex-col items-start mt-4 w-full">
                        <h3 class="font-montserrat font-bold text-gray-900 text-lg"><?= esc($name ?? 'Name') ?></h3>

                        <?php if (isset($price)) : ?>
                            <p class="mt-2 font-inter font-semibold text-gray-900">$<?=  esc($price) ?></p>
                        <?php endif; ?>

                        <p class="mt-1 font-inter text-gray-700 text-sm"><?=  esc($desc ?? 'Description') ?></p>

                        <div class="flex justify-center mt-3 w-full">
                            <div class="flex flex-col items-center">
                                <button type="button"
                                    class="bg-[var(--primary-accent)] hover:bg-white px-5 py-2.5 border-[var(--primary-accent)] border-2 rounded-md focus:outline-none focus:ring-[var(--primary-accent)] focus:ring-2 focus:ring-offset-2 font-montserrat font-medium text-white hover:text-[var(--primary-accent)] active:scale-95 transition">
                                    Add to cart
                                </button>
                                <span class="mt-2 text-gray-700 text-sm">Secondary</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-[var(--primary)] shadow-lg border border-gray-100 rounded-lg max-w-sm overflow-hidden">
                    <img src="<?=  esc($img ?? 'path/to/image.jpg') ?>" alt="<?=  esc($name ?? 'Image') ?>" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="mb-2 font-montserrat font-bold text-gray-900 text-lg"><?=  esc($name ?? 'Name') ?></h3>

                        <?php if (isset($price)) : ?>
                            <p class="mb-2 font-inter font-semibold text-gray-900">$<?=  esc($price) ?></p>
                        <?php endif; ?>

                        <p class="mb-4 font-inter text-gray-700"><?=  esc($desc ?? 'Description') ?></p>

                        <div class="flex justify-center">
                            <button type="button"
                                class="bg-[var(--primary-accent)] hover:bg-white px-5 py-2.5 border-[var(--primary-accent)] border-2 rounded-md focus:outline-none focus:ring-[var(--primary-accent)] focus:ring-2 focus:ring-offset-2 font-montserrat font-medium text-white hover:text-[var(--primary-accent)] active:scale-95 transition">
                                Add to cart
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-[var(--primary)] shadow-lg border border-[var(--primary-accent)] rounded-lg max-w-md overflow-hidden">
                    <div class="flex items-center p-6">
                        <div class="flex justify-center w-full">
                            <img src="<?= esc($img ?? 'path/to/image.jpg') ?>"
                                 alt="<?= esc($name ?? 'Image') ?>"
                                 class="mx-auto border-[var(--primary-ghost)] border-2 rounded-lg w-4/5 object-cover">
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="font-montserrat font-semibold text-gray-900 text-xl"><?=  esc($name ?? 'Name') ?></h4>

                        <?php if (isset($price)) : ?>
                            <p class="block mb-2 font-inter font-semibold text-gray-900">$<?=  esc($price) ?></p>
                        <?php endif; ?>

                        <s class="block font-inter text-gray-700 text-base"><?=  esc($desc ?? 'Description') ?></s
                    </div>
                    <div class="flex justify-center px-4 pb-4">
                        <button type="button"
                            class="bg-[var(--primary-accent)] hover:bg-white px-6 py-3 border-[var(--primary-accent)] border-2 rounded-md focus:outline-none focus:ring-[var(--primary-accent)] focus:ring-2 focus:ring-offset-2 font-montserrat font-medium text-white hover:text-[var(--primary-accent)] active:scale-95 transition">
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>