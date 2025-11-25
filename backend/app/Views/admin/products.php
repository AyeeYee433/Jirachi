<?php
?>
<?= view("components/head") ?>

<body class="flex flex-col bg-white min-h-screen">
    <?= view("components/header") ?>

    <!-- Main Content -->
    <main class="flex-grow p-6">
        <div class="mx-auto max-w-7xl">
            <div class="flex justify-between items-center mb-6">
                <h1 class="font-bold text-gray-900 text-2xl">Menu Management</h1>
                <button onclick="window.location.href=''" class="bg-[var(--primary-accent)] hover:bg-[var(--primary-hover)] px-4 py-2 rounded text-white">
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
                            <th class="px-6 py-3 font-medium text-gray-500 text-xs text-left uppercase tracking-wider">Category</th>
                            <th class="px-6 py-3 font-medium text-gray-500 text-xs text-left uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
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