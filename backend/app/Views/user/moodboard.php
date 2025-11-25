<?php

use Config\View;
?>
<!-- Head -->
<?= view("components/head") ?>
<body>
<!-- Header -->
<?= view("components/header") ?>
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
                    <span class="mt-2 font-inter font-medium text-gray-700 text-sm">Accent Red<br>#2563eb</span>
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
                        <?= view("components/buttons/buttonPrimary", ["text" => "primary"]) ?>
                        <span class="mt-2 text-gray-700 text-sm">Primary</span>
                    </div>

                    <div class="flex flex-col items-center">
                        <?= view("components/buttons/buttonSecondary", ["text" => "secondary"]) ?>
                        <span class="mt-2 text-gray-700 text-sm">Secondary</span>
                    </div>

                    <div class="flex flex-col items-center">
                        <?= view("components/buttons/buttonTertiary", ["text" => "tertiary"]) ?>
                        <span class="mt-2 px-2 text-gray-700 group-hover:text-[var(--primary-accent)] text-sm transition">
                            Tertiary (ghost)
                        </span>
                    </div>

                    <div class="flex flex-col items-center">
                        <?= view("components/buttons/buttonDisabled", ["text" => "disabled"]) ?>
                        <span class="mt-2 text-gray-700 text-sm">Disabled</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Card Example Section -->
        <section>
            <h2 class="mb-4 font-montserrat font-semibold text-xl">Card Example</h2>

            <div class="flex flex-wrap gap-6">

                <?= view("components/cards/cardPrimary", ["img" => 'path/to/image.jpg', "name" => 'Card Title', "desc" => 'This is a description of the card.', "price" => 67.69])?>
                <?= view("components/cards/cardSecondary", ["img" => 'path/to/image.jpg', "name" => 'Card Title', "desc" => 'This is a description of the card.', "price" => 67.69])?>
                <?= view("components/cards/cardTertiary", ["img" => 'path/to/image.jpg', "name" => 'Card Title', "desc" => 'This is a description of the card.', "price" => 67.69])?>

            </div>
        </section>
    </div>
    <?=  view("components/footer") ?>
</body>