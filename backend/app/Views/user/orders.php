<?= view("components/head") ?>

<body class="flex flex-col bg-white min-h-screen">
    <?= view("components/header") ?>

    <main class="mx-auto mt-6 px-4 sm:px-6 lg:px-8 pb-12 w-full max-w-7xl">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="font-bold text-gray-900 text-2xl">My Orders</h1>
                <p class="text-gray-600 text-sm">Track your orders here.</p>
            </div>
        </div>

        <section class="bg-white shadow-sm p-4 border rounded-md">
            <div class="flex justify-between items-center mb-4">
                <div class="text-gray-600 text-sm">
                    Showing <?= count($orders) ?> <?= count($orders) === 1 ? 'order' : 'orders' ?>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="divide-y divide-gray-200 min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 font-medium text-gray-500 text-xs text-left">Order ID</th>
                            <th class="px-4 py-2 font-medium text-gray-500 text-xs text-left">Ordered Date</th>
                            <th class="px-4 py-2 font-medium text-gray-500 text-xs text-left">Delivered Date</th>
                            <th class="px-4 py-2 font-medium text-gray-500 text-xs text-left">Payment Method</th>
                            <th class="px-4 py-2 font-medium text-gray-500 text-xs text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php if (empty($orders)): ?>
                            <tr>
                                <td colspan="5" class="px-4 py-8 text-gray-500 text-sm text-center">
                                    You have no orders.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($orders as $order): ?>
                                <?php
                                // Status badge colors
                                $status = $order->status ?? 'pending';
                                switch ($status) {
                                    case 'pending':
                                        $badgeClass = 'bg-yellow-100 text-yellow-800';
                                        break;
                                    case 'cancelled':
                                        $badgeClass = 'bg-indigo-100 text-indigo-800';
                                        break;
                                    case 'completed':
                                        $badgeClass = 'bg-green-100 text-green-800';
                                        break;
                                    default:
                                        $badgeClass = 'bg-gray-100 text-gray-800';
                                }
                                ?>
                                <tr>
                                    <td class="px-4 py-3 text-gray-700 text-sm"><?= esc($order->id ?? '-') ?></td>
                                    <td class="px-4 py-3 text-gray-700 text-sm"><?= isset($order->ordered_date) ? esc(date('Y-m-d H:i', strtotime($order->ordered_date))) : '-' ?></td>
                                    <td class="px-4 py-3 text-gray-700 text-sm"><?= isset($order->delivered_date) ? esc(date('Y-m-d H:i', strtotime($order->delivered_date))) : '-' ?></td>
                                    <td class="px-4 py-3 text-gray-700 text-sm"><?= esc($order->payment_method ?? '-') ?></td>
                                    <td class="px-4 py-3">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium <?= $badgeClass ?>">
                                            <?= ucfirst(esc($status)) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if (isset($pager) && method_exists($pager, 'links')): ?>
                <div class="mt-4">
                    <?= $pager->links() ?>
                </div>
            <?php endif; ?>
        </section>
    </main>

    <?= view("components/footer") ?>
</body>
</html>