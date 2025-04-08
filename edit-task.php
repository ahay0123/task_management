<?php
include_once('function.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = query("SELECT * FROM tasks WHERE id = '$id'")[0];
}

if (isset($_POST['simpan'])) {
    if (edit_task($_POST) > 0) {
        header("Location: task.php?status=success&message=Data berhasil diubah!");
        exit;
    } else {
        header("Location: task.php?status=error&message=Data gagal disimpan!");
        exit;
    }
}


include_once('template/header.php');
?>


<div class="container-fluid py-4">
    <div class="row min-vh-80 h-100">
        <div class="col-12">
            <div class="ms-3">
                <h3 class="mb-0 h4 font-weight-bolder">Data Tamu</h3>
                <!-- <p class="mb-4">
                    Check the sales, value and bounce rate by country.
                </p> -->
                <form method="post" action="">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Task</label>
                        <input type="text" class="form-control border border-dark" name="title" value="<?= $data['title'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control border border-dark" name="description" rows="3" required><?= $data['description'] ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="assigned_to" class="form-label">Pilih Pegawai</label>
                        <select class="form-select border border-dark" name="assigned_to" required>
                            <option value="">-- Pilih Pegawai --</option>
                            <?php
                            $users = query("SELECT * FROM users WHERE role = 'employee'");
                            foreach ($users as $user) {
                                $selected = $user['id'] == $data['assigned_to'] ? 'selected' : '';
                                echo "<option value='{$user['id']}' $selected>{$user['username']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select border border-dark" name="status" required>
                            <option value="Incomplete" <?= $data['status'] == 'Incomplete' ? 'selected' : '' ?>>Incomplete</option>
                            <option value="In Progress" <?= $data['status'] == 'In Progress' ? 'selected' : '' ?>>In Progress</option>
                            <option value="Completed" <?= $data['status'] == 'Completed' ? 'selected' : '' ?>>Selesai</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="priority" class="form-label">Prioritas</label>
                        <select class="form-select border border-dark" name="priority" required>
                            <option value="Rendah" <?= $data['priority'] == 'Rendah' ? 'selected' : '' ?>>Rendah</option>
                            <option value="Sedang" <?= $data['priority'] == 'Sedang' ? 'selected' : '' ?>>Sedang</option>
                            <option value="Tinggi" <?= $data['priority'] == 'Tinggi' ? 'selected' : '' ?>>Tinggi</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="deadline" class="form-label">Deadline</label>
                        <input type="date" class="form-control border border-dark" name="deadline" value="<?= $data['deadline'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-danger" href="task.php">
                                <i class="material-symbols-rounded opacity-5">arrow_back</i> Kembali
                            </a>
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>



<?php
include_once('template/footer.php');
?>