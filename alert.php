<?php if (isset($_GET['status'])): ?>
    <?php if ($_GET['status'] === 'success'): ?>
        <div class="alert alert-success" role="alert">
            Data berhasil disimpan!
        </div>
    <?php elseif ($_GET['status'] === 'error'): ?>
        <div class="alert alert-danger" role="alert">
            Data gagal disimpan!
        </div>
    <?php endif; ?>

    <script>
        // Hapus parameter 'status' dari URL setelah 2 detik
        setTimeout(function() {
            if (window.history.replaceState) {
                const url = new URL(window.location);
                url.searchParams.delete('status');
                window.history.replaceState({}, document.title, url.pathname + url.search);
            }
        }, 2000); // Bisa diganti waktunya sesuai kebutuhan
    </script>
<?php endif; ?>