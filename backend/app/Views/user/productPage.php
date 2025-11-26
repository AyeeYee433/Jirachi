<?= view("components/head") ?>
<?= view("components/header") ?>

<body>
    <!-- Header -->



    <!-- Featured Plushies -->
    <section class="mx-auto px-8 py-16 container">

        <div class="items-start gap-12 grid grid-cols-1 md:grid-cols-2">

            <div class="flex justify-center">
                <img src="https://dendenotakushop.com/cdn/shop/files/KuripanPlushieMatikanetannhauserUmamusume-PrettyDerby_0.jpg?v=1724820492"
                    alt="Cute Plushie"
                    class="shadow-lg rounded-lg w-full max-w-md object-cover">
            </div>

            <!-- PRODUCT DETAILS -->
            <div class="bg-white shadow p-8 border border-gray-200 rounded-lg">

                <!-- Product Name -->
                <h1 class="mb-4 font-extrabold text-[var(--primary-accent)] text-4xl">
                    Gappy's Kuripan Plushie
                </h1>

                <!-- Price -->
                <p class="mb-4 font-bold text-gray-800 text-3xl">
                    ₱499.00
                </p>

                <!-- Description -->
                <p class="mb-6 font-light text-gray-700 text-2xl leading-relaxed">
                    This adorable Kuripan plushie is soft, huggable, and full of charm!
                    Perfect for snuggling, gifting, or adding to your plushy collection.
                </p>

                <!-- Cart -->
                <form action="#" method="POST" class="space-y-6">

                    <div>
                        <label class="block mb-2 font-semibold text-gray-700">Quantity
                            <input type="number"
                                name="qty"
                                value="1"
                                min="1"
                                class="p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-[var(--primary-accent)] w-24 text-[var(--primary-accent)]">
                        </label>
                    </div>

                    <button type="submit"
                        class="bg-[var(--primary-accent)] hover:bg-[var(--primary-hover)] shadow px-8 py-3 rounded-full font-semibold text-white transition">
                        Add to Cart
                    </button>

                </form>
            </div>

        </div>

    </section>

    <!-- Footer -->
    <?= view("components/footer") ?>
</body>