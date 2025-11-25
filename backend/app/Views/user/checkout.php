<?= view("components/head") ?>
<?= view("components/header") ?>

<?php
$cart = session()->get('cart') ?? [];
$subtotal = 0;

foreach ($cart as $item) {
    $subtotal += $item['price'] * $item['qty'];
}
?>

<body class="bg-gray-50">

    <section class="mx-auto px-6 py-16 max-w-xl container">

        <h2 class="mb-10 font-extrabold text-[var(--primary-accent)] text-3xl text-center">
            Checkout Summary
        </h2>

        <?php if (empty($cart)): ?>

            <div class="bg-white shadow p-10 py-16 rounded-lg text-center">
                <p class="mb-4 text-gray-600 text-lg">Your cart is empty</p>

                <a href="/shop">
                    <?= view("components/buttons/buttonPrimary", ["text" => "Go Shopping"]) ?>
                </a>
            </div>

        <?php else: ?>

            <div class="bg-white shadow p-6 border border-gray-200 rounded-lg">

                <h3 class="mb-4 pb-3 border-b font-bold text-gray-800 text-xl">
                    Order Summary
                </h3>

                <div class="flex justify-between mb-2 text-gray-700">
                    <span>Subtotal</span>
                    <span>$<?= number_format($subtotal, 2) ?></span>
                </div>

                <div class="flex justify-between mb-2 text-gray-700">
                    <span>Shipping</span>
                    <span class="font-semibold text-green-600">FREE</span>
                </div>

                <div class="flex justify-between mt-3 pt-3 border-t font-bold text-gray-900 text-lg">
                    <span>Total</span>
                    <span>$<?= number_format($subtotal, 2) ?></span>
                </div>

                <a href="/place_order" class="block mt-6">
                    <?= view("components/buttons/buttonPrimary", ["text" => "Place Order"]) ?>
                </a>

                <a href="/cart" class="block mt-3">
                    <?= view("components/buttons/buttonSecondary", ["text" => "Back to Cart"]) ?>
                </a>

            </div>

        <?php endif; ?>

    </section>

    <?= view("components/footer") ?>
</body>