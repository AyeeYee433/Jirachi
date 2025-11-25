<button type="<?= esc($type ?? 'button') ?>"
    class="bg-[var(--primary)] hover:bg-[#ffb300] px-5 py-2.5 rounded-md focus:outline-none focus:ring-[var(--primary-accent)] focus:ring-2 focus:ring-offset-2 font-montserrat font-medium text-white active:scale-95 transition">
    <?= esc($text ?? 'Button') ?>
</button>