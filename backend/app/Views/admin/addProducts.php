<?php // app/Views/admin/adminProducts.php
?>

<?= view('components/head') ?>

<body class="flex flex-col bg-white min-h-screen">
    <?= view('components/header') ?>

    <main class="flex-grow p-6">
        <div class="mx-auto max-w-7xl">
            <div class="flex justify-between items-center mb-6">
                <h1 class="font-bold text-gray-900 text-2xl">Menu Management</h1>
                <a href="<?= site_url('admin/products') ?>" class="bg-[var(--primary-accent)] hover:bg-[var(--primary-hover)] px-4 py-2 rounded text-white">
                    Back to List
                </a>
            </div>

            <div class="bg-white shadow p-6 rounded-lg overflow-hidden">
                <h2 class="mb-6 font-semibold text-black text-2xl">Add / Edit Product</h2>

                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="bg-red-100 mb-4 p-3 rounded text-red-800">
                        <ul class="ml-5 list-disc">
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?= site_url('admin/products/save') ?>" class="space-y-6 text-black">
                    <?= csrf_field() ?>

                    <input type="hidden" name="id" value="<?= esc(old('id', $product->id)) ?>">

                    <div>
                        <label for="name" class="block font-medium text-gray-700 text-sm">Name</label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="<?= esc(old('name', $product->name)) ?>"
                            required
                            class="block mt-1 px-3 py-2 border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full" />
                    </div>

                    <div>
                        <label for="description" class="block font-medium text-gray-700 text-sm">Description</label>
                        <textarea
                            id="description"
                            name="description"
                            rows="4"
                            class="block mt-1 px-3 py-2 border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full"><?= esc(old('description', $product->description)) ?></textarea>
                    </div>

                    <div>
                        <label for="img" class="block font-medium text-gray-700 text-sm">Image link (URL)</label>
                        <input
                            id="img"
                            name="img"
                            type="url"
                            value="<?= esc(old('img', $product->img)) ?>"
                            placeholder="https://example.com/image.jpg"
                            class="block mt-1 px-3 py-2 border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full" />
                    </div>

                    <div class="gap-4 grid grid-cols-2">
                        <div>
                            <label for="price" class="block font-medium text-gray-700 text-sm">Price</label>
                            <input
                                id="price"
                                name="price"
                                type="number"
                                step="0.1"
                                min="0"
                                value="<?= esc(old('price', $product->price)) ?>"
                                required
                                class="block mt-1 px-3 py-2 border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full" />
                        </div>

                        <div>
                            <label for="stock" class="block font-medium text-gray-700 text-sm">Stock</label>
                            <input
                                id="stock"
                                name="stock"
                                type="number"
                                step="1"
                                min="0"
                                value="<?= esc(old('stock', $product->stock)) ?>"
                                required
                                class="block mt-1 px-3 py-2 border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full" />
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <?= view("components/buttons/buttonTertiary", ["text" => "Cancel"]) ?>
                        <?= view("components/buttons/buttonSecondary", ["text" => "Save Product", "type" => "submit"]) ?>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?= view('components/footer') ?>
</body>

</html>