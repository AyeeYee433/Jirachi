<div class="bg-[var(--primary)] shadow-lg border border-gray-100 rounded-lg max-w-sm overflow-hidden">
    <div class="bg-[var(--primary)] shadow-lg border border-[var(--primary-accent)] rounded-lg max-w-md overflow-hidden">
    <div class="flex items-center p-6">
        <div class="flex justify-center w-full">
            <img src="<?= esc($img ?? 'path/to/image.jpg') ?>"
                    alt="<?= esc($name ?? 'Image') ?>"
                    class="mx-auto border-[var(--primary-ghost)] border-2 rounded-lg w-4/5 object-cover">
        </div>
    </div>
    <div class="p-4">
        <h4 class="font-montserrat font-semibold text-gray-900 text-xl"><?=  esc($name ?? 'Name') ?></h4>

        <?php if (isset($price)) : ?>
            <p class="block mb-2 font-inter font-semibold text-gray-900">$<?=  esc($price) ?></p>
        <?php endif; ?>

        <s class="block font-inter text-gray-700 text-base"><?=  esc($desc ?? 'Description') ?></s
    </div>
    <div class="flex justify-center px-4 pb-4">
        <?= view("components/buttons/buttonPrimary", ["text" => "Add to Cart"]) ?>
    </div>
</div>