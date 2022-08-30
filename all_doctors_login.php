<style>
body {
    background: url('./assets/img/bg.png') !important;
}

.main-section {
    width: 50%;
    margin: 0 auto;
    margin-top: 13%;
    background: #d5d5d5;
    padding: 20px;
}

.logo_section {
    text-align: center;
    width: 100%;
}


@media(max-width:576px) {
    .main-section {
        width: 100%;
        margin-top: 0px;
        height: 100vh;
    }
}
</style>

<body>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Healthsamadhan Login Page</title>
        <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>

        <section class="main-section">
            <div class="container">

                <div class="row">
                    <div class="logo_section">
                        <img src="./assets/img/logo.png" alt="">
                    </div>
                    <hr style="border: 2px solid #e1e1e1;width: 100%;">
                    <div class="col-md-4">
                        <a href="doctor_chat_login/login.php" class="btn btn-danger">Doctor Login</a>
                    </div>

                    <div class="col-md-4">
                        <a href="healthexpert_chat_login/login.php" class="btn btn-primary ">Health Expert Login</a>
                    </div>

                    <div class="col-md-4">
                        <a href="dietition_chat_login/login.php" class="btn btn-success ">Dietition Login</a>
                    </div>
                    <hr style="border: 2px solid #e1e1e1;width: 100%;">
                </div>

            </div>
        </section>
    </body>

    </html>