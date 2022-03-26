<?php include_once('bootstrap.php'); ?>
<body>
    <!-- Details Form -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mt-1">
                <div class="card pb-2">
                    <div class="card-header">
                        <h3 class="card-title">Edit</h3>
                    </div>
                    <div class="card-body">
                        <?php echo form_open_multipart('talents/update/' . $talent->id); ?>

                        <div class="row">
                            <div class="col-md-12 mt-1">
                                <img src="<?= base_url('assets/talent_img/'. $talent->photo_profile) ?? null ?>" alt="" width="100px" style="float: right">
                            </div>
                            <div class="col-md-12 mt-1">
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input required name="name" type="text" class="form-control" id="name" value="<?= $talent->name ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="name">Email</label>
                                            <input required name="email" type="text" class="form-control" id="name" value="<?= $talent->email ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="name">Phone Number</label>
                                            <input required name="phone_number" type="text" class="form-control" id="name" value="<?= $talent->phone_number ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="name">Age</label>
                                            <input required name="age" type="number" class="form-control" id="name" value="<?= $talent->age ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select name="category" type="text" class="form-select" id="category" value="<?= $talent->id_category ?>">
                                                <?php foreach ($categories as $category) : ?>
                                                    <option value="<?= $category->id ?>" 
                                                        <?= (isset($selected_category)) ? ($selected_category == $category->name_category) ? 'selected' : '' : '';?> >
                                                        <?= $category->name_category ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="description">Gender</label>
                                            <select name="gender" class="form-control" id="description" rows="3">
                                                <option selected value="<?= $talent->gender ?>"><?= $talent->gender ?></option>
                                                <option value="<?= ($talent->gender == "Male") ? "Female" : "Male" ?>"><?= ($talent->gender == "Male") ? "Female" : "Male" ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="skills">Skills</label>
                                            <input required name="skills" type="text" class="form-control" id="skills" value="<?= $talent->skills ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input required name="location" type="text" class="form-control" id="location" value="<?= $talent->location ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="description">About</label>
                                            <textarea name="aboutme" class="form-control" id="description" rows="3"><?= $talent->aboutme ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- Upload picture -->
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label >Upload Picture</label>
                                            <input name="photo_profile" name="photo_profile" type="file" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="container text-end">
                            <button type="submit" class="btn btn-primary ms-3">Save</button>
                            <a class="btn btn-dark ms-3" href="<?=$_SERVER['HTTP_REFERER']; ?>">Return</a>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>