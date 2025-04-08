<?php
include_once('template/header.php');
?>

<div class="container-fluid py-4">
    <div class="row min-vh-80 h-100">
        <div class="col-12">
            <div class="ms-3">
                <h3 class="mb-0 h4 font-weight-bolder">Dashboard</h3>
                <!-- <p class="mb-4">
                    Check the sales, value and bounce rate by country.
                </p> -->

                <button class="btn bg-gradient-dark ms-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
                    <i class="material-symbols-rounded">add</i>
                    <span class="text-white">Tasks</span>
                </button>

                <div class="modal" id="tambahModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Modal body text goes here.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include_once('template/footer.php');
?>