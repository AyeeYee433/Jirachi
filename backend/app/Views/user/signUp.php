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
<div class="flex flex-col justify-center items-center min-h-screen font-sans">
    <div class="bg-white shadow-lg p-8 border border-[var(--primary-ghost)] rounded-xl w-full max-w-md">
        <div class="flex flex-col items-center mb-6">
            <img src="https://dendenotakushop.com/cdn/shop/files/KuripanPlushieMatikanetannhauserUmamusume-PrettyDerby_0.jpg?v=1724820492" alt="Cute Plushies" class="shadow-lg mx-auto mb-6 rounded-full w-40 h-40 object-cover">
            <h1 class="mb-1 font-bold text-[var(--primary-accent)] text-2xl">Yokoso User!</h1>
            <p class="text-gray-500 text-sm">Sign in today!</p>
        </div>
        <?php if (!empty($error)): ?>
            <div class="bg-pink-100 mb-4 px-4 py-2 border border-pink-300 rounded text-pink-700">
                <?= esc($error) ?>
            </div>
        <?php endif; ?>
        <form method="post" action="<?= site_url('signUp') ?>" class="space-y-5" novalidate>
        <div>
                <label for="first_name" class="block font-medium text-[var(--primary-accent)] text-sm">First Name</label>
                <input type="first_name" id="first_name" name="first_name" required
                    class="block bg-[var(--primary)] mt-1 px-4 py-2 border-pink-300 focus:border-pink-500 rounded-lg focus:ring-pink-500 w-full text-gray-700" />
            </div>
            <div>
                <label for="last_name" class="block font-medium text-[var(--primary-accent)] text-sm">Last Name</label>
                <input type="last_name" id="last_name" name="last_name" required
                    class="block bg-[var(--primary)] mt-1 px-4 py-2 border-pink-300 focus:border-pink-500 rounded-lg focus:ring-pink-500 w-full text-gray-700" />
            </div>
            <div>
                <label for="user" class="block font-medium text-[var(--primary-accent)] text-sm">Username</label>
                <input type="username" id="username" name="username" required
                    class="block bg-[var(--primary)] mt-1 px-4 py-2 border-pink-300 focus:border-pink-500 rounded-lg focus:ring-pink-500 w-full text-gray-700" />
            </div>
            <div>
                <label for="email" class="block font-medium text-[var(--primary-accent)] text-sm">Email</label>
                <input type="email" id="email" name="email" required
                    class="block bg-[var(--primary)] mt-1 px-4 py-2 border-pink-300 focus:border-pink-500 rounded-lg focus:ring-pink-500 w-full text-gray-700" />
            </div>
            <div>
                <label for="address" class="block font-medium text-[var(--primary-accent)] text-sm">Address</label>
                <input type="address" id="address" name="address" required
                    class="block bg-[var(--primary)] mt-1 px-4 py-2 border-pink-300 focus:border-pink-500 rounded-lg focus:ring-pink-500 w-full text-gray-700" />
            </div>
            <div>
                <label for="password" class="block font-medium text-[var(--primary-accent)] text-sm">Password</label>
                <input type="password" id="password" name="password" required
                    class="block bg-[var(--primary)] mt-1 px-4 py-2 border-pink-300 focus:border-pink-500 rounded-lg focus:ring-pink-500 w-full text-gray-700" />
            </div>
            <div>
                <label for="confirm" class="block font-medium text-[var(--primary-accent)] text-sm">Confirm Password</label>
                <input type="password" id="confirm" name="confirm" required
                    class="block bg-[var(--primary)] mt-1 px-4 py-2 border-pink-300 focus:border-pink-500 rounded-lg focus:ring-pink-500 w-full text-gray-700" />
            </div>
            <button type="submit"
                class="bg-[var(--primary-accent)] hover:bg-[var(--primary-hover)] shadow px-4 py-2 rounded-lg w-full font-semibold text-white transition">
                Sign up
            </button>
        </form>
        <div class="mt-6 text-center">
            <a href="/login" class="text-blue-500 text-sm hover:underline">
                Already have an account? Log In.
            </a>
        </div>
    </div>

</div>
<footer ><?= view('components/footer')?> </footer>
</body>
</html>