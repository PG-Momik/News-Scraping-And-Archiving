<?php

require_once 'partials/configure.php';

$sql = null;
$response = array();
$current = 1;
$i = 0;
if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
    $current = intval($_GET['current']);
    $limit = $page * 10;
    $offset = $limit - 10;
    $sql = "SELECT * FROM users ORDER BY  id LIMIT $offset, 10 ";
} else {
    $sql = "SELECT * FROM users ORDER BY id LIMIT 10";
}
createPagination($current);
echo <<<EOF

    <table class='table text-center px-1'>
        <thead class='table-dark' >
        <tr>
         <th>ID</th>
         <th>Username</th>
         <th>Email</th>
         <th>Phone</th>
         <th>Action</th>
        </tr>
       </thead>
EOF;
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        extract($row);
        $i++;
        createRow($id, $username, $email, $phone, $priority);
    }
    echo "</table>";
} else {
    $response[] = "Something went wrong.</table>";
}
function createRow($id, $username, $email, $phone, $priority)
{
    echo $priority > 1 ? "<tr class='ali-grey'>" : "<tr>" ;
    echo <<<EOF
     <td>$id</td>
     <td>$username</td>
     <td>$email</td>
     <td>$phone</td>
     <td>
        <a href='singleUser.php?q=$id' class='btn btn-md btn-primary mx-1'>Edit</a>
        <a href='deleteUser.php?q=$id' class='btn btn-danger mx-1'>Delete</a></td>
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