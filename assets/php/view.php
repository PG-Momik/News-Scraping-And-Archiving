<?php

include_once 'partials/configure.php';
include_once 'partials/sessionStart.php';
include_once 'partials/sessionVerification.php';

define("MIN_DATE", "2020/02/20");
define("MAX_DATE", date("Y/m/d"));
$error = null;
$parameter = filter_input(INPUT_GET, "date", FILTER_SANITIZE_STRING);
if ($parameter) {
    if (validateDate($parameter)) {
        $sql = "SELECT * from data where date = '$parameter'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $data[$i] = array(
                    'id' => $row['id'],
                    'time' => $row['time'],
                    'title1' => $row['title1'],
                    'article1' => $row['article1'],
                    'title2' => $row['title2'],
                    'article2' => $row['article2'],
                );
                $i++;
            }
            loadView($data);
        } else {
            echo "Data doesn't exist.";
        }
        mysqli_close($conn);
    } else {
        echo "Invalid date.";
    }
} else {
    echo "Cannot fetch data.";
}

function validateDate($date): bool
{
    if ($date > MIN_DATE && $date < MAX_DATE) {
        $values = explode('/', $date);
        if (count($values) == 3) {
            if (checkdate((int)$values[2], (int)$values[1], (int)$values[0])) {
                return true;
            }
        }
    }
    return false;
}

?>

<?php
function loadView($data)
{ ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Results</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" href="../css/mediaQueries.css">
    </head>
    <body>
    <?php
    require_once 'partials/nav.php' ?>
    <section>

    <?php
    require_once 'partials/smallSearch.php' ?>
    <div class="container-fluid">
        <div id="view-result-container">
            <table class="table ">
                <tr class="table-dark">
                    <th rowspan="2" class="th">S.N.</th>
                    <th rowspan="2" class="th">Time</th>
                    <th colspan='2' class='th'>NepalNews</th>
                    <th colspan='2' class='th'>NepalKhabar</th>
                </tr>
                <tr>
                    <td class="th table-primary">Title</td>
                    <td class="th table-primary">Article</td>
                    <td class="th table-primary">Title</td>
                    <td class="th table-primary">Article</td>
                </tr>
                <?php
                if (!empty($data)) {
                    foreach ($data as $index => $item) {
                        ?>
                        <tr class="table-light">
                            <td><?= $index + 1 ?></td>
                            <td><?= $item['time'] ?></td>
                            <td><?= $item['title1'] ?></td>
                            <td><?= isset($_SESSION['username']) ? "<a href='./article.php?id=$item[id]&en=1'>Read More</a>" : "<a href='./login.php'>Login</a>"; ?></td>
                            <td><?= $item['title2'] ?></td>
                            <td><?= isset($_SESSION['username']) ? "<a href='./article.php?id=$item[id]&en=2'>Read More</a>" : "<a href='./login.php'>Login</a>"; ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
    </section>

    </body>
    <?php
    require_once 'partials/footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
    </html>
    <?php
} ?>





