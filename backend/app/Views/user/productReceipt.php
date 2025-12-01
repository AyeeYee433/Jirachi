<?= view("components/head") ?>
<?= view("components/header") ?>

<!-- Order checkout -->
<?php
$date_id = date('ymd');
$gen = str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);

$order = [
    'id' => 'ORD-' . $date_id . '-' . $gen,
    'date' => date('F j, Y'),
    'items' => [
        ['name' => 'mambo', 'qty' => 1, 'price' => 19.99],
    ],
    'subtotal' => 0.00,
    'tax_rate' => 0.08,
    'shipping' => 0.30,
    'total' => 0.00,
];

foreach ($order['items'] as $item) {
    $order['subtotal'] += $item['price'] * $item['qty'];
}
$order['tax'] = $order['subtotal'] * $order['tax_rate'];
$order['total'] = $order['subtotal'] + $order['tax'] + $order['shipping'];
$total = 0;
?>


<body>
    <section class="mx-auto px-6 py-16 max-w-xl container">
        <h2 class="mb-10 font-extrabold text-[var(--primary-accent)] text-3xl text-center">
            Confirm Order
        </h2>

        <!-- if no order in cart -->
        <?php if (empty($order['items'])): ?>

            <div class="bg-white shadow p-10 py-16 rounded-lg text-center">
                <p class="mb-4 text-gray-600 text-lg">No items found for this order.</p>
                <a href="/shop">
                    <?= view("components/buttons/buttonPrimary", ["text" => "Go Shopping"]) ?>
                </a>
            </div>

        <?php else: ?>

            <!-- checkout -->
            <div class="bg-white shadow p-8 border border-gray-200 rounded-lg">

                <div class="mb-6 pb-4 border-gray-300 border-b border-dashed">
                    <div class="flex justify-between text-gray-600 text-sm">
                        <span>Order ID:</span>
                        <span class="font-medium text-gray-800"><?= esc($order['id']) ?></span>
                    </div>
                    <div class="flex justify-between text-gray-600 text-sm">
                        <span>Date:</span>
                        <span class="font-medium text-gray-800"><?= esc($order['date']) ?></span>
                    </div>
                </div>

                <h3 class="mb-4 font-bold text-gray-800 text-xl">Items Purchased</h3>

                <?php foreach ($order['items'] as $item): ?>
                    <div class="flex justify-between items-start mb-3 text-gray-700 item-row">
                        <span class="flex-grow pr-4">
                            <?= esc($item['name']) ?>
                        </span>

                        <!-- item quantity -->
                        <p class="font-semibold text-[var(--primary-accent)] text-right">
                            $<span class="item-total"><?= number_format($item['price'], 2) ?></span>
                        </p>

                        <?php
                        $total += $item['price'];
                        ?>
                    </div>
                <?php endforeach; ?>

                <p class="font-semibold text-[var(--primary-accent)] text-right">
                    $<span class="item-total"><?= number_format($total, 2) ?></span>
                </p>
                <!-- payment method -->
                <div>
                    <label class="block mb-2 font-semibold text-gray-700">
                        <div class="flex justify-between text-gray-600 text-sm">
                            <span>Gcash: </span><input type="radio" name="Cash" class="flex justify-between items-start mb-3 text-gray-700 item-row" ?>
                        </div>
                        <div class="flex justify-between text-gray-600 text-sm">
                            <span>Credit/Debit Card: </span><input type="radio" name="card" class="flex justify-between items-start mb-3 text-gray-700 item-row" ?>

                        </div>
                    </label>

                </div>

                <!-- totals -->
                <div class="mt-6 pt-4 border-t">

                    <div class="flex justify-between mt-4 pt-4 border-t font-extrabold text-[var(--primary-accent)] text-xl">
                        <span>Total Payment</span>
                        <span id="total">$<?= number_format($order['total'], 2) ?></span>
                    </div>

                </div>
                <!-- payment confirmation buttun -->
                <div class="mt-8 pt-4 border-t text-gray-600 text-sm text-center">
                    <?= view("components/buttons/buttonPrimary", ['type' => "submit", "text" => "Confirm Payment"]) ?>
                    <p> </p>
                    <a href="/profile/orders" class="inline-block mt-3 text-[var(--primary-accent)] text-sm hover:underline">
                        View Order Details
                    </a>
                </div>

            </div>

    </section>
<?php endif; ?>


<?= view("components/footer") ?>

<!-- 🔥 quantity price multiplier -->


</body>