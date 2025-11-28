<?= view("components/head") ?>
<?= view("components/header") ?>

<?php
$subtotal = 0;

foreach ($cart as $item) {
    $subtotal += $item['product_price'] * $item['quantity'];
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
            <form action="/place_order" method="post" >
                <div class="bg-white shadow p-6 border border-gray-200 rounded-lg">

                    <h3 class="mb-4 pb-3 border-b font-bold text-gray-800 text-xl">
                        Order Summary
                    </h3>

                    <div class="flex justify-between items-center mt-3 pt-3 font-bold text-gray-900 text-lg">
                        <div class="flex items-center">
                            <img src="<?= esc($item['product_img']) ?>"
                                alt="<?= esc($item['product_name']) ?>"
                                class="mr-6 border rounded-lg w-24 h-24 object-cover">
                            <h3 class="font-bold text-gray-900 text-lg"><?= esc($item['product_name']) ?></h3>
                        </div>
                        $<?= esc($item['product_price']) * esc($item['quantity'])?>
                    </div>



                    <div class="flex justify-between mt-3 pt-3 border-t font-bold text-gray-900 text-lg">
                        <span>Total</span>
                        <span>$<?= number_format($subtotal, 2) ?></span>
                    </div>

                    <div class="flex justify-between items-center mt-3 pt-3 border-t font-bold text-gray-900 text-lg">
                        <a href="/cart" class="block">
                            <?= view("components/buttons/buttonSecondary", ["text" => "Back to Cart"]) ?>
                        </a>

                        <?= view("components/buttons/buttonPrimary", ["text" => "Place Order", "type" => "submit"]) ?>
                    </div>

                </div>
            </form>
        <?php endif; ?>

    </section>

    <?= view("components/footer") ?>
</body>