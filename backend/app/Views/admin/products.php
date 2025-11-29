<?php
?>
<?= view("components/head") ?>

<body class="flex flex-col bg-white min-h-screen">
    <?= view("components/header") ?>

    <!-- Main Content -->
    <?= view("components/adminPanel") ?>
    <main class="flex-grow p-6">
        <div class="mx-auto max-w-7xl">
            <div class="flex justify-between items-center mb-6">
                <h1 class="font-bold text-gray-900 text-2xl">List of Available Products</h1>
                <button onclick="window.location.href='/adprod'" class="bg-[var(--primary-accent)] hover:bg-[var(--primary-hover)] px-4 py-2 rounded text-white">
                    Add New Item
                </button>
            </div>

            <!-- Menu Items Table -->
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="divide-y divide-gray-200 min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 font-medium text-gray-500 text-xs text-left uppercase tracking-wider">Image</th>
                            <th class="px-6 py-3 font-medium text-gray-500 text-xs text-left uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 font-medium text-gray-500 text-xs text-left uppercase tracking-wider">Price</th>
                            <th class="px-6 py-3 font-medium text-gray-500 text-xs text-left uppercase tracking-wider">Description</th>
                            <th class="px-6 py-3 font-medium text-gray-500 text-xs text-left uppercase tracking-wider">Stock</th>
                            <th class="px-6 py-3 font-medium text-gray-500 text-xs text-left uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php if (!empty($products)): ?>
                            <?php foreach ($products as $item): ?>
                                <tr>
                                    <td class="px-6 py-4">
                                        <img src="<?= esc($item->img) ?>" class="rounded w-16 h-16 object-cover">
                                    </td>

                                    <td class="px-6 py-4 text-gray-900"><?= esc($item->name) ?></td>

                                    <td class="px-6 py-4 text-gray-900">$<?= number_format($item->price, 2) ?></td>

                                    <td class="px-6 py-4 text-gray-500"><?= esc($item->description) ?></td>

                                    <td class="px-6 py-4 text-gray-900"><?= esc($item->stock) ?></td>

                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <a href="<?= site_url('admin/products/edit/' . $item->id) ?>" class="text-blue-600 hover:underline">
                                                Edit
                                            </a>>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-gray-500 text-center">
                                    No products found.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this menu item?')) {
                window.location.href = `/admin/menu/delete/${id}`;
            }
        }
    </script>

    <!-- Footer -->
    <?= view("components/footer") ?>
</body>

</html>