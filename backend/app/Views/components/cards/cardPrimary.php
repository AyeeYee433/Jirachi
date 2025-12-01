<form method="post" action="<?= site_url('productPage') ?>">
    <div class="flex flex-col items-center bg-[var(--primary)] shadow-lg p-4 border border-gray-100 rounded-lg max-w-sm overflow-hidden">
        <input type="hidden" name="product_id" value="<?= esc($id ?? 1)?>">
        <img src="<?= esc($img ?? 'path/to/image.jpg') ?>" alt="<?= esc($name ?? 'Image') ?>" class="mx-auto rounded-md w-[90%] object-cover aspect-square">

        <div class="flex flex-col items-start mt-4 w-full">
            <h3 class="font-montserrat font-bold text-gray-900 text-lg"><?= esc($name ?? 'Name') ?></h3>

            <p class="mt-2 font-inter font-semibold text-gray-900">$<?= esc($price ?? 0.00) ?></p>

            <p class="mt-1 font-inter text-gray-700 text-sm"><?= esc($desc ?? 'Description') ?></p>

            <div class="flex justify-center mt-3 w-full">
                <div class="flex flex-col items-center">
                    <?= view("components/buttons/buttonPrimary", ["text" => "Add to Cart", "type" => esc($buttonType ?? "submit")]) ?>
                </div>
            </div>
        </div>
    </div>
</form>