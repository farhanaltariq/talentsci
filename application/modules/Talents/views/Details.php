<?php include_once('bootstrap.php'); ?>
<body>
    <!-- Details Form -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mt-1">
                <div class="card pb-2">
                    <div class="card-header">
                        <h3 class="card-title">Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mt-1">
                                <img src="<?= base_url('assets/talent_img/'. $talent->photo_profile) ?? null ?>" alt="" width="100px" style="float: right">
                            </div>
                            <div class="col-md-12 mt-1">
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" value="<?= $talent->name ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="name">Email</label>
                                            <input type="text" class="form-control" id="name" value="<?= $talent->email ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="name">Phone Number</label>
                                            <input type="text" class="form-control" id="name" value="<?= $talent->phone_number ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="name">Age</label>
                                            <input type="number" class="form-control" id="name" value="<?= $talent->age ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <input type="text" class="form-control" id="category" value="<?= $talent->category ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="description">Gender</label>
                                            <select class="form-control" id="description" rows="3" disabled>
                                                <option disabled selected value="<?= $talent->gender ?>"><?= $talent->gender ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="skills">Skills</label>
                                            <input type="text" class="form-control" id="skills" value="<?= $talent->skills ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input type="text" class="form-control" id="location" value="<?= $talent->location ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="description">About</label>
                                            <textarea class="form-control" id="description" rows="3" disabled><?= $talent->aboutme ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="container text-end">
                            <a class="btn btn-dark ms-3" href="<?= $_SERVER['HTTP_REFERER']; ?>">Return</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>