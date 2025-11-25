 <!--
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Gappy's Plushies - Welcome!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  Tailwind CSS via CDN
  <script src="https://cdn.tailwindcss.com"></script>
</head>
 -->
<?= view("components/head") ?>
<?= view("components/header") ?>
<body>
  <!-- Header -->

  <!-- Hero Section -->
  <section class="flex flex-col flex-1 justify-center items-center py-16 text-center" id="shop">
    <img src="https://dendenotakushop.com/cdn/shop/files/KuripanPlushieMatikanetannhauserUmamusume-PrettyDerby_0.jpg?v=1724820492"
      alt="Cute Plushies"
      class="shadow-lg mx-auto mb-6 rounded-full w-40 h-40 object-cover">
    <h2 class="mb-4 font-extrabold text-[var(--primary-accent)] text-4xl">Snuggle Up With Gappy's Plushies!</h2>
    <a href="/shop" class="bg-[var(--primary-accent)] hover:bg-[var(--primary-hover)] shadow px-8 py-3 rounded-full font-semibold text-white transition">
      Shop Now
    </a>
  </section>

  <!-- Featured Plushies -->
  <section class="mx-auto px-8 py-12 container">
    <h3 class="mb-6 font-bold text-[var(--primary-accent)] text-2xl text-center">Featured Plushies</h3>
    <div class="gap-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
      <?php foreach ($products as $product): ?>
        <div class="flex flex-col items-center bg-[var(--primary)] shadow-lg p-4 border border-gray-100 rounded-lg max-w-sm overflow-hidden">
            <img src="<?= esc($product->img ?? 'https://dendenotakushop.com/cdn/shop/files/KuripanPlushieMatikanetannhauserUmamusume-PrettyDerby_0.jpg?v=1724820492') ?>" 
                alt="<?= esc($product->name ?? 'Product') ?>" 
                class="mx-auto rounded-md w-[90%] object-cover aspect-square">

            <div class="flex flex-col items-start mt-4 w-full">
                <h3 class="font-montserrat font-bold text-gray-900 text-lg"><?= esc($product->name) ?></h3>

                <?php if (isset($product->price)): ?>
                    <p class="mt-2 font-inter font-semibold text-gray-900">$<?= number_format($product->price, 2) ?></p>
                <?php endif; ?>

                <p class="mt-1 font-inter text-gray-700 text-sm"><?= esc($product->description) ?></p>

                <div class="flex justify-center mt-3 w-full">
                    <div class="flex flex-col items-center">
                        <button type="button"
                            class="bg-[var(--primary-accent)] hover:bg-white px-5 py-2.5 border-[var(--primary-accent)] border-2 rounded-md focus:outline-none focus:ring-[var(--primary-accent)] focus:ring-2 focus:ring-offset-2 font-montserrat font-medium text-white hover:text-[var(--primary-accent)] active:scale-95 transition">
                            Add to cart
                        </button>
                        <span class="mt-2 text-gray-700 text-sm">Secondary</span>
                    </div>
                </div>
            </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- About Section -->
  <section class="bg-[var(--primary)] py-12" id="about">
    <div class="mx-auto px-4 text-center container">
      <h3 class="mb-4 font-bold text-[var(--primary-accent)] text-2xl">About Gappy's Plushies</h3>
      <p class="mx-auto max-w-2xl text-gray-700">
        Gappy's Plushies is a family-run store dedicated to bringing joy and comfort through our curated selection of plush toys. Every plushy is chosen for its quality, softness, and irresistible charm. Whether you're gifting a friend or treating yourself, we have the perfect snuggle buddy for you!
      </p>
    </div>
  </section>

  <!-- Footer -->
</body>
