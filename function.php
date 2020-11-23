<?php
function selectTable($column, $table)
{
    return "select $column from $table";
}

function searchQuery($column, $table, $query)
{
    return "select $column from $table where book_title like '%$query%' or book_author like '%$query%'";
}

function insertData($column, $table, $values)
{
    return "insert into $table($column) values($values)";
}

function deleteData($table, $pk)
{
    return "delete from $table where $pk ";
}

?>
