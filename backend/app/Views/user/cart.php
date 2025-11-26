<?= view("components/head") ?>
<?= view("components/header") ?>

<body class="bg-gray-50">

    <section class="mx-auto px-6 py-16 container">

        <h2 class="mb-10 font-extrabold text-[var(--primary-accent)] text-3xl text-center">
            Shopping Cart
        </h2>

        <?php if (empty($cart)): ?>

            <div class="py-20 text-center">
                <p class="mb-4 text-gray-600 text-lg">Your cart is empty</p>

                <a href="/shop">
                    <?= view("components/buttons/buttonPrimary", ["text" => "Go Shopping"]) ?>
                </a>

                <a href="/checkout" class="block mt-4">
                    <?= view("components/buttons/buttonSecondary", ["text" => "Checkout"]) ?>
                </a>
            </div>

        <?php else: ?>

            <div class="space-y-6">

                <?php foreach ($cart as $item): ?>
                    <div class="flex items-center bg-white shadow p-4 border border-gray-200 rounded-lg">

                        <!-- Thumbnail -->
                        <img src="<?= esc($item['product_img']) ?>"
                            alt="<?= esc($item['product_name']) ?>"
                            class="border rounded-lg w-24 h-24 object-cover">

                        <!-- Info -->
                        <div class="flex-1 ml-4">
                            <h3 class="font-bold text-gray-900 text-lg"><?= esc($item['product_name']) ?></h3>
                            <p class="text-gray-600 text-sm">$<?= esc($item['product_price']) * esc($item['quantity'])?></p>

                            <!-- Quantity -->
                            <form method="POST" action="/update_qty" class="flex items-center gap-2 mt-3">
                                <input type="hidden" name="product_id" value="<?= esc($item['product_id']) ?>">

                                <button type="submit" name="change" value="-1" class="bg-[var(--primary)] hover:bg-[#ffb300] px-5 py-2.5 rounded-md focus:outline-none focus:ring-[var(--primary-accent)] focus:ring-2 focus:ring-offset-2 font-montserrat font-medium text-white active:scale-95 transition">
                                    -
                                </button>

                                <span class="px-3 text-black"><?= esc($item['quantity']) ?></span>

                                <button type="submit" name="change" value="1" class="bg-[var(--primary)] hover:bg-[#ffb300] px-5 py-2.5 rounded-md focus:outline-none focus:ring-[var(--primary-accent)] focus:ring-2 focus:ring-offset-2 font-montserrat font-medium text-white active:scale-95 transition">
                                    +
                                </button>
                            </form>
                        </div>

                        <!-- Remove -->
                        <form action="/remove_from_cart" method="POST" class="ml-4">
                            <input type="hidden" name="name" value="<?= esc($item['product_name']) ?>">
                            <button>
                                <?= view("components/buttons/buttonPrimary", ["text" => "Remove"]) ?>
                            </button>
                        </form>

                    </div>
                <?php endforeach; ?>

            </div>

            <div class="mt-10 text-center">
                <a href="/checkout" class="inline-block">
                    <?= view("components/buttons/buttonPrimary", ["text" => "Proceed to Checkout"]) ?>
                </a>
            </div>

        <?php endif; ?>

    </section>

    <?= view("components/footer") ?>
</body>