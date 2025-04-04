<?php
require_once('function.php');
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
                <div class="container-fluid py-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="card my-4">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                                        <h6 class="text-white text-capitalize ps-3">Task table</h6>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-2">
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
                                                $task_tabel = query("SELECT * from tasks");
                                                foreach($task_tabel as $task) : ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm"><?= $no++?></h6>
                                                                <!-- <p class="text-xs text-secondary mb-0"></p> -->
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0"><?= $task['title']?></p>
                                                    </td>

                                                    <td class="align-middle text-center text-sm">
                                                        <span class="badge badge-sm bg-gradient-success"><?= $task['description']?></span>
                                                    </td>

                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs font-weight-bold"><?= $task['assigned_to']?></span>
                                                    </td>

                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs font-weight-bold"><?= $task['status']?></span>
                                                    </td>

                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs font-weight-bold"><?= $task['priority']?></span>
                                                    </td>
                                                    
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs font-weight-bold"><?= $task['deadline']?></span>
                                                    </td>

                                                    <td class="align-middle">
                                                    <button type="button" class="btn btn-primary">Edit</button>
                                                    <button type="button" class="btn btn-danger">Hapus</button>
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

<?php
include_once('template/footer.php')
?>