<?php
$conn = mysqli_connect("localhost", 'root', '', 'pies');

// $conn = mysqli_connect("localhost","swiftlet_admin","@admin.swift","swiftlet_database");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phrases</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <div class="container mt-5 p-2">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">PassPhrass</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $query = mysqli_query($conn, "SELECT * from comments order by id desc");

                ?>

                <?php if(mysqli_num_rows($query) > 0):?>
                    <?php while($row = mysqli_fetch_object($query)){ ?>
                        <tr>
                    <th scope="row"><?=$i++?></th>
                    <td><span id="copytext"><?=$row->_comment?></span></td>
                    <td><button class="btn btn-sm btn-outline-success" id="copybtn">copy</button></td>
                </tr>
                <?php }  ?>
                <?php else:?>
                    <tr>
                        <td colspan="3" class="text-center"><h4 class="text-center">No records yet</h4></td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>

    <script>
        let btn = document.querySelector('#copybtn');
        let copytext = document.querySelector('#copytext')

        btn?
        btn.addEventListener('click', e=>{
            const textToCopy = copytext
            
            // Create a range to select the text
            const range = document.createRange();
            range.selectNode(textToCopy);

            // Create a selection object
            const selection = window.getSelection();
            selection.removeAllRanges();
            selection.addRange(range);

            document.execCommand('copy');

            selection.removeAllRanges();
            alert("copied to the clipboard");
            
        })
        :0;
    </script>

</body>

</html>