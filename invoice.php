<?php

require "connection.php";

session_start();

$userData = $_SESSION['u'];

$orderId = $_GET['id'];

$invoiceTable = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $orderId . "'");
$invoiceTableRow = $invoiceTable->fetch_assoc();

$addressTable = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $userData["email"] . "'");
$addressTableRow = $addressTable->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="invoice.css" />
</head>

<body>

    <div class="container mt-6 mb-7">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-7">
                <div class="card">
                    <div class="card-body p-5" id="page">
                        <h2>
                            Hey <?php echo $userData["fname"] ?>,
                        </h2>
                        <p class="fs-sm">
                            This is the receipt for a payment of <strong>$<?php echo $invoiceTableRow["total"] ?>.00</strong> (USD) you made to VNY Technologies.
                        </p>

                        <div class="border-top border-gray-200 pt-4 mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-muted mb-2">Payment Id.</div>
                                    <strong>#<?php echo $invoiceTableRow["order_id"] ?></strong>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <div class="text-muted mb-2">Payment Date</div>
                                    <strong><?php echo $invoiceTableRow["date"] ?></strong>
                                </div>
                            </div>
                        </div>

                        <div class="border-top border-gray-200 mt-4 py-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-muted mb-2">Client</div>
                                    <strong>
                                        <?php echo $userData["fname"] . " " . $userData["lname"] ?>
                                    </strong>
                                    <p class="fs-sm">
                                        <?php echo $addressTableRow["line1"] . " " . $addressTableRow["line2"] ?>, <?php echo $addressTableRow['city'] ?>, <?php echo $addressTableRow["postal_code"] ?>
                                        <br>
                                        <a href="#!" class="text-purple"><?php echo $userData["email"] ?>
                                        </a>
                                    </p>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <div class="text-muted mb-2">Payment To</div>
                                    <strong>
                                        VNY Technologies LLC
                                    </strong>
                                    <p class="fs-sm">
                                        9th Avenue, San Francisco 99383
                                        <br>
                                        <a href="#!" class="text-purple">gallerycafe@gmail.com
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <table class="table border-bottom border-gray-200 mt-3">
                            <thead>
                                <tr>
                                    <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm px-0">Description</th>
                                    <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm text-end px-0">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $productd=Database::search("SELECT * FROM `product_has_invoice` INNER JOIN `invoice` ON `product_has_invoice`.`invoice_id`=`invoice`.`id` INNER JOIN `product` ON `product_has_invoice`.`product_id`=`product`.`id` WHERE `order_id`='".$orderId."'");
                                
                                for ($x = 0; $x < $productd->num_rows; $x++) {
                                    $product_data = $productd->fetch_assoc();
                                ?>

                                    <tr>
                                        <td class="px-0"><?php echo $product_data["title"]?></td>
                                        <td class="text-end px-0">$<?php echo $product_data["price"]?>.00</td>
                                    </tr>

                                <?php
                                }

                                ?>

                            </tbody>
                        </table>

                        <div class="mt-5">
                            <div class="d-flex justify-content-end">
                                <p class="text-muted me-3">Subtotal:</p>
                                <span>$<?php echo $invoiceTableRow["total"] ?>.00</span>
                            </div>
                            <div class="d-flex justify-content-end">
                                <p class="text-muted me-3">Discount:</p>
                                <span>0</span>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <h5 class="me-3">Total:</h5>
                                <h5 class="text-success">$<?php echo $invoiceTableRow["total"] ?> USD</h5>
                            </div>
                        </div>
                    </div>
                    <a href="#!" class="btn btn-dark btn-lg card-footer-btn justify-content-center text-uppercase-bold-sm hover-lift-light" onclick="printInvoice();">
                        <span class="svg-icon text-white me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                            </svg>
                        </span>
                        <label>PDF</label>
                    </a>

                    <?php
                    
                    $file = Database::search("SELECT * FROM `file` WHERE `product_id`='".$product_data['id']."'");
                    $file_data = $file->fetch_assoc();

                    ?>

                    <a href="./Admin/zip_files/<?php echo $file_data["path"]?>"  download  class="btn btn-dark btn-lg card-footer-btn justify-content-center text-uppercase-bold-sm hover-lift-light" >
                        <span class="svg-icon text-white me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                            </svg>
                        </span>
                        <label>FILES</label>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="pay.js"></script>
</body>

</html>

<?php

?>