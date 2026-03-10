<?= view("components/head") ?>
<?= view("components/header") ?>

<?php
$subtotal = 0;
foreach ($cart as $item) {
    $subtotal += $item['product_price'] * $item['quantity'];
}
?>

<body class="bg-gray-50">

<section class="mx-auto px-6 py-16 max-w-xl container">

    <h2 class="mb-10 font-extrabold text-[var(--primary-accent)] text-3xl text-center">
        Checkout Summary
    </h2>

    <?php if (empty($cart)): ?>
        <div class="bg-white shadow p-10 py-16 rounded-lg text-center">
            <p class="mb-4 text-gray-600 text-lg">Your cart is empty</p>
            <a href="/shop">
                <?= view("components/buttons/buttonPrimary", ["text" => "Go Shopping"]) ?>
            </a>
        </div>
    <?php else: ?>
        <form action="/place_order" method="post">
            <div class="bg-white shadow p-6 border border-gray-200 rounded-lg">

                <h3 class="mb-4 pb-3 border-b font-bold text-gray-800 text-xl">
                    Order Summary
                </h3>

                <?php foreach ($cart as $item): ?>
                    <div class="flex justify-between items-center mt-3 pt-3 font-bold text-gray-900 text-lg">
                        <div class="flex items-center">
                            <img src="<?= esc($item['product_img']) ?>"
                                 alt="<?= esc($item['product_name']) ?>"
                                 class="mr-6 border rounded-lg w-24 h-24 object-cover">
                            <h3 class="font-bold text-gray-900 text-lg"><?= esc($item['product_name']) ?></h3>
                        </div>
                        $<?= esc($item['product_price']) * esc($item['quantity']) ?>
                    </div>
                <?php endforeach; ?>

                <div class="flex justify-between mt-3 pt-3 border-t font-bold text-gray-900 text-lg">
                    <span>Total</span>
                    <span>$<?= number_format($subtotal, 2) ?></span>
                </div>

                <!-- Card Inputs -->
                <div class="mt-4">
                    <label class="block mb-1 font-semibold">Card Number</label>
                    <input id="cardNumber" type="text" maxlength="19"
                           class="px-3 py-2 border rounded w-full text-black"
                           placeholder="1234 5678 9012 3456">
                </div>

                <div class="mt-4">
                    <label class="block mb-1 font-semibold">Expiry</label>
                    <input id="cardExpiry" type="text"
                           class="px-3 py-2 border rounded w-full text-black"
                           placeholder="MM/YY">
                </div>

                <div class="mt-4">
                    <label class="block mb-1 font-semibold">CVV</label>
                    <input id="cardCvv" type="text" maxlength="4"
                           class="px-3 py-2 border rounded w-full text-black"
                           placeholder="123">
                </div>

                <!-- Buttons -->
                <div class="flex justify-between items-center mt-6 pt-3 border-t font-bold text-gray-900 text-lg">
                    <a href="/cart" class="block">
                        <?= view("components/buttons/buttonSecondary", ["text" => "Back to Cart"]) ?>
                    </a>

                    <button id="placeOrderBtn" type="submit" disabled
                            class="bg-gray-400 px-4 py-2 rounded font-bold text-white transition-all duration-200 cursor-not-allowed">
                        Place Order
                    </button>
                </div>

            </div>
        </form>
    <?php endif; ?>

</section>

<?= view("components/footer") ?>

<script>
const cardNumberInput = document.getElementById('cardNumber');
const cardExpiryInput = document.getElementById('cardExpiry');
const cardCvvInput = document.getElementById('cardCvv');
const placeOrderBtn = document.getElementById('placeOrderBtn');

// --- Luhn Check ---
function luhnCheck(card) {
    let sum = 0, doubleDigit = false;
    for(let i = card.length-1; i>=0; i--){
        let digit = parseInt(card[i],10);
        if(doubleDigit){ digit*=2; if(digit>9) digit-=9; }
        sum+=digit;
        doubleDigit = !doubleDigit;
    }
    return sum%10 === 0;
}

// --- Expiry validation ---
function isValidExpiry(expiry){
    if(!/^\d{2}\/\d{2}$/.test(expiry)) return false;
    const [m, y] = expiry.split('/').map(Number);
    return m >= 1 && m <= 12;
}

// --- Format card number as 1234 5678 9012 3456 ---
cardNumberInput.addEventListener('input', function(e){
    let value = e.target.value.replace(/\D/g,'').slice(0,16);
    e.target.value = value.match(/.{1,4}/g)?.join(' ') || '';
    validateCard();
});

// --- Format expiry MM/YY ---
cardExpiryInput.addEventListener('input', function(e){
    let value = e.target.value.replace(/\D/g,'').slice(0,4);
    if(value.length>=3) value = value.slice(0,2)+'/'+value.slice(2);
    e.target.value = value;
    validateCard();
});

// --- CVV listener ---
cardCvvInput.addEventListener('input', validateCard);

// --- Validate all fields ---
function validateCard(){
    const number = cardNumberInput.value.replace(/\s/g,'');
    const expiry = cardExpiryInput.value.trim();
    const cvv = cardCvvInput.value.trim();

    const validNumber = number.length>=13 && luhnCheck(number);
    const validExpiry = isValidExpiry(expiry);
    const validCvv = /^\d{3,4}$/.test(cvv);

    console.log('Number:', number, 'Valid:', validNumber);
    console.log('Expiry:', expiry, 'Valid:', validExpiry);
    console.log('CVV:', cvv, 'Valid:', validCvv);

    if(validNumber && validExpiry && validCvv){
        placeOrderBtn.disabled = false;
        placeOrderBtn.classList.remove('bg-gray-400','cursor-not-allowed');
        placeOrderBtn.classList.add('bg-[var(--primary-accent)]','hover:bg-[var(--primary-accent)]/80','cursor-pointer');
    } else {
        placeOrderBtn.disabled = true;
        placeOrderBtn.classList.add('bg-gray-400','cursor-not-allowed');
        placeOrderBtn.classList.remove('bg-[var(--primary-accent)]','hover:bg-[var(--primary-accent)]/80','cursor-pointer');
    }
}

// Initial validation (for autofill)
window.addEventListener('DOMContentLoaded', ()=> setTimeout(validateCard, 50));
</script>

</body>