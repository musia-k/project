<?php

include_once './common.php';

function getGoods($goods, $conn) {
    $query = "
        select
            g.id as good_id,
            g.good as good,
            b.brand as brand,
            g.price as price,
            g.rating as rating,
            g.photo as photo,
            g.feature as feature
        from
            goods as g,
            brands as b
        where
            g.id in ($goods) and
            g.brand_id = b.id
    ";

    $data = $conn->query($query);
    return $data->fetch_all(MYSQLI_ASSOC);
}

function getProps($goods, $conn) {
    $query = "
        select
            gp.good_id as good_id,
            gp.prop as prop,
            gp.value as value
        from
            goods_props as gp
        where
            gp.good_id in ($goods)
    ";

    $data = $conn->query($query);
    return $data->fetch_all(MYSQLI_ASSOC);
}

function getData($goods, $conn) {
    $result = array(
        'goods' => getGoods($goods, $conn),
        'props' => getProps($goods, $conn)
    );

    return $result;
}


try {
 
    $conn = connectDB();

    $data = getData(urldecode($_GET['goods']), $conn);

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
