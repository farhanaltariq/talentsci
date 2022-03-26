<?php include_once('bootstrap.php'); ?>
<body>
    <div class="container mt-5">
        <div class="row text-end mb-3 ms-auto" style="float: left">
            <div class="container">
                <a href="<?= base_url('talents/create\/'); ?>" class="btn btn-primary">Add Data +</a>
                <a href="<?= base_url('talents/faker/dataFaker\/'); ?>" class="btn btn-warning">Use Faker</a>
                <?php 
                    $path = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    $check = $path == base_url('talents/') || $path == base_url();
                    if(!$check)
                        echo '<a href="' . base_url() . '" class="btn btn-success">Home</a>';
                ?>
            </div>
        </div>
        
        <div class="row text-end me-auto mb-3" style="float: right">
            <form action="<?= base_url('talents/search'); ?>" method="POST">
            <div class="input-group col-auto">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input name="search" type="text" class="form-control" placeholder="Insert name or categories">
                <button type="submit" class="btn btn-secondary  col-form-label input-group-append">Search</button>
            </div>
            </form>
        </div>
		
        <?php if(isset($message)): ?>
            <br><br>
            <div class="container">
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            </div>
        <?php 
            session_destroy();
            endif; 
        ?>

        <div class="container">
        <table class="table table-striped">
            <tr>
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Photo Talent</th>
                    <th>Category</th>
                    <th>Skills</th>
                    <th class="text-center">Action</th>
                </thead>
            </tr>
            <?php (!isset($start)) ? $start = 0 : $start; foreach($talents as $talent) : ?>
            <tr>
                <td><?= ++$start ?></td>
                <td><?= $talent->name ?></td>
                <td><img src="<?= base_url('assets/talent_img/'. $talent->photo_profile) ?>" alt="" width="50px" height="50px"></td>
                <td><?= $talent->category ?></td>
                <td><?= $talent->skills ?></td>
                <td class="text-center">
                    <a href="<?= base_url('talents/details\/') . $talent->id?>" class="ms-3 btn btn-primary">Details</a>
                    <a href="<?= base_url('talents/edit\/') . $talent->id?>" class="ms-3 btn btn-secondary">Edit</a>
                    <a href="<?= base_url('talents/delete\/') . $talent->id?>" class="ms-3 btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?= ($this->uri->segment(2) == 'index' || $this->uri->segment(2) == '') ? $this->pagination->create_links() : ""; ?>
        </div>
    </div>
</body>
</html>