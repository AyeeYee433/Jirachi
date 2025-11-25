<?= view("components/head") ?>
<?= view("components/header") ?>

<?php
$cart = session()->get('cart') ?? [];
?>

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
                        <img src="<?= esc($item['img']) ?>"
                            alt="<?= esc($item['name']) ?>"
                            class="border rounded-lg w-24 h-24 object-cover">

                        <!-- Info -->
                        <div class="flex-1 ml-4">
                            <h3 class="font-bold text-gray-900 text-lg"><?= esc($item['name']) ?></h3>
                            <p class="text-gray-600 text-sm">$<?= esc($item['price']) ?></p>

                            <!-- Quantity -->
                            <form method="POST" action="/update_qty" class="flex items-center gap-2 mt-3">
                                <input type="hidden" name="name" value="<?= esc($item['name']) ?>">

                                <button name="action" value="minus">
                                    <?= view("components/buttons/buttonSecondary", ["text" => "-"]) ?>
                                </button>

                                <span class="px-3"><?= esc($item['qty']) ?></span>

                                <button name="action" value="plus">
                                    <?= view("components/buttons/buttonSecondary", ["text" => "+"]) ?>
                                </button>
                            </form>
                        </div>

                        <!-- Remove -->
                        <form action="/remove_from_cart" method="POST" class="ml-4">
                            <input type="hidden" name="name" value="<?= esc($item['name']) ?>">
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