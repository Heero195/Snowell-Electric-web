<?php
include 'C:\Users\Admin\OneDrive\Documents\3d files\doan1\tailieudoan1\New folder\doan1newdashboard\doan1newdashboard\doan1newdashboard\db.php';
//include db.php path//
$popupMessage = '';

// Lấy danh sách sản phẩm từ database
try {
    $stmt = $pdo->query("SELECT * FROM product");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $products = [];
}

// Xử lý khi form được gửi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    //Chèn vào bảng contact
    $sql = "INSERT INTO contact (name, email, message) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$name, $email, $message])) {
        $popupMessage = "Your message has been sent. Thank you!";
    } else {
        $popupMessage = "Error: " . implode(", ", $stmt->errorInfo());
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Icon-->
  <link rel="icon" href="images/1-removebg-preview.png" type="image/x-icon">
  <!-- Project Title -->
  <title>Snowell Electric</title>
  <!--StyleSheets-->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
  <!--Cdn link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css">
</head>
<!--Body Section-->

<body class="body-main">
  <div class="ticker">
    <marquee behavior="" direction="" scrollamount="10">
      <div class="ticker-content" id="tickerContent"></div>
    </marquee>
  </div>
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary p-0">
    <div class="container-fluid">
      <!--Navbar Logo-->
      <a class="navbar-brand ps-4" href="#">
        <img src="images/resized.png" width="160px" alt=""
          style="filter: grayscale(100%); transition: filter 0.3s ease;" onmouseover="this.style.filter='grayscale(0%)'"
          onmouseout="this.style.filter='grayscale(100%)'">
      </a>

      <!--Navbar Collapse-->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon icon1"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <!--Navbar Content-->
        <ul class="navbar-nav ms-auto  text-center  ">
          <!-- Link 1 -->
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <!-- Link 2 -->
          <li class="nav-item">
            <a class="nav-link" href="#products">Products</a>
          </li>
          <!-- Link 3 -->
          <li class="nav-item">
            <a class="nav-link" href="#map">Shop Location</a>
          </li>
          <!-- Link 4 -->
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact Us</a>
          </li>

          <p class="linee"><sub>|</sub></p>
          <!-- Visitor Count-->
          <li class="nav-item text-center">
            <a href="" class="d-flex rounded visitc"> <i class="fa-solid fa-user fw-lg"></i>
              <p class="counter" id="pageview-count"></p>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--Navbar End-->
  <!--Hero Section-->
  <div class="Hero" id="Hero">
    <!--carousel-->
    <div id="carousel" class="carousel slide">
      <!--Carousel indicators-->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true"
          aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <!--Carousel Images-->
      <div class="carousel-inner">
        <!--Carousel image 1-->
        <div class="carousel-item active">
          <img src="images/Screenshot (694).png" class="w-100" alt="...">
        </div>
        <!--Carousel image 2-->
        <div class="carousel-item">
          <img src="images/Screenshot (626).png" class="d-block w-100" alt="...">
        </div>
        <!--Carousel image 3-->
        <div class="carousel-item">
          <img src="images/ChatGPT -0.png" class="d-block w-100" alt="...">
        </div>
      </div>
      <!--Carousel Buttons-->
      <!--Previous Button-->
      <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <!--Next Button-->
      <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <!--Hero End-->
  <!--About Section-->
  <div class="Snowell-about">
    <div class="cont justify-items-center">
      <!--About Text-->
      <div class="abt  text-center fw-bold pt-4 ">
        <p>At Snowell Electronic, we’re all about making life easier and more comfortable for you.
          We create smart, reliable electronics that fit right into your everyday routine — so you can focus on what
          truly matters. Your comfort and convenience are always at the heart of what we do.</p>
      </div>
    </div>
    <!--About End-->
    <!--Horizontal Line-->
    <hr>
    <!--Offers Heading-->
    <h1 class="Offers p-5" id="offers">We Offer</h1>
    <!--Main Content -->
    <div class="cont-main p-5 container">
      <div class="cards-about container text-center g-5  ">
        <!--Container Cards-->
        <div class="row gap-3 ">
          <!--Card 1-->
          <div class="card1 col p-3 " id="card-info"><img src="" style="width: 50px;" alt="">
            <h4>Reliability</h4>
            <p>Snowell Electronic ensures consistent, uninterrupted power delivery to reliably meet your everyday needs.
            </p>
          </div>
          <!--Card 2-->
          <div class="card2 col p-3" id="card-info"> <img src="" style="width: 50px;" alt="">
            <h4>Excellent Customer Support </h4>
            <p>Our customer support team offers quick, friendly, and expert help whenever you require it.</p>
          </div>
          <!--Card 3-->
          <div class="card3 col p-3" id="card-info"><img src="" style="width: 50px;" alt="">
            <h4>Environmental Awareness</h4>
            <p>We work to minimize our environmental impact and promote a greener future.</p>
          </div>
        </div>
      </div>
    </div>
    <!--Main Content End-->
    <!--Horizontal Line-->
    <hr>
    <!--Products Container-->
    <div class="products text-center" id="products">
      <!--Products Heading-->
      <div class="prod p-5">
        <h1>
          <h1 class="Prods">Products</h1>
      </div>
      <!-- Nav tabs -->
      <div class="nav-tabs-main">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#home">All</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#menu1">Air Conditioners</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#menu2">Fans</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#menu3">Geysers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#menu4">CFLs</a>
          </li>
        </ul>
      </div>
      <!-- Tab panes -->
      <div class="tab-content">
        <!--All Products-->
        <div class="tab-pane container  active" id="home">
          <div class="card-head-main">
            <!--Ac 1-->
            <div class="card" style="width: 18rem;">
              <img src="images/Ac1.jpg" class="card-img" alt="...">
              <div class="card-body">
                <h5 class="card-title">LG 12.300 BTU</h5>
                <p class="card-text">11,190,000 VND</p>
                <a href="detail/LG 12.300 BTU detail.docx" class="btn btn-primary">Detailed View</a>
              </div>
            </div>
            <!--Ac 2-->
            <div class="card" style="width: 18rem;">
              <img src="images/Ac2.jpg" class="card-img" alt="...">
              <div class="card-body">
                <h5 class="card-title">Samsung 9.000 BTU</h5>
                <p class="card-text">7,500,000 VND</p>
                <a href="detail/Samsung 9.000 BTU detail.docx" class="btn btn-primary">Detailed View</a>
              </div>
            </div>
            <!--Ac 3-->
            <div class="card" style="width: 18rem;">
              <img src="images/Ac3.jpg" class="card-img" alt="...">
              <div class="card-body">
                <h5 class="card-title">Panasonic 9.550 BTU</h5>

                <p class="card-text">14,000,000 VND</p>
                <a href="detail/Panasonic 9.550 BTU detail.docx" class="btn btn-primary">Detailed View</a>
              </div>
            </div>
            <!--Ac 4-->
            <div class="card" style="width: 18rem;">
              <img src="images/Ac4.jpg" class="card-img" alt="...">
              <div class="card-body">

                <h5 class="card-title">Sharp 9.000 BTU</h5>
                <p class="card-text">7,800,000 VND</p>
                <a href="detail/Sharp 9.000 BTU detail.docx" class="btn btn-primary">Detailed View</a>
              </div>
            </div>

            <!--Fan 1-->
            <div class="card" style="width: 18rem;">
              <img src="images/Fan1.jpg" class="card-img" alt="...">
              <div class="card-body">

                <h5 class="card-title">Vinawind QT-1500X ceiling fan</h5>
                <p class="card-text">1,500,000 VND</p>
                <a href="detail/Vinawind QT-1500X ceiling fan detail.docx" class="btn btn-primary">Detailed View</a>
              </div>
            </div>
            <!--Fan 2-->
            <div class="card" style="width: 18rem;">
              <img src="images/Fan2.jpg" class="card-img" alt="...">
              <div class="card-body">
                <h5 class="card-title">Vinawind QB-300 I table fan</h5>
                <p class="card-text">350,000 VND</p>
                <a href="detail/Vinawind QB-300 I table fan detail.docx" class="btn btn-primary">Detailed View</a>
              </div>
            </div>
            <!--Fan 3-->
            <div class="card" style="width: 18rem;">
              <img src="images/Fan3.jpg" class="card-img" alt="...">
              <div class="card-body">
                <h5 class="card-title">Vinawind QH-300LP box fan</h5>
                <p class="card-text">400,000 VND</p>
                <a href="detail/Vinawind QH-300LP box fan detail.docx" class="btn btn-primary">Detailed View</a>
              </div>
            </div>
            <!--Fan 4-->
            <div class="card" style="width: 18rem;">
              <img src="images/Fan4.jpg" class="card-img" alt="...">
              <div class="card-body">

                <h5 class="card-title">Vinawind QD-400XPN standing fan</h5>
                <p class="card-text">900,000 VND</p>
                <a href="detail/Vinawind QD-400XPN standing fan detail.docx" class="btn btn-primary">Detailed View</a>
              </div>
            </div>

            <!--Geysers 1-->
            <div class="card" style="width: 18rem;">
              <img src="images/Geyser1.jpg" class="card-img" alt="...">
              <div class="card-body">
                <h5 class="card-title">Geyser Ecotar 9 Slim</h5>
                <p class="card-text">15,000,000 VND</p>
                <a href="detail/Geyser Ecotar 9 Slim detail.docx" class="btn btn-primary">Detailed View</a>
              </div>
            </div>
            <!--Geysers  2-->
            <div class="card" style="width: 18rem;">
              <img src="images/Geyser2.png" class="card-img" alt="...">
              <div class="card-body">
                <h5 class="card-title">Geyser Ecotar 9 Nano</h5>
                <p class="card-text">15,000,000 VND</p>
                <a href="detail/Geyser Ecotar 9 Nano detail.docx" class="btn btn-primary">Detailed View</a>
              </div>
            </div>
            <!--Geysers 3-->
            <div class="card" style="width: 18rem;">
              <img src="images/Geyser3.jpg" class="card-img" alt="...">
              <div class="card-body">

                <h5 class="card-title">Geyser Ecotar 2 Nano</h5>
                <p class="card-text">4,000,000 VND</p>
                <a href="detail/Geyser Ecotar 2 Nano.docx" class="btn btn-primary">Detailed View</a>
              </div>
            </div>
            <!--Geysers 4-->
            <div class="card" style="width: 18rem;">
              <img src="images/Geyser4.jpg" class="card-img" alt="...">
              <div class="card-body">

                <h5 class="card-title">GF-40EL Electric Geyser</h5>
                <p class="card-text">7,000,000 VND</p>
                <a href="detail/GF-40EL Electric Geyser detail.docx" class="btn btn-primary">Detailed View</a>
              </div>
            </div>


            <!--CFL 1-->
            <div class="card" style="width: 18rem;">
              <img src="images/Cfl1.jpg" class="card-img" alt="...">
              <div class="card-body">
                <h5 class="card-title">Rang Dong 14W TR70N1</h5>
                <p class="card-text">77,000 VND</p>
                <a href="detail/LED Bulb 14W TR70N1.docx"
                  class="btn btn-primary">Detailed View</a>
              </div>
            </div>
            <!--CFL 2-->
            <div class="card" style="width: 18rem;">
              <img src="images/Cfl2.jpg" class="card-img" alt="...">
              <div class="card-body">
                <h5 class="card-title">Rang Dong TR70N1 12VDC </h5>
                <p class="card-text">69,000 VND</p>
                <a href="detail/Rang Dong TR70N1 12VDC.docx"
                  class="btn btn-primary">Detailed View</a>
              </div>
            </div>
            <!--CFL 3-->
            <div class="card" style="width: 18rem;">
              <img src="images/Cfl3.jpg" class="card-img" alt="...">
              <div class="card-body">

                <h5 class="card-title">Rang Dong 7W LED DL </h5>
                <p class="card-text">70,000 VND</p>
                <a href="detail/Rang Dong 7W LED DL.docx" class="btn btn-primary">Detailed
                  View</a>
              </div>
            </div>

            <!--cfl 4-->
            <div class="card" style="width: 18rem;">
              <img src="images/Cfl4.jpg" class="card-img" alt="...">
              <div class="card-body">

                <h5 class="card-title">Rang Dong LN12 70 </h5>
                <p class="card-text">72,000 VND</p>
                <a href="detail/Rang Dong LN12 70.docx"
                  class="btn btn-primary">Detailed View</a>
              </div>
            </div>

          </div>
        </div>

        <!--Air Conditioners-->
        <div class="tab-pane container fade" id="menu1">
          <div class="prodlist">
            <a href="list/Air Conditioners List.docx">Click To Download Air Conditioners List</a>
          </div>
          <div class="card-head-main">
            <!--Ac 1-->
            <div class="card" style="width: 18rem;">
              <img src="images/Ac1.jpg" class="card-img" alt="...">
              <div class="card-body">
                <h5 class="card-title">LG 12.300 BTU</h5>
                <p class="card-text">11,190,000 VND</p>
                <a href="detail/LG 12.300 BTU detail.docx"
                  class="btn btn-primary">Detailed View</a>
              </div>
            </div>
            <!--Ac 2-->
            <div class="card" style="width: 18rem;">
              <img src="images/Ac2.jpg" class="card-img" alt="...">
              <div class="card-body">
                <h5 class="card-title">Samsung 9.000 BTU</h5>
                <p class="card-text">7,500,000 VND</p>
                <a href="detail/Samsung 9.000 BTU detail.docx"
                  class="btn btn-primary">Detailed View</a>
              </div>
            </div>
            <!--Ac 3-->
            <div class="card" style="width: 18rem;">
              <img src="images/Ac3.jpg" class="card-img" alt="...">
              <div class="card-body">
                <h5 class="card-title">Panasonic 9.550 BTU</h5>

                <p class="card-text">14,000,000 VND</p>
                <a href="detail/Panasonic 9.550 BTU detail.docx" class="btn btn-primary">Detailed View</a>
              </div>
            </div>
            <!--Ac 4-->
            <div class="card" style="width: 18rem;">
              <img src="images/Ac4.jpg" class="card-img" alt="...">
              <div class="card-body">

                <h5 class="card-title">Sharp 9.000 BTU</h5>
                <p class="card-text">7,800,000 VND</p>
                <a href="detail/Sharp 9.000 BTU detail.docx" class="btn btn-primary">Detailed
                  View</a>
              </div>
            </div>
          </div>
        </div>
        <!--Fans-->
        <div class="tab-pane container fade" id="menu2">
          <div class="prodlist">
            <a href="list/Fan List.docx">Click To Download Fans List</a>
          </div>
          <div class="card-head-main">
            <!--Fan 1-->
            <div class="card" style="width: 18rem;">
              <img src="images/Fan1.jpg" class="card-img" alt="...">
              <div class="card-body">

                <h5 class="card-title">Vinawind QT-1500X ceiling fan</h5>
                <p class="card-text">1,500,000 VND</p>
                <a href="detail/~$nawind QT-1500X ceiling fan detail.docx"
                  class="btn btn-primary">Detailed View</a>
              </div>
            </div>
            <!--Fan 2-->
            <div class="card" style="width: 18rem;">
              <img src="images/Fan2.jpg" class="card-img" alt="...">
              <div class="card-body">
                <h5 class="card-title">Vinawind QB-300 I table fan</h5>
                <p class="card-text">350,000 VND</p>
                <a href="detail/~$nawind QB-300 I table fan detail.docx"
                  class="btn btn-primary">Detailed View</a>
              </div>
            </div>
            <!--Fan 3-->
            <div class="card" style="width: 18rem;">
              <img src="images/Fan3.jpg" class="card-img" alt="...">
              <div class="card-body">
                <h5 class="card-title">Vinawind QH-300LP box fan</h5>
                <p class="card-text">400,000 VND</p>
                <a href="detail/~$nawind QH-300LP box fan detail.docx" class="btn btn-primary">Detailed
                  View</a>
              </div>
            </div>
            <!--Fan 4-->
            <div class="card" style="width: 18rem;">
              <img src="images/Fan4.jpg" class="card-img" alt="...">
              <div class="card-body">

                <h5 class="card-title">Vinawind QD-400XPN standing fan</h5>
                <p class="card-text">900,000 VND</p>
                <a href="detail/~$nawind QD-400XPN standing fan detail.docx"
                  class="btn btn-primary">Detailed View</a>
              </div>
            </div>

          </div>
        </div>
        <!--Geysers-->
        <div class="tab-pane container fade" id="menu3">
          <div class="prodlist">
            <a href="list/Geyser List.docx">Click To Download Geysers List</a>
          </div>
          <div class="card-head-main">
            <!--Geysers 1-->
            <div class="card" style="width: 18rem;">
              <img src="images/Geyser1.jpg" class="card-img" alt="...">
              <div class="card-body">
                <h5 class="card-title">Geyser Ecotar 9 Slim</h5>
                <p class="card-text">15,000,000 VND</p>
                <a href="detail/Geyser Ecotar 9 Slim detail.docx"
                  class="btn btn-primary">Detailed View</a>
              </div>
            </div>
            <!--Geysers  2-->
            <div class="card" style="width: 18rem;">
              <img src="images/Geyser2.png" class="card-img" alt="...">
              <div class="card-body">
                <h5 class="card-title">Geyser Ecotar 9 Nano</h5>
                <p class="card-text">15,000,000 VND</p>
                <a href="detail/Geyser Ecotar 9 Nano detail.docx"
                  class="btn btn-primary">Detailed View</a>
              </div>
            </div>
            <!--Geysers 3-->
            <div class="card" style="width: 18rem;">
              <img src="images/Geyser3.jpg" class="card-img" alt="...">
              <div class="card-body">

                <h5 class="card-title">Geyser Ecotar 2 Nano</h5>
                <p class="card-text">4,000,000 VND</p>
                <a href="detail/Geyser Ecotar 2 Nano.docx" class="btn btn-primary">Detailed
                  View</a>
              </div>
            </div>
            <!--Geysers 4-->
            <div class="card" style="width: 18rem;">
              <img src="images/Geyser4.jpg" class="card-img" alt="...">
              <div class="card-body">

                <h5 class="card-title">GF-40EL Electric Geyser</h5>
                <p class="card-text">7,000,000 VND</p>
                <a href="detail/GF-40EL Electric Geyser detail.docx"
                  class="btn btn-primary">Detailed View</a>
              </div>
            </div>
          </div>
        </div>
        <!--CFLs-->
        <div class="tab-pane container fade" id="menu4">
          <div class="prodlist">
            <a href="list/CFL List.docx">Click To Download Cfls List</a>
          </div>
          <div class="card-head-main">
            <!--CFL 1-->
            <div class="card" style="width: 18rem;">
              <img src="images/Cfl1.jpg" class="card-img" alt="...">
              <div class="card-body">
                <h5 class="card-title">Rang Dong 14W TR70N1</h5>
                <p class="card-text">77,000 VND</p>
                <a href="detail/LED Bulb 14W TR70N1.docx"
                  class="btn btn-primary">Detailed View</a>
              </div>
            </div>
            <!--CFL 2-->
            <div class="card" style="width: 18rem;">
              <img src="images/Cfl2.jpg" class="card-img" alt="...">
              <div class="card-body">
                <h5 class="card-title">Rang Dong TR70N1 12VDC </h5>
                <p class="card-text">69,000 VND</p>
                <a href="detail/Rang Dong TR70N1 12VDC.docx"
                  class="btn btn-primary">Detailed View</a>
              </div>
            </div>
            <!--CFL 3-->
            <div class="card" style="width: 18rem;">
              <img src="images/Cfl3.jpg" class="card-img" alt="...">
              <div class="card-body">

                <h5 class="card-title">Rang Dong 7W LED DL </h5>
                <p class="card-text">70,000 VND</p>
                <a href="detail/Rang Dong 7W LED DL.docx" class="btn btn-primary">Detailed
                  View</a>
              </div>
            </div>

            <!--cfl 4-->
            <div class="card" style="width: 18rem;">
              <img src="images/Cfl4.jpg" class="card-img" alt="...">
              <div class="card-body">

                <h5 class="card-title">Rang Dong LN12 70 </h5>
                <p class="card-text">72,000 VND</p>
                <a href="detail/Rang Dong LN12 70.docx"
                  class="btn btn-primary">Detailed View</a>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- fix -->
<div class="tab-pane container  active" id="home">
  <div class="card-head-main">
    <?php foreach ($products as $row): ?>
      <div class="card" style="width: 18rem; display:inline-block; margin:10px;">
        <img src="../uploads/<?= htmlspecialchars($row['images']) ?>" class="card-img" alt="<?= htmlspecialchars($row['name']) ?>">
        <div class="card-body">
          <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5>
          <p class="card-text"><?= number_format($row['price']) ?> VND</p>
          <p class="card-text"><?= htmlspecialchars($row['description']) ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>


    </div>
    <!--Horizontal line-->
    <hr>
    <div class="prod pt-5">
      <h1>
        <h1 class="Prods">Contact Us</h1>
    </div>
    <!--Contact Heading -->
    <!-- Contact -->
    <div class="main" id="contact">
      <div class="container main2">
        <div class="form">

          <p>Feel free to reach out for any inquiries or feedback. We are here to help!</p>

          <form action="index.php" method="POST">

            <div class="inputs">
              <input type="text" name="name" placeholder="Your Name" required>
              <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" rows="5" placeholder="Your message" required></textarea><br><br>
              <button type="submit">Send Message</button>
            </div>

             <?php if (!empty($popupMessage)) : ?>
            <script>
                alert("<?= htmlspecialchars($popupMessage, ENT_QUOTES) ?>");
            </script>
        <?php endif; ?>
            <!-- <label>Họ tên:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Message:</label><br>
        <textarea name="message" rows="5" required></textarea><br><br>

        <button type="submit">Send message</button> -->
          </form>
          <div class="social-media-links">
            <a class="social-icon-link" href="#">
              <i class="fa-brands fa-twitter"></i>
            </a>
            <a class="social-icon-link" href="#">
              <i class="fa-brands fa-facebook"></i>
            </a>
            <a class="social-icon-link" href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=new">
              <i class="fa-brands fa-google"></i>
            </a>
            <a class="social-icon-link" href="#">
              <i class="fa-brands  fa-instagram"></i>
            </a>
          </div>
        </div>
        <!-- Map -->
        <div class="map container-fluid" id="map">
          <div class="mapouter">
            <div class="gmap_canvas">
              <iframe class="gmap_iframe"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.9744888529927!2d105.81202077594635!3d21.033213280614794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab25b371cc0d%3A0x7a0e0be0a0c1556c!2zMjg1IMSQ4buZaSBD4bqnbiwgQmEgxJDDrG5oLCBIw6AgTuG7mWksIFZpZXRuYW0!5e0!3m2!1svi!2s!4v1713343540894!5m2!1svi!2s"
                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>
        </div>
        <style>
          .mapouter {
            position: relative;
            width: 100%;
            height: 400px;
          }

          .gmap_canvas {
            overflow: hidden;
            background: none !important;
            width: 100%;
            height: 100%;
          }

          .gmap_iframe {
            width: 100%;
            height: 100%;
            border: 0;
          }
        </style>


      </div>
    </div>
    <!-- Footer -->
    <footer class="foot text-center p-5 text-lg-start text-white" style="background-color: #1c2331">


      <!-- Section: Links  -->
      <section class="">
        <div class=" text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <a class="navbar-brand ps-4" href="#">
                <img width="160px" alt="" style="filter: grayscale(100%); transition: filter 0.3s ease;"
                  onmouseover="this.style.filter='grayscale(0%)'" onmouseout="this.style.filter='grayscale(100%)'">
                <h6 class="text-uppercase fw-bold"><img src="images/resized.png" width="400px" alt=""
                    style="filter: grayscale(100%); transition: filter 0.3s ease;"
                    onmouseover="this.style.filter='grayscale(0%)'" onmouseout="this.style.filter='grayscale(100%)'">
                </h6>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" />
              </a>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

              <!-- Links -->
              <h6 class="text-uppercase fw-bold">Products</h6>
              <hr class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px" />
              <p>
                <a href="#products" class="text-white">Air Conditioners</a>
              </p>
              <p>
                <a href="#products" class="text-white">Geysers</a>
              </p>
              <p>
                <a href="#products" class="text-white">Cfls</a>
              </p>
              <p>
                <a href="#products" class="text-white">Fans</a>
              </p>
            </div>


            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold">Useful links</h6>
              <hr class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px" />
              <p>
                <a href="#Hero" class="text-white">Home</a>
              </p>
              <p>
                <a href="#offers" class="text-white">About</a>
              </p>
              <p>
                <a href="#contact" class="text-white">Shop Location</a>
              </p>
              <p>
                <a href="#contact" class="text-white">Contact</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold">Contact</h6>
              <hr class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px" />
              <p><i class="fas fa-home mr-3"></i>Aptech Limited
                No. 6, 6th Floor, C Wing
                Mittal Towers, M.G. Road
                Bengaluru - 560001
                Karnataka, India</p>

              <p><i class="fas fa-envelope mr-3"></i><a href="mailto:muhammadomer.shazad@hotmail.com">
                  Support@gmail.com</a></p>
              <p><i class="fas fa-print mr-3"></i> <a href="tel:+923267411115"> 120-4505600</a></p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center p-3">
        ©2024 Copyright:
        <a class="text-white" href="#index.html">Snowell Electrics</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->


    <script src="https://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="Javascript/js.js"></script>

</body>

</html>