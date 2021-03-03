<?php

include_once './common.php';

//  _GET
function getOptions() {
    $categoryId = (isset($_GET['category'])) ? (int)$_GET['category'] : 0;
    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    $limit = (isset($_GET['limit'])) ? (int)$_GET['limit'] : 5;

    return array(
        'category_id' => $categoryId,
        'page' => $page,
        'limit' => $limit
    );
}

// getting items
function getGoods($options, $conn) {
    // sql limit
    $page = $options['page'];
    $limit = (int)$options['limit'];
    $start = ($page - 1) * $limit;

    //category
    $categoryId = $options['category_id'];
    $categoryWhere =
        ($categoryId !== 0)
            ? " g.category_id = $categoryId and "
            : '';

    
    $queryBase = "
        select
            g.id as good_id,
            g.good as good,
            g.category_id as category_id,
            b.brand as brand,
            g.price as price,
            g.rating as rating,
            g.photo as photo,
            g.feature as feature
        from
            goods as g,
            brands as b
        where
            $categoryWhere
            g.brand_id = b.id
    ";

    // overall about based on
    $queryCountAll = 'select count(*) count_all from (' . $queryBase . ') as tmp';
    $data = $conn->query($queryCountAll);
    $row = $data->fetch_assoc();
    $countAll = (int)$row['count_all'];

    // final vers
    $queryTotal = $queryBase . "
            order by price asc
            limit $start, $limit
        ";
    $data = $conn->query($queryTotal);
    $goods = $data->fetch_all(MYSQLI_ASSOC);

    // return the result
    return array(
        'countAll' => $countAll,
        'goods' => $goods
    );
}


try {
    $conn = connectDB();

    $options = getOptions();

    $data = getGoods($options, $conn);

    echo json_encode(array(
        'code' => 'success',
        'data' => $data
    ));
}
catch (Exception $e) {
    // error
    echo json_encode(array(
        'code' => 'error',
        'message' => $e->getMessage()
    ));
}
