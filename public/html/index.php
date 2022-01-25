<?php

session_start();

if (!isset($_SESSION["email"])) {
  header("Location: ./login.php");
}
include_once(__DIR__ . "\..\..\controllers\ItemController.php");

$itemController = new ItemController();

$results = $itemController->getItems();

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Online Store</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Nunito&family=Questrial&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../fonts/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../css/global.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/footer.css">
  <link rel="stylesheet" href="../css/category.css">

</head>

<body>

  <?php include_once(__DIR__ . '\header.php') ?>

  <!--Start Categories section-->
  <section class="category-section">
    <div class="container">
      <div class="row">
        <!--Start Filter-->
        <div class="filter col d-none d-lg-block">
          <div class="category">

            <h6><span id="close-btn-filter" class="d-inline d-lg-none"><i class="fas fa-times"></i></span> CATEGORY</h6>
            <ul>
              <li>PC Game Hardware</li>
              <li>Controllers</li>
              <li>Gaming Keyboards</li>
              <li>Gaming Mice</li>
              <li>Headsets</li>
            </ul>
          </div>
          <div class="rating">
            <div class="row">
              <h6 class="col">PRODUCT RATING</h6>
              <input type="reset" value="RESET" class="col-3 text-right filter-submit">
            </div>
            <form>
              <div class="custom-control custom-radio">
                <input type="radio" name="rate" value="5" class="custom-control-input" id="rating5">
                <label class="custom-control-label" for="rating5">
                  <p>
                    <i class="fas fa-star" style="color: rgb(240, 187, 13);"></i>
                    <i class="fas fa-star" style="color: rgb(240, 187, 13);"></i>
                    <i class="fas fa-star" style="color: rgb(240, 187, 13);"></i>
                    <i class="fas fa-star" style="color: rgb(240, 187, 13);"></i>
                    <i class="fas fa-star" style="color: #999"></i>
                    & Up
                  </p>
                </label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" name="rate" value="4" class="custom-control-input" id="rating4">
                <label class="custom-control-label" for="rating4">
                  <p>
                    <i class="fas fa-star" style="color: rgb(240, 187, 13);"></i>
                    <i class="fas fa-star" style="color: rgb(240, 187, 13);"></i>
                    <i class="fas fa-star" style="color: rgb(240, 187, 13);"></i>
                    <i class="fas fa-star" style="color: #999"></i>
                    <i class="fas fa-star" style="color: #999"></i>
                    & Up
                  </p>
                </label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" name="rate" value="3" class="custom-control-input" id="rating3">
                <label class="custom-control-label" for="rating3">
                  <p>
                    <i class="fas fa-star" style="color: rgb(240, 187, 13);"></i>
                    <i class="fas fa-star" style="color: rgb(240, 187, 13);"></i>
                    <i class="fas fa-star" style="color: #999"></i>
                    <i class="fas fa-star" style="color: #999"></i>
                    <i class="fas fa-star" style="color: #999"></i>
                    & Up
                  </p>
                </label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" name="rate" value="2" class="custom-control-input" id="rating2">
                <label class="custom-control-label" for="rating2">
                  <p>
                    <i class="fas fa-star" style="color: rgb(240, 187, 13);"></i>
                    <i class="fas fa-star" style="color: #999"></i>
                    <i class="fas fa-star" style="color: #999"></i>
                    <i class="fas fa-star" style="color: #999"></i>
                    <i class="fas fa-star" style="color: #999"></i>
                    & Up
                  </p>
                </label>
              </div>
            </form>
          </div>
          <div class="brand">
            <h6>BRAND</h6>
            <div class="search col-12 mt-md-0 mt-4">
              <i class="fas fa-search"></i>
              <input type="text" class="form-control col" name="search" placeholder="Search" autocomplete="off">
            </div>

            <form action="">
              <div class="select-container">
                <input type="checkbox" name="brand" value="apple">
                <label>Apple</label>
                <br>
                <input type="checkbox" name="brand" value="samsung">
                <label>Samsung</label>
              </div>
            </form>
          </div>
          <div class="range">
            <form action="">
              <div class="row">
                <h6 class="col">PRICE (EGP)</h6>
                <input type="submit" value="APPLY" class="col-3 text-right filter-submit">
              </div>

              <div class="row justify-content-around">
                <input type="number" name="min-price" min="0" class="col-5 form-control">
                <div class="d-flex justify-centent-center align-items-center">-</div>
                <input type="number" name="max-price" min="0" class="col-5 form-control">
              </div>
            </form>
          </div>
        </div>

        <!--End Filter-->
        <!--Start Product list-->
        <div class="product-list col-12 col-lg-8 col-xl-9">

          <header class="filter-header">
            <h5>
              Computers & Laptops
              <span>(16000007 Items found)</span>
            </h5>
            <div class="sort">
              <div class="dropdown">
                <button class="btn dropdown-toggle" id="dropdownSort" data-toggle="dropdown">
                  <b>Sort by:</b> Popularity
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownSort">
                  <a class="dropdown-item" href="#">Popularity</a>
                  <a class="dropdown-item" href="#">Newest Arrivals</a>
                  <a class="dropdown-item" href="#">Price: Low to High</a>
                  <a class="dropdown-item" href="#">Price: High to Low</a>
                  <a class="dropdown-item" href="#">Product Rating</a>
                </div>
              </div>
            </div>
          </header>

          <div id="open-btn-filter" class="filter-btn d-block d-lg-none">
            <i class="fas fa-filter" style="color: #FFF;"></i>
          </div>

          <!--Start container products-->
          <div class="container-items">
            <!--Product 1-->
            <?php while ($rows = mysqli_fetch_array($results)) { ?>
              <form action='../../config/RequestHandler.php' method='GET'>
                <div class="product">
                  <div class="img">
                    <img src="<?php echo $rows["img"]; ?>" alt="product">
                  </div>
                  <div class="product-name">
                    <p>
                      <?php echo $rows["name"]; ?>
                    </p>
                  </div>
                  <div class="price">
                    <p>EGP <?php echo $rows["price"] ?></p>
                  </div>
                  <?php echo '<input type="hidden" name="addItem" value="' . $rows["id"] . '">' ?>
                  <input type="number" class="form-control" name="quantity" value="1">
                  <div class="product-btn">
                    <button class="btn btn-warning">
                      ADD TO CART
                    </button>
                  </div>
                </div>
              </form>
            <?php } ?>
            <!--===================================================================-->
          </div>
          <!--End container products-->

          <!--Start Pagination-->
          <div class="pagination">
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
          <!--End Pagination-->
        </div>
        <!--End Product list-->
      </div>
    </div>
  </section>
  <!--End Categories section-->

  <?php include_once(__DIR__ . '\footer.php') ?>

  <!------------------------------------------------------JavaScript------------------------------------------------------>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <script src="../js/index.js"></script>
  <script src="../js/category.js"></script>
</body>

</html>