<?= view("components/head") ?>
<?= view("components/header") ?>

<body>
    <!-- Header -->



    <!-- Featured Plushies -->
    <section class="mx-auto px-8 py-16 container">

        <div class="items-start gap-12 grid grid-cols-1 md:grid-cols-2">

            <div class="flex justify-center">
                <img src="<?= esc($product->img) ?>"
                    alt="Cute Plushie"
                    class="shadow-lg rounded-lg w-full max-w-md object-cover">
            </div>

            <!-- PRODUCT DETAILS -->
            <div class="bg-white shadow p-8 border border-gray-200 rounded-lg">

                <!-- Product Name -->
                <h1 class="mb-4 font-extrabold text-[var(--primary-accent)] text-4xl">
                    <?= esc($product->name) ?>
                </h1>

                <!-- Price -->
                <p class="mb-4 font-bold text-gray-800 text-3xl">
                    $<?= esc($product->price) ?>
                </p>

                <!-- Description -->
                <p class="mb-6 font-light text-gray-700 text-2xl leading-relaxed">
                    <?= esc($product->description) ?>
                </p>

                <!-- Cart -->
                <form action="<?= site_url('addToCart') ?>" method="POST" class="space-y-6">
                    <div>
                        <input type="hidden" name="product_id" value="<?= esc($product->id)?>">
                        <label class="block mb-2 font-semibold text-gray-700">Quantity
                            <input type="number"
                                name="quantity"
                                value="1"
                                min="1"
                                class="p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-[var(--primary-accent)] w-24 text-[var(--primary-accent)]">
                        </label>
                    </div>
                    <?= view("components/buttons/buttonPrimary", ['type' => "submit", "text" => "Add to Cart"]) ?>


                </form>
            </div>

        </div>

    </section>

    <!-- Footer -->
    <?= view("components/footer") ?>
</body>