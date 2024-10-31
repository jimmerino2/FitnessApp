<?php
function dataMapSql($sql, $conn, $params, &$mappedVar)
{
    $stmt_check = mysqli_prepare($conn, $sql);
    $types = str_repeat('s', count($params)); // Assumes all params are strings

    $bind_names = array_merge([$types], $params); // Add types to the beginning of params
    $bind_params = [];

    foreach ($bind_names as $key => $value) {
        $bind_params[$key] = &$bind_names[$key]; // Pass by reference
    }

    call_user_func_array([$stmt_check, 'bind_param'], $bind_params);

    $stmt_check->execute();
    $stmt_check->store_result();
    $stmt_check->bind_result($mappedVar);
    $stmt_check->fetch();
    $stmt_check->close();
}

function dataInsertSql($sql, $conn, $params)
{
    $stmt = mysqli_prepare($conn, $sql);
    $types = str_repeat('s', count($params));

    $bind_names = array_merge([$types], $params); // Add types to the beginning of params
    $bind_params = [];

    foreach ($bind_names as $key => $value) {
        $bind_params[$key] = &$bind_names[$key]; // Pass by reference
    }

    call_user_func_array([$stmt, 'bind_param'], $bind_params);
    $stmt->execute();

    return $stmt;
}

function dataGetResultSql($sql, $pdo, $params, $values)
{
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $mappedArray = [];
    foreach ($results as $row) {
        $mappedRow = [];
        foreach ($values as $value) {
            if (isset($row[$value])) {
                $mappedRow[$value] = $row[$value];
            }
        }
        $mappedArray[] = $mappedRow;
    }

    return $mappedArray;
}

// Checker code
