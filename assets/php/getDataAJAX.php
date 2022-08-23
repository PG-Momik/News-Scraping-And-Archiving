<?php

require_once 'partials/configure.php';

$sql = "SELECT id, date, time, title1, title2 FROM data ORDER BY date DESC, time LIMIT 15";
$result = mysqli_query($conn, $sql);
createPagination(0);
echo <<<EOF
    <table class='table text-center px-1'>
        <thead class='table-dark p-2' >
        <tr>
         <th>ID</th>
         <th>Date</th>
         <th>Time</th>
         <th>Title 1</th>
         <th>Title 2</th>
         <th>Action</th>
        </tr>
       </thead>
EOF;

if (!$result) {
    echo <<<EOF
        <tr><td colspan="6">Something went wrong.</td></tr>
    EOF;
    return;
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        extract($row);
        createRow($id, $date, $time, $title1, $title2);
    }
}

function createRow($id, $date, $time, $title1, $title2)
{
echo <<<EOF
<tr>
<td>$id</td>
<td>$date</td>
<td>$time</td>
<td>$title1</td>
<td>$title2</td>
<td>
<a href="singleData.php?q=$id" class="btn btn-primary mx-1">View</a>
<a href="deleteData.php?q=$id" class="btn btn-danger mx-1">Delete</a>
</td>
</tr>
EOF;
}

function createPagination($active)
{
    $next = $active + 1;
    $prev = $active - 1;
    echo "<nav>";
    echo "<ul class='pagination justify-content-center'>";
    echo "<li class='page-item'><a class='page-link' href='#' onclick='fetchUser($prev, $active)' tabindex='-1'>Previous</a></li>";
    echo "<li class='page-item'>";
    echo "<a class='page-link pr-2 pl-2' href ='#' onclick='fetchUser($next, $active)'>Next</a >";
    echo "</li>";
    echo "</ul>";
    echo "</nav>";
}