<?php

require_once 'partials/configure.php';

$sql = "SELECT * FROM metadata";
$result = mysqli_query($conn, $sql);

echo <<<EOF
    <table class='table text-center px-1'>
        <thead class='table-dark p-2' >
        <tr>
         <th>ID</th>
         <th>Site</th>
         <th>Title Class</th>
         <th>Article Class</th>
         <th>Link Class</th>
         <th>Action</th>
        </tr>
       </thead>
EOF;

if (!$result) {
    echo <<<EOF
        <tr> <td colspan="6">Something went wrong. Try again</td> <tr>;
EOF;
    return;
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        extract($row);
        createRow($id, $name . ".com", $title_class, $article_class, $article_link_class);
    }
}

function createRow($id, $site, $title, $article, $link)
{
    echo <<<EOF
    <tr>
        <td>$id</td>
        <td>$site</td>
        <td>$title</td>
        <td>$article</td>
        <td>$link</td>
        <td>
        <a href="singleMeta.php?q=$id" class="btn btn-primary mx-1">Edit</a>
        <a href="deleteMeta.php?q=$id" class="btn btn-danger mx-1">Delete</a>
        </td>
    </tr>
EOF;
}