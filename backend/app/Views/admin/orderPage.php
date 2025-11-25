<?php
?>
<!-- Quick Actions -->
<!-- Head -->
<?= view("components/head") ?>

<body class="flex flex-col bg-white min-h-screen">
<!-- Header -->
    <?= view("components/header") ?>

    <main class="mx-auto mt-6 px-4 sm:px-6 lg:px-8 pb-12 w-full max-w-7xl">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="font-bold text-gray-900 text-2xl">Manage Orders</h1>
                <p class="text-gray-600 text-sm">Cancel,Ship Out, Delivered.</p>
            </div>

            <div class="flex items-center gap-3">
                <form method="get" action="" class="flex items-center gap-2">
                    <input
                        type="search"
                        name="q"
                        value="<?= isset($_GET['q']) ? esc($_GET['q']) : '' ?>"
                        placeholder="Search orders or users..."
                        class="px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 w-64 text-sm"
                    />
                    <select name="status" class="px-2 py-2 border rounded-md text-sm">
                        <option value="">All statuses</option>
                        <option value="pending" <?= (isset($_GET['status']) && $_GET['status'] === 'pending') ? 'selected' : '' ?>>Pending</option>
                        <option value="processing" <?= (isset($_GET['status']) && $_GET['status'] === 'processing') ? 'selected' : '' ?>>Processing</option>
                        <option value="completed" <?= (isset($_GET['status']) && $_GET['status'] === 'completed') ? 'selected' : '' ?>>Completed</option>
                        <option value="cancelled" <?= (isset($_GET['status']) && $_GET['status'] === 'cancelled') ? 'selected' : '' ?>>Cancelled</option>
                    </select>
                </form>
            </div>
        </div>

        <section class="bg-white shadow-sm p-4 border rounded-md">
            <div class="flex justify-between items-center mb-4">
                <div class="text-gray-600 text-sm">
                    Showing <?= isset($orders) ? count($orders) : 0 ?> orders
                </div>
                <div>
                    <a href="" class="inline-flex items-center bg-[var(--primary-accent)] hover:bg-[var(--primary-hover)] shadow-sm px-4 py-2 rounded-md text-white text-sm">New Order</a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="divide-y divide-gray-200 min-w-full">
                    <thead class="bg-gray-50">
                        <?php
                            $data = [
                                ["title" => "Order ID"],
                                ["title" => "Customer Name"],
                                ["title" => "Status"],
                                ["title" => "Date"],
                                ["title" => "Action"],
                            ];
                        ?>
                        <?php foreach($data as $title): ?>
                        
                            <th class="px-4 py-2 font-medium text-gray-500 text-xs text-left" id = <?= esc(str_replace(' ', '_', strtolower($title["title"])))?>> <?= esc($title["title"]) ?></th>
                        
                        <?php endforeach; ?>

                        
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php if (empty($orders)): ?>
                            <tr>
                                <td colspan="7" class="px-4 py-8 text-gray-500 text-sm text-center">
                                    No orders found.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($orders as $order): ?>
                                <?php
                                    $status = isset($order['status']) ? $order['status'] : 'unknown';
                                    switch ($status) {
                                        case 'Pending':
                                            $badgeClass = 'bg-yellow-100 text-yellow-800';
                                            break;
                                        case 'Shipped Out':
                                            $badgeClass = 'bg-indigo-100 text-indigo-800';
                                            break;
                                        case 'Delivered':
                                            $badgeClass = 'bg-green-100 text-green-800';
                                            break;
                                        case 'Cancelled':
                                            $badgeClass = 'bg-red-100 text-red-800';
                                            break;
                                        default:
                                            $badgeClass = 'bg-gray-100 text-gray-800';
                                    }
                                ?>
                                <tr>
                                    <td class="px-4 py-3 text-gray-700 text-sm"><?= esc($order['id'] ?? '-') ?></td>
                                    <td class="px-4 py-3 text-gray-700 text-sm">
                                        <?= esc($order['user_name'] ?? $order['user_email'] ?? '-') ?>
                                    </td>
                                    <td class="px-4 py-3 text-gray-700 text-sm"><?= esc($order['items_count'] ?? '-') ?></td>
                                    <td class="px-4 py-3 text-gray-700 text-sm">₱ <?= isset($order['total']) ? number_format($order['total'], 2) : '-' ?></td>
                                    <td class="px-4 py-3">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium <?= $badgeClass ?>">
                                            <?= ucfirst(esc($status)) ?>
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-gray-500 text-sm">
                                        <?= isset($order['created_at']) ? esc(date('Y-m-d H:i', strtotime($order['created_at']))) : '-' ?>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="/admin/orders/<?= urlencode($order['id']) ?>" class="text-indigo-600 hover:underline">View</a>
                                            <a href="/admin/orders/<?= urlencode($order['id']) ?>/edit" class="text-yellow-600 hover:underline">Edit</a>

                                            <?php if ($status !== 'completed' && $status !== 'cancelled'): ?>
                                                <form method="post" action="/admin/orders/<?= urlencode($order['id']) ?>/cancel" onsubmit="return confirm('Are you sure you want to cancel order <?= esc($order['id']) ?>?');" class="inline-block">
                                                    <?= csrf_field() ?>
                                                    <button type="submit" class="text-red-600 hover:underline">Cancel</button>
                                                </form>
                                            <?php endif; ?>
                                        </div>
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

    <!-- Footer -->
    <?= view("components/footer") ?>
</body>

</html>