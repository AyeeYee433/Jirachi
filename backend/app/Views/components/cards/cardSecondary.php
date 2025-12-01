<div class="bg-[var(--primary)] shadow-lg border border-gray-100 rounded-lg max-w-sm overflow-hidden">
    <img src="<?=  esc($img ?? 'path/to/image.jpg') ?>" alt="<?=  esc($name ?? 'Image') ?>" class="w-full h-48 object-cover">
    <div class="p-4">
        <h3 class="mb-2 font-montserrat font-bold text-gray-900 text-lg"><?=  esc($name ?? 'Name') ?></h3>

        <?php if (isset($price)) : ?>
            <p class="mb-2 font-inter font-semibold text-gray-900">$<?=  esc($price) ?></p>
        <?php endif; ?>

        <p class="mb-4 font-inter text-gray-700"><?=  esc($desc ?? 'Description') ?></p>

        <div class="flex justify-center">
            <?= view("components/buttons/buttonPrimary", ["text" => "Add to Cart"]) ?>
        </div>
    </div>
</div>