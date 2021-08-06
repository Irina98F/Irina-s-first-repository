<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Simple Database App</title>

    <link rel="stylesheet" href="CSS/style.css"/>
</head>

<body>
<table class="container">
    <thead>
    <tr>
        <th COLSPAN="5">
            <h3><BR>TABLE OF MOVIES</h3>
        </th>
    </tr>
    <tr>
        <th>ID</th>
        <th>Movie Name</th>
        <th>Last Seen</th>
        <th>Notes</th>
        <th>Watched Count</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include "./AutoLoader.php";
    $autoloader = new AutoLoader();
    $autoloader->load();

    $loadTable = new LoadTable();
    $loadTable->populateTable();
    ?>
    </tbody>
    <tr>
        <th COLSPAN="5">
            <a href="AddMovie.php" style="position: center"><button class="bn29">Add Movie</button></a>
        </th>
    </tr>
</table>

</body>

</html>



