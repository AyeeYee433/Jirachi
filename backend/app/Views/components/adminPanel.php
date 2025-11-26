<!-- ADMIN PANEL -->
<div class="bg-white shadow mb-10 p-6 border border-gray-200 rounded-lg">
    <h2 class="mb-4 font-extrabold text-[var(--primary-accent)] text-2xl">Admin Panel</h2>
    <h4 class="mb-4 text-[var(--primary-accent)]">Quick Actions</h4>
    <div class="gap-4 grid grid-cols-2 sm:grid-cols-3">

        <a href="/dashboard"
            <?= view("components/buttons/buttonAdmin", ["text" => "Dashboard"]) ?>
            </a>

            <a href="/orders"
                <?= view("components/buttons/buttonAdmin", ["text" => "Manage Order"]) ?>
                Orders
                </a>

                <a href="/products"
                    <?= view("components/buttons/buttonAdmin", ["text" => "Menu Management"]) ?>
                    Products
                    </a>


    </div>
</div>