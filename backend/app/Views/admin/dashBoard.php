<?= view("components/head") ?>
<?= view("components/header") ?>

<?= view("components/adminPanel") ?>

<body class="flex bg-gray-50 min-h-screen">

    <section class="mx-auto px-6 py-12 container">

        <div class="flex justify-between items-center mb-6">
            <h1 class="font-bold text-gray-900 text-2xl">Dashboard</h1>
        </div>

        <!-- PAGE CONTENT BELOW -->

        <div class="gap-10 grid grid-cols-1">

            <!-- Recent Activity
            <div class="bg-white shadow p-6 border border-gray-200 rounded-lg">
                <h3 class="mb-4 pb-3 border-b font-bold text-gray-800 text-xl">
                    Recent Activity
                </h3>

                <p class="text-gray-600">No recent activity</p>
            </div> -->

            <!-- Statistics -->
            <div class="bg-white shadow p-6 border border-gray-200 rounded-lg">
                <h3 class="mb-4 pb-3 border-b font-bold text-gray-800 text-xl">
                    Statistics
                </h3>

                <div class="space-y-4 text-gray-700">
                    <div class="flex justify-between items-center">
                        <span>Active Orders:</span>
                        <span class="font-bold text-gray-900">0</span> <!-- add backend -->
                    </div>

                    <div class="flex justify-between items-center">
                        <span>Available Products:</span>
                        <span class="font-bold text-gray-900">0</span> <!-- add backend -->
                    </div>

                    <div class="flex justify-between items-center">
                        <span>Today's Revenue:</span>
                        <span class="font-bold text-gray-900">$0</span> <!-- add backend -->
                    </div>
                </div>
            </div>

        </div>

    </section>

    <?= view("components/footer") ?>

</body>

</html>