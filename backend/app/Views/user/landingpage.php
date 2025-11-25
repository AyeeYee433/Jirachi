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
<body>
  <!-- Header -->

  <!-- Hero Section -->
  <section class="flex flex-col flex-1 justify-center items-center py-16 text-center" id="shop">
    <img src="https://dendenotakushop.com/cdn/shop/files/KuripanPlushieMatikanetannhauserUmamusume-PrettyDerby_0.jpg?v=1724820492"
      alt="Cute Plushies"
      class="shadow-lg mx-auto mb-6 rounded-full w-40 h-40 object-cover">
    <h2 class="mb-4 font-extrabold text-pink-700 text-4xl">Snuggle Up With Gappy's Plushies!</h2>
    <a href="/shop" class="bg-pink-500 hover:bg-pink-600 shadow px-8 py-3 rounded-full font-semibold text-white transition">
      Shop Now
    </a>
  </section>

  <!-- Featured Plushies -->
  <section class="mx-auto px-8 py-12 container">
    <h3 class="mb-6 font-bold text-pink-600 text-2xl text-center">Featured Plushies</h3>
    <div class="gap-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
      <?php
      // Example featured items array
      $featured = [
        ['name' => 'miku', 'img' => 'https://preview.redd.it/someone-please-tell-me-the-name-or-brand-of-these-dumb-baby-v0-mdyzk434thyc1.jpeg?width=640&crop=smart&auto=webp&s=ff622154f2ed8a079928df3eb97e7b187996df3b', 'desc' => 'Miku Dayo Miku Dayo Miku Dayo.', 'price' => 90],
        ['name' => 'kasane teto', 'img' => 'https://ae01.alicdn.com/kf/Se391c4a6ec514b95aede38073aeacae68.jpg', 'desc' => 'Teto Word of the day.'],
        ['name' => 'astolfo', 'img' => 'https://images.steamusercontent.com/ugc/1009311134773801268/E203DA9938236DBFAC6A286313092C352BA74A2F/?imw=637&imh=358&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true', 'desc' => 'Soft, squishy, and maybe a little haunted.', 'price' => 67],
      ];
      foreach ($featured as $item): ?>
        <div class="flex flex-col items-center bg-[var(--primary)] shadow-lg p-4 border border-gray-100 rounded-lg max-w-sm overflow-hidden">
                    <img src="<?= esc($item['img'] ?? 'path/to/image.jpg') ?>" alt="<?= esc($item['name'] ?? 'Image') ?>" class="mx-auto rounded-md w-[90%] object-cover aspect-square">

                    <div class="flex flex-col items-start mt-4 w-full">
                        <h3 class="font-montserrat font-bold text-gray-900 text-lg"><?= esc($item['name'] ?? 'Name') ?></h3>

                        <?php if (isset($price)) : ?>
                            <p class="mt-2 font-inter font-semibold text-gray-900">$<?=  esc(item['price'] ?? '0.00') ?></p>
                        <?php endif; ?>

                        <p class="mt-1 font-inter text-gray-700 text-sm"><?=  esc($item['desc'] ?? 'Description') ?></p>

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
  <section class="bg-pink-50 py-12" id="about">
    <div class="mx-auto px-4 text-center container">
      <h3 class="mb-4 font-bold text-pink-600 text-2xl">About Gappy's Plushies</h3>
      <p class="mx-auto max-w-2xl text-gray-700">
        Gappy's Plushies is a family-run store dedicated to bringing joy and comfort through our curated selection of plush toys. Every plushy is chosen for its quality, softness, and irresistible charm. Whether you're gifting a friend or treating yourself, we have the perfect snuggle buddy for you!
      </p>
    </div>
  </section>

  <!-- Footer -->
</body>
