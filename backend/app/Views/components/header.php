<header class="relative bg-[url('https://pbs.twimg.com/media/G62qyqfbQAAF186?format=png&name=medium')] bg-[var(--primary)] bg-cover bg-no-repeat bg-center">

  <?php
  $session = session();
  $user = $session->get('user');
  ?>

  <div class="flex justify-between items-center mx-auto px-4 py-6 container">
    <!-- Logo and Site Name -->
    <a href="/">
      <div class="flex items-center space-x-3">
        <img src="https://i.imgur.com/LMG5nlF.png" alt="Gappy's Plushies Logo" class="w-14 h-auto object-contain">
        <h1 class="font-bold text-[var(--primary-accent)] text-3xl">Gappy's Plushies</h1>
      </div>
    </a>
    <!-- Navigation -->
    <nav class="flex items-center space-x-2">
      <?php if ($session->has('user')): ?>
        <a href="#" role="button" onclick="confirmLogout(event)" class="px-4 text-[var(--primary-accent)] hover:text-[var(--primary-hover)]">Logout</a>
        <a href="/cart" class="px-4 text-[var(--primary-accent)] hover:text-[var(--primary-hover)]">Cart</a>
        <a href="/myOrders" class="px-4 text-[var(--primary-accent)] hover:text-[var(--primary-hover)]">My Orders</a>
      <?php else: ?>
        <a href="/login" class="px-4 text-[var(--primary-accent)] hover:text-[var(--primary-hover)]">Login</a>
        <a href="/signUp" class="px-4 text-[var(--primary-accent)] hover:text-[var(--primary-hover)]">Sign Up</a>
      <?php endif; ?>
      <a href="/" class="px-4 text-[var(--primary-accent)] hover:text-[var(--primary-hover)]">Home</a>
    </nav>
  </div>
</header>

<script>
  function confirmLogout(event) {
    event.preventDefault();
    if (confirm("Are you sure you want to log out?")) {
      window.location.href = "<?= site_url('/logout') ?>";
    }
  }
</script>