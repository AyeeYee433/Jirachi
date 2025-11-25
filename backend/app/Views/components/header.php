<header class="bg-[var(--primary)]">
  <?php
    $session = session();
    $user = $session->get('user');
  ?>
  <div class="flex justify-between items-center mx-auto px-4 py-6 container">
    <h1 class="font-bold text-[var(--primary-accent)] text-3xl">Gappy's Plushies</h1>
    <nav>
      <?php if ($session->has('user')): ?>
        <a href="#" role="button" onclick="confrimLogout()" class="px-4 text-[var(--primary-accent)] hover:text-[var(--primary-hover)]">Logout</a>
        <a href="/cart" class="px-4 text-[var(--primary-accent)] hover:text-[var(--primary-hover)]">Cart</a>
      <?php else: ?>
        <a href="/login" class="px-4 text-[var(--primary-accent)] hover:text-[var(--primary-hover)]">Login</a>
        <a href="/signUp" class="px-4 text-[var(--primary-accent)] hover:text-[var(--primary-hover)]">Sign In</a>
      <?php endif; ?>
      <a href="/" class="px-4 text-[var(--primary-accent)] hover:text-[var(--primary-hover)]">Home</a>

      <a href="/mood" class="px-4 text-[var(--primary-accent)] hover:text-[var(--primary-hover)]">Moodboard</a>
      <a href="/road" class="px-4 text-[var(--primary-accent)] hover:text-[var(--primary-hover)]">Roadmap</a>
    </nav>
  </div>
</header>

<script>
function confirmLogout(event) {
    event.preventDefault();
    if (confirm("Are you sure you want to log out?")) {
        // use location.href so it behaves like a normal link (GET /logout)
        window.location.href = "<?= site_url('/logout') ?>";
    }
}
</script>