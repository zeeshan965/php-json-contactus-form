<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?? "Contact Us Form"; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <style>
        label.error, .text-danger {
            color: #a94442 !important;
            display: block;
            border-color: #ebccd1;
            padding: 5px 0 0 0;
            max-width: 100%;
            margin-bottom: 5px;
            font-weight: 700;
        }
    </style>
</head>
<body>
<div class="container">
    <?php include(__DIR__ . '/form.php'); ?>
    <?php include(__DIR__ . '/script.php'); ?>
</div>

</body>
</html>