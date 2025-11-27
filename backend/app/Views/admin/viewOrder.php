<?php

// Expecting $order (object) and optional $customer (object) passed to view
$orderId = isset($order->order_id) ? $order->order_id : (isset($order->id) ? $order->id : '-');
$customerId = isset($order->customer_id) ? $order->customer_id : (isset($order->customer) ? $order->customer : '-');
$orderedAt = isset($order->ordered_date) ? $order->ordered_date : (isset($order->created_at) ? $order->created_at : null);
$deliveredAt = isset($order->delivered_date) ? $order->delivered_date : (isset($order->delivered_at) ? $order->delivered_at : null);
$address = isset($order->address) ? $order->address : '-';
$payment = isset($order->payment_method) ? $order->payment_method : '-';
$status = isset($order->status) ? $order->status : 'pending';
?>
<!-- View Single Order -->
<!-- Head -->
<?= view("components/head") ?>

<body class="flex flex-col bg-white min-h-screen">
    <!-- Header -->
    <?= view("components/header") ?>

    <?= view("components/adminPanel") ?>

    <main class="mx-auto mt-6 px-4 sm:px-6 lg:px-8 pb-12 w-full max-w-4xl">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="font-bold text-gray-900 text-2xl">Order Details</h1>
                <p class="text-gray-600 text-sm">View full information for this order.</p>
            </div>
            <div class="flex items-center gap-3">
                <form method="post" action="/admin/orders/<?= urlencode($orderId) ?>/soft-delete" onsubmit="return confirm('Delete this order?');" class="inli"
                    <?= csrf_field() ?>
                    <button type="submit" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-md text-white text-sm">Delete Order</button>
                </form>
            </div>
            <div class="flex items-center gap-3">
                <a href="/orders"><?= view('components/buttons/buttonPrimary', ['text' => 'Back to Orders']) ?> </a>
            </div>
        </div>

        <section class="bg-white shadow-sm p-6 border rounded-md">
            <?php

            switch ($status) {
                case 'pending':
                    $badgeClass = 'bg-yellow-100 text-yellow-800';
                    break;
                case 'processing':
                    $badgeClass = 'bg-blue-100 text-blue-800';
                    break;
                case 'completed':
                case 'delivered':
                    $badgeClass = 'bg-green-100 text-green-800';
                    break;
                case 'cancelled':
                    $badgeClass = 'bg-red-100 text-red-800';
                    break;
                default:
                    $badgeClass = 'bg-gray-100 text-gray-800';
            }

            $customerName = '-';
            if (isset($customer) && is_object($customer)) {
                $first = isset($customer->first_name) ? $customer->first_name : '';
                $last = isset($customer->last_name) ? $customer->last_name : '';
                $customerName = trim($first . ' ' . $last) ?: $customerId;
            }
            ?>
            <div class="flex justify-between items-start gap-4 mb-6">
                <div>
                    <h2 class="font-medium text-gray-900 text-lg">Order #<?= esc($orderId) ?>
                        <div class="text-gray-500 text-sm">Customer: <?= esc($customerName) ?> (ID: <?= esc($customerId) ?>)
                        </div>
                </div>

                <div class="gap-4 grid grid-cols-1 w-full">
                    <div class="bg-gray-50 p-6 rounded-md">
                        <div class="gap-6 grid grid-cols-1 sm:grid-cols-2">
                            <div>
                                <div class="font-semibold text-black text-xs">Ordered Date</div>
                                <div class="mt-1 text-gray-800 text-sm"><?= $orderedAt ? esc(date('Y-m-d H:i', strtotime($orderedAt))) : '-' ?></div>
                            </div>

                            <div>
                                <div class="font-semibold text-black text-xs">Delivered Date</div>
                                <div class="mt-1 text-gray-800 text-sm"><?= $deliveredAt ? esc(date('Y-m-d H:i', strtotime($deliveredAt))) : '-' ?></div>
                            </div>

                            <div>
                                <div class="font-semibold text-black text-xs">Shipping Address</div>
                                <div class="mt-1 text-gray-800 text-sm"><?= nl2br(esc($address)) ?></div>
                            </div>

                            <div>
                                <div class="font-semibold text-black text-xs">Payment Method</div>
                                <div class="mt-1 text-gray-800 text-sm"><?= esc($payment) ?>
                                </div>
                            </div>
                        </div>
                    </div>

        </section>
        <div class="flex items-center gap-3 mt-6">
            <?php if ($status !== 'completed' && $status !== 'cancelled' && $status !== 'delivered'): ?>
                <form method="post" action="/admin/orders/<?= urlencode($orderId) ?>/mark-delivered" onsubmit="return confirm('Mark order <?= esc($orderId) ?> as delivered?');" class="inline"
                    <?= csrf_field() ?>
                    <button type="submit" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded-md text-white text-sm">Mark Delivered</button>
                </form>
        </div>
        </form>
    <?php endif; ?>
    </main>

    <!-- Footer -->
    <?= view("components/footer") ?>
</body>

</html>