<?= view("components/head") ?>
<header class="bg-[var(--primary)]">
    <div class="container mx-auto px-4 py-6 flex items-center justify-between">
      <h1 class="text-3xl font-bold text-[var(--primary-accent)]">Gappy's Plushies</h1>
      <nav>
        <a href="/" class="text-[var(--primary-accent)] hover:text-[var(--primary-hover)] px-4">Home</a>
        <a href="/login" class="text-[var(--primary-accent)] hover:text-[var(--primary-hover)] px-4">Login</a>
        <a href="/signUp" class="text-[var(--primary-accent)] hover:text-[var(--primary-hover)] px-4">Sign In</a>
        <a href="/dash" class="text-[var(--primary-accent)] hover:text-[var(--primary-hover)] px-4">Moodboard</a>
        <a href="/products" class="text-[var(--primary-accent)] hover:text-[var(--primary-hover)]">Roadmap</a>
      </nav>
    </div>
  </header>