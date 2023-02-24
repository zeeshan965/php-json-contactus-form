<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title ?? "Contact Us Form"; ?></title>

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../public/assets/css/style.css">
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
<div class='loader-wrapper'>
    <div class='loader'>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--text'></div>
    </div>
</div>

<section class="ftco-section img bg-hero" style="background-image: url('../../public/assets/images/bg_1.jpg');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Contact Form</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="wrapper">
                    <div class="row no-gutters justify-content-between">
                        <div class="col-lg-6 d-flex align-items-stretch">
                            <div class="info-wrap w-100 p-5">
                                <h3 class="mb-4">Contact us</h3>
                                <?php include(__DIR__ . '/form_data.php'); ?>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Get in touch</h3>
                                <?php include(__DIR__ . '/form.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include(__DIR__ . '/script.php'); ?>
</body>
</html>