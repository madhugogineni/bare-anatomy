<?php

require('connection.php');

function executeSqlQuery($con,$sql)
{
    $response = [];
    $result = mysqli_query($con, $sql);
    if (!empty($result)) {
        if (mysqli_num_rows($result) == 1) {
            return mysqli_fetch_assoc($result);
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $response[] = $row;
            }
            return $response;
        }
    }
}

function insertSqlQuery($con,$sql)
{
    $response = [];
    mysqli_query($con, $sql);
    $result = mysqli_affected_rows($con);
    return $result;
}

