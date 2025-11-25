<!-- app/Views/user/login.php -->
<!-- 
    Login page styled to match the landing page vibe and color palette.
    Uses Tailwind via CDNJS. 
    Data contract: expects $error (string|null) for error message.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Gappy's Plushies</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS via CDNJS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            /* Soft pastel background, matching landing page */
            background: linear-gradient(135deg, #f9fafb 0%, #fce7f3 100%);
        }
    </style>
</head>
<?= view("components/head") ?>
<body>
    <?php
    $errors = $errors ?? [];
    $old = $old ?? [];?>

<?=view ('components/header')?>
<div class="min-h-screen flex flex-col justify-center items-center font-sans">
    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8 border border-[var(--primary-ghost)]">
        <div class="flex flex-col items-center mb-6">
            <img src="https://dendenotakushop.com/cdn/shop/files/KuripanPlushieMatikanetannhauserUmamusume-PrettyDerby_0.jpg?v=1724820492" alt="Cute Plushies" class="mx-auto rounded-full shadow-lg w-40 h-40 mb-6 object-cover">
            <h1 class="text-2xl font-bold text-[var(--primary-accent)] mb-1">Yokoso User!</h1>
            <p class="text-sm text-gray-500">Sign in today!</p>
        </div>
        <?php if (!empty($error)): ?>
            <div class="mb-4 px-4 py-2 bg-pink-100 border border-pink-300 text-pink-700 rounded">
                <?= esc($error) ?>
            </div>
        <?php endif; ?>
        <form method="post" action="<?= site_url('signUp') ?>" class="space-y-5" novalidate>
        <div>
                <label for="first_name" class="block text-sm font-medium text-pink-700">First Name</label>
                <input type="first_name" id="first_name" name="first_name" required
                    class="mt-1 block w-full rounded-lg border-pink-300 focus:border-pink-500 focus:ring-pink-500 text-gray-700 px-4 py-2 bg-[var(--primary)]" />
            </div>
            <div>
                <label for="last_name" class="block text-sm font-medium text-pink-700">Last Name</label>
                <input type="last_name" id="last_name" name="last_name" required
                    class="mt-1 block w-full rounded-lg border-pink-300 focus:border-pink-500 focus:ring-pink-500 text-gray-700 px-4 py-2 bg-[var(--primary)]" />
            </div>
          <div>
                <label for="user" class="block text-sm font-medium text-pink-700">Username</label>
                <input type="user" id="user" name="user" required
                    class="mt-1 block w-full rounded-lg border-pink-300 focus:border-pink-500 focus:ring-pink-500 text-gray-700 px-4 py-2 bg-[var(--primary)]" />
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-pink-700">Email</label>
                <input type="email" id="email" name="email" required
                    class="mt-1 block w-full rounded-lg border-pink-300 focus:border-pink-500 focus:ring-pink-500 text-gray-700 px-4 py-2 bg-[var(--primary)]" />
            </div>
            <div>
                <label for="address" class="block text-sm font-medium text-pink-700">Address</label>
                <input type="address" id="address" name="address" required
                    class="mt-1 block w-full rounded-lg border-pink-300 focus:border-pink-500 focus:ring-pink-500 text-gray-700 px-4 py-2 bg-[var(--primary)]" />
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-pink-700">Password</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 block w-full rounded-lg border-pink-300 focus:border-pink-500 focus:ring-pink-500 text-gray-700 px-4 py-2 bg-[var(--primary)]" />
            </div>
            <div>
                <label for="confirm" class="block text-sm font-medium text-pink-700">Confirm Password</label>
                <input type="password" id="confirm" name="confirm" required
                    class="mt-1 block w-full rounded-lg border-pink-300 focus:border-pink-500 focus:ring-pink-500 text-gray-700 px-4 py-2 bg-[var(--primary)]" />
            </div>
            <button type="submit"
                class="w-full py-2 px-4 rounded-lg bg-pink-500 hover:bg-pink-600 text-white font-semibold shadow transition">
                Sign In
            </button>
        </form>
        <div class="mt-6 text-center">
            <a href="/login" class="text-blue-500 hover:underline text-sm">
                Already have an account? Log In.
            </a>
        </div>
    </div>

</div>
<footer ><?= view('components/footer')?> </footer>
</body>
</html>