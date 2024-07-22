<?php
$docTitle = "Products";
require_once("docstart.php");
require_once("navlinks.php");
?>

<link rel="stylesheet" href="css/products.css">

<div id="container">
    <h1 class="page-heading"><span class="page-heading-underline">Products</span></h1>

    <h2>Capsule/Encapsulation</h2>
    <div class="product">
        <img src="../images/capsules.jpg" alt="Capsule/Encapsulation">
        <div class="product-description">
            <ul>
                <li>
                    <strong>Profill 100 (2000 c/hr)</strong><br>
                    - Output: 2000 capsules per hour<br>
                    - Capsule size: 00<br>
                    - Machine dimension: 1200mm x 800mm x 1500mm<br>
                    - Shipping weight: 500kg
                </li>
                <li>
                    <strong>Profill 3007 (9000 c/hr)</strong><br>
                    - Output: 9000 capsules per hour<br>
                    - Capsule size: 0<br>
                    - Machine dimension: 1500mm x 1000mm x 1800mm<br>
                    - Shipping weight: 800kg
                </li>
                <li>
                    <strong>Model 8S (18000 c/hr)</strong><br>
                    - Output: 18000 capsules per hour<br>
                    - Capsule size: 000<br>
                    - Machine dimension: 1800mm x 1200mm x 2000mm<br>
                    - Shipping weight: 1200kg
                </li>
            </ul>
        </div>
    </div>

    <h2>Tablet</h2>
    <div class="product">
        <img src="../images/tablet.jpg" alt="Tablet">
        <div class="product-description">
            <ul>
                <li>
                    <strong>TDP</strong><br>
                    - Model number: TDP-0<br>
                    - Dies: 1 set<br>
                    - Max Pressure: 50 kN<br>
                    - Max Diameter of tablet: 10mm<br>
                    - Max depth of fill: 15mm<br>
                    - Production capacity: 5000 tablets/hour<br>
                    - Machine size: 600mm x 400mm x 700mm<br>
                    - Net Weight: 80kg
                </li>
                <li>
                    <strong>VSP</strong><br>
                    - Model number: VSP-1<br>
                    - Dies: 2 sets<br>
                    - Max Pressure: 80 kN<br>
                    - Max Diameter of tablet: 12mm<br>
                    - Max depth of fill: 18mm<br>
                    - Production capacity: 10000 tablets/hour<br>
                    - Machine size: 800mm x 500mm x 900mm<br>
                    - Net Weight: 120kg
                </li>
                <li>
                    <strong>CP 501</strong><br>
                    - Model number: CP 501<br>
                    - Dies: 3 sets<br>
                    - Max Pressure: 100 kN<br>
                    - Max Diameter of tablet: 15mm<br>
                    - Max depth of fill: 20mm<br>
                    - Production capacity: 15000 tablets/hour<br>
                    - Machine size: 1000mm x 600mm x 1100mm<br>
                    - Net Weight: 150kg
                </li>
            </ul>
        </div>
    </div>

    <h2>Liquid Filling</h2>
    <div class="product">
        <img src="../images/liquid_filling.jpg" alt="Liquid Filling">
        <div class="product-description">
            <ul>
                <li>
                    <strong>DHF (Double Headed Filter)</strong><br>
                    - Air pressure: 80 PSI<br>
                    - Air Volume: 500 liters/minute<br>
                    - Filling Speed: 120 bottles/min<br>
                    - Filling Range: 10ml to 500ml
                </li>
            </ul>
        </div>
    </div>
</div>

<?php require_once("docend.php"); ?>
