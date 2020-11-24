<?php
session_start();
$msg = "";
//check if have product before go to checkout
if (isset($_GET['content']) and $_GET['content'] == 'checkout') {
    if ($_SESSION['cartcount'] == 0) {
        header("location:index.php?content=cart&nocart=1");
    }
}

if (isset($_GET["cartaction"])) {
    if ($_GET["cartaction"] == "clearcheckout") {
        echo 'suc2';
        setcookie("cart_shopping", "", time() - 3600);
        header("location:index.php?");
    }
}

//cart function
if (isset($_POST["add_to_cart"])) {
    if (isset($_COOKIE["cart_shopping"])) {
        $cookie_data = stripslashes($_COOKIE['cart_shopping']);

        $cart_data = json_decode($cookie_data, true);
    } else {
        $cart_data = array();
    }

    $item_id_list = array_column($cart_data, 'item_id');

    if (in_array($_POST["prod_id"], $item_id_list)) {
        foreach ($cart_data as $keys => $values) {
            if ($cart_data[$keys]["item_id"] == $_POST["prod_id"]) {
                $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
            }
        }
    } else {
        $item_array = array(
            'item_id' => $_POST["prod_id"],
            'item_name' => $_POST["prod_title"],
            'item_img' => $_POST["cartimg"],
            'item_price' => $_POST["prod_price"],
            'item_quantity' => $_POST["quantity"],
            'item_qtyInStock' => $_POST["qty_instock"],
        );
        $cart_data[] = $item_array;
    }

    $item_data = json_encode($cart_data);
    setcookie('cart_shopping', $item_data, time() + (86400 * 30));
    header("location:index.php?content=cart&success=1");
}

if (isset($_GET["cartaction"])) {
    if ($_GET["cartaction"] == "delete") {
        $cookie_data = stripslashes($_COOKIE['cart_shopping']);
        $cart_data = json_decode($cookie_data, true);
        foreach ($cart_data as $keys => $values) {
            if ($cart_data[$keys]['item_id'] == $_GET["id"]) {
                unset($cart_data[$keys]);
                $item_data = json_encode($cart_data);
                setcookie("cart_shopping", $item_data, time() + (86400 * 30));
                header("location:?content=cart&remove=1");
            }
        }
    }
    if ($_GET["cartaction"] == "clear") {
        setcookie("cart_shopping", "", time() - 3600);
        header("location:?content=cart&clearall=1");
    }
}

if (isset($_GET["success"])) {
    $msg = '
	<div class="alert alert-success alert-dismissible">
	  	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  	Item Added into Cart
	</div>
	';
}

if (isset($_GET["remove"])) {
    $msg = '
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Item removed from Cart
	</div>
	';
}
if (isset($_GET["clearall"])) {
    $msg = '
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Your Shopping Cart has been clear...
	</div>
    ';
}

if (isset($_GET["nocart"])) {
    $msg = '
	<div class="alert alert-warning alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Please add some product from the product page..
	</div>
	';
}
