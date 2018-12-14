<?php

// This function calculates a shipping charge of $5 per item
// but it only charges shipping for the first 5 items
function shipping_cost() {
    $item_count = cart_item_count();
    $item_shipping = 5;   // $5 per item
    if ($item_count > 5) {
        $shipping_cost = $item_shipping * 5;
    } else {
        $shipping_cost = $item_shipping * $item_count;
    }
    return $shipping_cost;
}

function tax_amount($subtotal) {
    $shipping_address = get_address($_SESSION['user']['shipAddressID']);
    $state = $shipping_address['state'];
    $state = strtoupper($state);
    switch ($state) {

        case 'AL': $tax_rate = 0.091;
            break;
        case 'AK': $tax_rate = 0.0176;
            break;
        case 'AZ': $tax_rate = 0.0833;
            break;
        case 'AR': $tax_rate = 0.0941;
            break;
        case 'CA': $tax_rate = 0.0854;
            break;
        case 'CO': $tax_rate = 0.0752;
            break;
        case 'CT': $tax_rate = 0.0635;
            break;
        case 'DE': $tax_rate = 0;
            break;
        case 'FL': $tax_rate = 0.068;
            break;
        case 'GA': $tax_rate = 0.0715;
            break;
        case 'HI': $tax_rate = 0.0435;
            break;
        case 'ID': $tax_rate = 0.0603;
            break;
        case 'IL': $tax_rate = 0.087;
            break;
        case 'IN': $tax_rate = 0.07;
            break;
        case 'IA': $tax_rate = 0.068;
            break;
        case 'KS': $tax_rate = 0.0868;
            break;
        case 'KY': $tax_rate = 0.06;
            break;
        case 'LA': $tax_rate = 0.1002;
            break;
        case 'ME': $tax_rate = 0.055;
            break;
        case 'MD': $tax_rate = 0.06;
            break;
        case 'MA': $tax_rate = 0.0625;
            break;
        case 'MI': $tax_rate = 0.06;
            break;
        case 'MN': $tax_rate = 0.0742;
            break;
        case 'MS': $tax_rate = 0.0707;
            break;
        case 'MO': $tax_rate = 0.0803;
            break;
        case 'MT': $tax_rate = 0;
            break;
        case 'NE': $tax_rate = 0.0689;
            break;
        case 'NV': $tax_rate = 0.0814;
            break;
        case 'NH': $tax_rate = 0;
            break;
        case 'NJ': $tax_rate = 0.066;
            break;
        case 'NM': $tax_rate = 0.0766;
            break;
        case 'NY': $tax_rate = 0.0849;
            break;
        case 'NC': $tax_rate = 0.0695;
            break;
        case 'ND': $tax_rate = 0.068;
            break;
        case 'OH': $tax_rate = 0.0715;
            break;
        case 'OK': $tax_rate = 0.0891;
            break;
        case 'OR': $tax_rate = 0;
            break;
        case 'PA': $tax_rate = 0.0634;
            break;
        case 'RI': $tax_rate = 0.07;
            break;
        case 'SC': $tax_rate = 0.0737;
            break;
        case 'SD': $tax_rate = 0.064;
            break;
        case 'TN': $tax_rate = 0.0946;
            break;
        case 'TX': $tax_rate = 0.0817;
            break;
        case 'UT': $tax_rate = 0.0677;
            break;
        case 'VT': $tax_rate = 0.0618;
            break;
        case 'VA': $tax_rate = 0.0563;
            break;
        case 'WA': $tax_rate = 0.0918;
            break;
        case 'WV': $tax_rate = 0.0637;
            break;
        case 'WI': $tax_rate = 0.0542;
            break;
        case 'WY': $tax_rate = 0.0546;
            break;
        case 'DC': $tax_rate = 0.0575;
            break;


        default: $tax_rate = 0;
            break;
    }
    return round($subtotal * $tax_rate, 2);
}

function card_name($card_type) {
    switch ($card_type) {
        case 1:
            return 'MasterCard';
        case 2:
            return 'Visa';
        case 3:
            return 'Discover';
        case 4:
            return 'American Express';
        default:
            return 'Unknown Card Type';
    }
}

function add_order($card_type, $card_number, $card_cvv, $card_expires) {
    global $db;
    $customer_id = $_SESSION['user']['customerID'];
    $billing_id = $_SESSION['user']['billingAddressID'];
    $shipping_id = $_SESSION['user']['shipAddressID'];
    $shipping_cost = shipping_cost();
    $tax = tax_amount(cart_subtotal());
    $order_date = date("Y-m-d H:i:s");

    $query = '
         INSERT INTO orders (customerID, orderDate, shipAmount, taxAmount,
                             shipAddressID, cardType, cardNumber,
                             cardExpires, billingAddressID)
         VALUES (:customer_id, :order_date, :ship_amount, :tax_amount,
                 :shipping_id, :card_type, :card_number,
                 :card_expires, :billing_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->bindValue(':order_date', $order_date);
    $statement->bindValue(':ship_amount', $shipping_cost);
    $statement->bindValue(':tax_amount', $tax);
    $statement->bindValue(':shipping_id', $shipping_id);
    $statement->bindValue(':card_type', $card_type);
    $statement->bindValue(':card_number', $card_number);
    $statement->bindValue(':card_expires', $card_expires);
    $statement->bindValue(':billing_id', $billing_id);
    $statement->execute();
    $order_id = $db->lastInsertId();
    $statement->closeCursor();
    return $order_id;
}

function add_order_item($order_id, $product_id, $item_price, $discount, $quantity) {
    global $db;
    $query = '
        INSERT INTO OrderItems (orderID, productID, itemPrice,
                                discountAmount, quantity)
        VALUES (:order_id, :product_id, :item_price, :discount, :quantity)';
    $statement = $db->prepare($query);
    $statement->bindValue(':order_id', $order_id);
    $statement->bindValue(':product_id', $product_id);
    $statement->bindValue(':item_price', $item_price);
    $statement->bindValue(':discount', $discount);
    $statement->bindValue(':quantity', $quantity);
    $statement->execute();
    $statement->closeCursor();
}

function get_order($order_id) {
    global $db;
    $query = 'SELECT * FROM orders WHERE orderID = :order_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':order_id', $order_id);
    $statement->execute();
    $order = $statement->fetch();
    $statement->closeCursor();
    return $order;
}

function get_order_items($order_id) {
    global $db;
    $query = 'SELECT * FROM OrderItems WHERE orderID = :order_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':order_id', $order_id);
    $statement->execute();
    $order_items = $statement->fetchAll();
    $statement->closeCursor();
    return $order_items;
}

function get_orders_by_customer_id($customer_id) {
    global $db;
    $query = 'SELECT * FROM orders WHERE customerID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $order = $statement->fetchAll();
    $statement->closeCursor();
    return $order;
}

function get_unfilled_orders() {
    global $db;
    $query = 'SELECT * FROM orders
              INNER JOIN customers
              ON customers.customerID = orders.customerID
              WHERE shipDate IS NULL ORDER BY orderDate';
    $statement = $db->prepare($query);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();
    return $orders;
}

function get_filled_orders() {
    global $db;
    $query = 'SELECT * FROM orders
         INNER JOIN customers
         ON customers.customerID = orders.customerID
         WHERE shipDate IS NOT NULL ORDER BY orderDate';
    $statement = $db->prepare($query);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();
    return $orders;
}

function set_ship_date($order_id) {
    global $db;
    $ship_date = date("Y-m-d H:i:s");
    $query = '
         UPDATE orders
         SET shipDate = :ship_date
         WHERE orderID = :order_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':ship_date', $ship_date);
    $statement->bindValue(':order_id', $order_id);
    $statement->execute();
    $statement->closeCursor();
}

function delete_order($order_id) {
    global $db;
    $query = 'DELETE FROM orders WHERE orderID = :order_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':order_id', $order_id);
    $statement->execute();
    $statement->closeCursor();
}

?>