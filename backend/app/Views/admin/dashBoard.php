<?= view("components/head") ?>
<?= view("components/header") ?>

<?= view("components/adminPanel") ?>

<body class="flex bg-gray-50 min-h-screen">

    <section class="mx-auto px-6 py-12 container">

        <div class="flex justify-between items-center mb-6">
            <h1 class="font-bold text-gray-900 text-2xl">Dashboard</h1>
        </div>

        <!-- PAGE CONTENT BELOW -->

        <div class="overflow-x-auto">
            <table class="divide-y divide-gray-200 min-w-full">
                <thead class="bg-gray-50">
                    <?php
                    $headers = [
                        ["title" => "User ID"],
                        ["title" => "Username"],
                        ["title" => "Email"],
                        ["title" => "Account Type"],
                        ["title" => "Date Created"],
                        ["title" => "Actions"]
                    ];
                    ?>
                    <?php foreach ($headers as $header): ?>
                        <th class="px-4 py-2 font-medium text-gray-500 text-xs text-left" id="<?= esc(str_replace(' ', '_', strtolower($header["title"]))) ?>">
                            <?= esc($header["title"]) ?>
                        </th>
                    <?php endforeach; ?>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php
                    // Filter users with null deleted_at
                    $activeUsers = array_filter($users ?? [], function ($user) {
                        return empty($user->deleted_at);
                    });
                    ?>
                    <?php if (empty($activeUsers)): ?>
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-gray-500 text-sm text-center">
                                No users found.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($activeUsers as $user): ?>
                            <tr>
                                <td class="px-4 py-3 text-gray-700 text-sm"><?= esc($user->id ?? '-') ?></td>
                                <td class="px-4 py-3 text-gray-700 text-sm"><?= esc($user->username ?? '-') ?></td>
                                <td class="px-4 py-3 text-gray-700 text-sm"><?= esc($user->email ?? '-') ?></td>
                                <td class="px-4 py-3 text-gray-700 text-sm"><?= esc(ucfirst($user->type ?? '-')) ?></td>
                                <td class="px-4 py-3 text-gray-700 text-sm"><?= esc($user->created_at ?? '-') ?></td>
                                <td class="px-4 py-3 text-sm text-left">
                                    <div class="inline-flex items-center gap-2">
                                        <form method="post"
                                            action="/deleteUser/<?= $user->id ?>"
                                            onsubmit=" return confirm('Delete this order?');"
                                            class="inline">

                                            <?= csrf_field() ?>

                                            <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-md text-white text-sm">
                                                Delete User
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </section>

    <?= view("components/footer") ?>

</body>

</html>