<?php include_once('bootstrap.php'); ?>
<body>
    <!-- Details Form -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mt-1">
                <div class="card pb-2">
                    <div class="card-header">
                        <h3 class="card-title">Create Data</h3>
                    </div>
                    <form action="<?= base_url('talents/store');?>" method="post" enctype="multipart/form-data" >
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mt-1">
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label >Name</label>
                                            <input name="name" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label >Email</label>
                                            <input name="email" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label >Phone Number</label>
                                            <input name="phone_number" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label >Age</label>
                                            <input name="age" type="number" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select name="category" type="text" class="form-select" id="category">
                                                <?php foreach ($categories as $category) : ?>
                                                    <option value="<?php echo $category->id; ?>"><?php echo $category->name_category; ?></option>
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
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="skills">Skills</label>
                                            <input name="skills" type="text" class="form-control" id="skills">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input name="location" type="text" class="form-control" id="location">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label for="description">About</label>
                                            <textarea name="aboutme" class="form-control" id="description" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- Upload picture -->
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <div class="form-group">
                                            <label >Upload Picture</label>
                                            <input type="file" name="photo_profile" class="form-control" size="20">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="container text-end mt-3">
                            <button type="submit" class="btn btn-primary ms-3">Save</button>
                            <a class="btn btn-dark ms-3" href="<?= $_SERVER['HTTP_REFERER'];?>">Return</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>