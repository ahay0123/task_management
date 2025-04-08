<?php
require_once('function.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['simpan'])) {
    if (tambah_task($_POST) > 0) {
        header("Location: task.php?status=success");
        exit;
    } else {
        header("Location: task.php?status=error");
        exit;
    }
}
?>

<?php
include_once('template/header.php');
?>

<div class="container-fluid py-4">
    <div class="row min-vh-80 h-100">
        <div class="col-12">
            <div class="ms-3">
                <!-- <h3 class="mb-0 h4 font-weight-bolder">Task</h3> -->
                <!-- <p class="mb-4">
                    Check the sales, value and bounce rate by country.
                </p> -->

                <?php

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['simpan'])) {
                    if (tambah_task($_POST) > 0) {
                        header("Location: task.php?status=success");
                        exit;
                    } else {
                        header("Location: task.php?status=error");
                        exit;
                    }
                }
                ?>

                <?php include_once('alert.php') ?>

                <div class="container-fluid py-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="card my-4">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                                        <h6 class="text-white text-capitalize  ps-3">Task table</h6>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-2">
                                    <button type="button" class="btn bg-gradient-dark ms-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
                                        <i class="material-symbols-rounded">add</i>
                                        <span class="text-white">Tasks</span>
                                    </button>

                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Title</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Assigned to</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Priority</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">deadline</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>

                                                    <!-- <th class="text-secondary opacity-7">Sat</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // penomoran
                                                $no = 1;
                                                // query untuk memanggil semua data dari tabel task
                                                $task_tabel = query("SELECT tasks.*, users.username as employee_name FROM tasks JOIN users ON tasks.assigned_to = users.id");
                                                foreach ($task_tabel as $task) : ?>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm"><?= $no++ ?></h6>
                                                                    <!-- <p class="text-xs text-secondary mb-0"></p> -->
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <p class="text-xs font-weight-bold mb-0"><?= $task['title'] ?></p>
                                                        </td>

                                                        <td class="align-middle text-center text-sm">
                                                            <span class="badge badge-sm bg-gradient-success"><?= $task['description'] ?></span>
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold"><?= $task['employee_name'] ?></span>
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            <span class="badge badge-sm bg-gradient-success "><?= $task['status'] ?></span>
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold"><?= $task['priority'] ?></span>
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold"><?= $task['deadline'] ?></span>
                                                        </td>

                                                        <td class="align-middle">
                                                            <a href="edit-task.php?id=<?= $task['id'] ?>" class="btn btn-primary">Edit</a>
                                                            <a href="hapus-task.php?id=<?= $task['id']?>" onclick="confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal" id="tambahModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Task</label>
                        <input type="text" class="form-control border border-dark" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control border border-dark" name="description" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="assigned_to" class="form-label">Pilih Pegawai</label>
                        <select class="form-select border border-dark" name="assigned_to" required>
                            <option value="">-- Pilih Pegawai --</option>
                            <?php
                            $users = query("SELECT * FROM users WHERE role = 'employee'");
                            foreach ($users as $user) {
                                echo "<option value='{$user['id']}'>{$user['username']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select border border-dark" name="status" required>
                            <option value="Incomplete">Incomplete</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Selesai</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="priority" class="form-label">Prioritas</label>
                        <select class="form-select border border-dark" name="priority" required>
                            <option value="Rendah">Rendah</option>
                            <option value="Sedang">Sedang</option>
                            <option value="Tinggi">Tinggi</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="deadline" class="form-label">Deadline</label>
                        <input type="date" class="form-control border border-dark" name="deadline" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->


<?php
include_once('template/footer.php')
?>