<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- JS -->
    <script src="js/jquery.js"></script>
    <script src="js/ajax.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="container mt-0">
        <div class="heading">
            <h1 class="text-success text-center">AJAX CRUD</h1>
        </div>
        <table class="table" border="1">
            <thead>
                <tr calspan="2">
                    <td colspan="2">Name <input id="fname" class="mr-2" type="text">
                        Cite <input id="city" class="mr-2" type="text">
                        Age <input id="age" type="text">
                        <input class="ml-3 btn btn-primary mr-3" id="btn-save" type="button" value="Save">

                        <input placeholder="Search" type="search" id="search">
                    </td>
                </tr>

            </thead>
        </table>

        <!-- Messages -->
        <div class="error-msg bg-dark text-danger text-center">
        </div>
        <div class="success-msg bg-dark text-success text-center"></div>

            <!-- Table -->
        <div id="table-data" class="mt-0">
            <!-- Load Table form php file by Ajax -->

        </div>

        <!-- Edit modal -->
        <div id="modal">
            <div class="modal-form">
                <h2>Edit Form</h2>
                <table cellpadding="10px" width="100%">

                </table>
                <div class="close-btn">X</div>
            </div>
        </div>
        <!-- Pagination -->
    </div>
</body>

</html>