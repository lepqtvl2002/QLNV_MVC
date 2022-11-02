<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
</head>
<body>
    <div class="container">
        <!-- Header -->
        <?php include 'layouts/components/header.php'; ?>
        <hr/>

        <div class="body row">
            <!-- Sidebar -->
            <div class="sidebar col-3">
                <?php include 'layouts/components/sidebar.php' ?>
            </div>
            <!-- Content -->
            <div class="content col-9">
                <?php if ($child) echo $child; ?>
                <?php if ($view) require_once $view; ?>
            </div>        
        </div>
    </div>
</body>
</html>