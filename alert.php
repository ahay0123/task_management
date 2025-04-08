<?php if (isset($_GET['status']) && isset($_GET['message'])): ?>
    <?php if ($_GET['status'] === 'success'): ?>
        <div class="alert alert-success" role="alert">
            <?= htmlspecialchars($_GET['message']) ?>
        </div>
    <?php elseif ($_GET['status'] === 'error'): ?>
        <div class="alert alert-danger" role="alert">
            <?= htmlspecialchars($_GET['message']) ?>
        </div>
    <?php endif; ?>

    <script>
        // Hapus parameter 'status' dan 'message' dari URL setelah 2 detik
        setTimeout(function() {
            if (window.history.replaceState) {
                const url = new URL(window.location);
                url.searchParams.delete('status');
                url.searchParams.delete('message');
                window.history.replaceState({}, document.title, url.pathname + url.search);
            }
        }, 2000); // Bisa diganti waktunya sesuai kebutuhan
    </script>
<?php endif; ?>