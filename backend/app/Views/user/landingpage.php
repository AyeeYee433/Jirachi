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
    <img src="https://plushkrush.com/cdn/shop/files/Bow_Pajamas_Mascot_Sleep_Mask_Kuromi_Plushie.png?v=1731880264" alt="Cute Plushies" class="shadow-lg mx-auto mb-6 rounded-full w-40 h-40 object-cover">
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
        <?= view("components/cards/cardPrimary", ["id" => $product->id, "img" => $product->img, "name" => $product->name, "price" => $product->price, "desc" => $product->description, "buttonType" => "submit"]) ?>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- About Section -->
  <section class="bg-[var(--primary-ghost)] py-12" id="about">
    <div class="mx-auto px-4 text-center container">
      <h3 class="mb-4 font-bold text-[var(--primary-accent)] text-2xl">About Gappy's Plushies</h3>
      <p class="mx-auto max-w-2xl text-gray-700">
        Gappy's Plushies is a family-run store dedicated to bringing joy and comfort through our curated selection of plush toys. Every plushy is chosen for its quality, softness, and irresistible charm. Whether you're gifting a friend or treating yourself, we have the perfect snuggle buddy for you!
      </p>
    </div>
  </section>

  <!-- Footer -->
  <?=  view("components/footer") ?>
</body>
