<?= view("components/head") ?>
<header class="bg-[var(--primary)]">
  <div class="flex justify-between items-center mx-auto px-4 py-6 container">
    <h1 class="font-bold text-[var(--primary-accent)] text-3xl">Gappy's Plushies</h1>
    <nav>
      <a href="/" class="px-4 text-[var(--primary-accent)] hover:text-[var(--primary-hover)]">Home</a>
      <a href="/login" class="px-4 text-[var(--primary-accent)] hover:text-[var(--primary-hover)]">Login</a>
      <a href="/signUp" class="px-4 text-[var(--primary-accent)] hover:text-[var(--primary-hover)]">Sign In</a>
      <a href="/mood" class="px-4 text-[var(--primary-accent)] hover:text-[var(--primary-hover)]">Moodboard</a>
      <a href="/road" class="px-4 text-[var(--primary-accent)] hover:text-[var(--primary-hover)]">Roadmap</a>
      <a href="/cart" class="text-[var(--primary-accent)] hover:text-[var(--primary-hover)]">Cart</a>
    </nav>
  </div>
</header>