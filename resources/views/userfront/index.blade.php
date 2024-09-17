<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.style')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Market</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">


</head>

<body>
    @include('userfront.header')
    @if (session('message'))
        <div class="alert alert-success flash-message border-0 text-light" style="background: #6AB716" role="alert">
            {{ session('message') }}
        </div>
    @elseif (session('loginfailedmessage'))
        <div class="alert alert-success flash-message border-0 text-light" style="background: #ee0909" role="alert">
            {{ session('loginfailedmessage') }}
        </div>
    @elseif (session('formerrors'))
        <div class="alert alert-success flash-message border-0 text-light" style="background: #ee0909" role="alert">
            @if (Session::has('formerrors'))
                <ul>
                    @foreach (Session::get('formerrors') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif
    {{-- MAIN INDEX START --}}

    {{-- top header start  --}}
    {{-- <div id="carouselExampleCaptions" class="carousel slide">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ url('public/assets/images/slider2.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption  ">
                    <div class="d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta inventore facilis expedita
                            animi ex similique dolorum magnam hic dignissimos fugit at, deserunt ipsa nihil consectetur
                            dolore sapiente doloremque, consequatur possimus odit repudiandae voluptates recusandae esse
                            velit accusamus. Eveniet vel rem inventore doloremque. Iure maxime quo quis saepe doloribus,
                            odio odit voluptatem perferendis nemo, consequatur impedit debitis quisquam reiciendis
                            accusantium ullam laborum dicta magnam amet recusandae sit voluptatum rem! Exercitationem
                            excepturi ratione omnis iusto dolores accusamus, unde sunt officia tempore in tempora dolor
                            veritatis sed aperiam, beatae minima obcaecati qui nulla quibusdam voluptates magni.
                            Perspiciatis dolor minima unde ex enim repellat.</p>
                    </div>

                    <a href="{{ url('/shop') }}"><button class="btn btn-primary">Shop Now</button></a>
                </div>
            </div>


        </div>


    </div> --}}

    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ url('public/assets/images/image (5).png') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        
        <p>Transform your shopping experience with exceptional savings on a wide range of high-quality items</p>
        <div class="d-flex justify-content-center">
  
              <a href="shop"><button class="btn carousel-caption-btn btn-sm btn-primary view-more-button">Find Your Needs</button></a>
          </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ url('public/assets/images/image (7).png') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        
        <p>Browse our selection to upgrade your living space with the latest trends and timeless classics</p>
        <div class="d-flex justify-content-center">
  
              <a href="shop"><button class="btn carousel-caption-btn btn-sm btn-primary view-more-button">Find Your Needs</button></a>
          </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ url('public/assets/images/Untitleddd-1.png') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        
        <p>Discover incredible deals on best-selling items and enhance your shopping with our exclusive selections</p>
        <div class="d-flex justify-content-center">
  
              <a href="shop"><button class="btn carousel-caption-btn btn-sm btn-primary view-more-button">Find Your Needs</button></a>
          </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ url('public/assets/images/person-.jpg.png') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
       
        <p>Find everything you need and more with our comprehensive online store and exceptional customer service</p>
        <div class="d-flex justify-content-center">
  
              <a href="shop"><button class="btn carousel-caption-btn btn-sm btn-primary view-more-button">Find Your Needs</button></a>
          </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ url('public/assets/images/ecommerce-3562005.jpg.png') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
       
        <p>Find high-quality products at unbeatable prices and enjoy a hassle-free shopping experience from the comfort of your home</p>
        <div class="d-flex justify-content-center">
  
              <a href="shop"><button class="btn carousel-caption-btn btn-sm btn-primary view-more-button">Find Your Needs</button></a>
          </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
{{-- top header end  --}}
    {{-- Featured Product start  --}}
    <div class="all-front-containers container-fluid p-4 m-4 productcontainer">
        <h1 class="text-center">Featured Products</h1>
        <p class="text-center mb-4">Welcome to our Featured Products section, where we showcase the best of our collection! Here, you'll find a carefully curated selection of and highly-rated items that our customers love. Each product is chosen for its exceptional quality, unique design, and outstanding value. Whether you're looking for the latest trends or timeless classics, our featured products highlight a diverse range of options to suit every taste and need. Don't miss out on these popular picks, as they're perfect for treating yourself or finding the perfect gift. Explore our collection and discover why these products are our top favorites!</p>

        <div class="row mx-3">
            @foreach ($products as $item)
                <div class="col-md-3 ">
                    <div class="card home-product-card" style="">
                        <img src="{{ url('public/uploadedimages/product/' . $item->image) }}" class="card-img-top"
                            height="200px;">
                        <div class="card-body">
                            <h5 class="card-title lh-1">{{ $item->name }}</h5>
                            <p class="card-text fs-6 lh-1">{{ $item->description }}</p>
                            <p class="card-text lh-1">Price:{{ $item->price }}</p>
                            <a href="{{ 'productdetails/' . $item->id }}" class="btn btn-primary">View Product</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="d-flex justify-content-center">

            <a href="shop"><button class="btn btn-primary view-more-button">View All Products</button></a>
        </div>
    </div>
    {{-- Featured Product End --}}
    {{-- Hot Product start  --}}
    <div class="all-front-containers container-fluid p-4 m-4 productcontainer">
        <h1 class="text-center">Hot Selling Products</h1>
        <p class="text-center mb-4">Discover our Hot Selling Products, the must-have items that are flying off the shelves! This section features our most popular products, loved by customers for their quality, style, and value. From the latest tech gadgets to trendy fashion pieces, these products have earned their spot as customer favorites. Each item is a top choice for its unique appeal and outstanding performance, making them perfect additions to your collection. Whether you're looking for something practical or a little indulgent, our hot selling products are sure to impress. Shop now and find out why these items are in such high demand!</p>

        <div class="row mx-3">
            @foreach ($hotproducts as $item)
                <div class="col-md-3 ">
                    <div class="card home-product-card" style="">
                        <img src="{{ url('public/uploadedimages/product/' . $item->image) }}" class="card-img-top"
                            height="200px;">
                        <div class="card-body">
                            <h5 class="card-title lh-1">{{ $item->name }}</h5>
                            <p class="card-text fs-6 lh-1">{{ $item->description }}</p>
                            <p class="card-text lh-1">Price:{{ $item->price }}</p>
                            <a href="{{ 'productdetails/' . $item->id }}" class="btn btn-primary">View Product</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="d-flex justify-content-center">

            <a href="shop"><button class="btn btn-primary view-more-button">View All Products</button></a>
        </div>
    </div>
    {{-- HOt Product End --}}



<div class="featurecontainer container my-3 ">
    <h3 class="text-center m-4 p-4">Why Want to buy from us</h3>
    <div class="row m-4 p-4">
        <div class="col-md-6 container-fluid">
            <img class="imgfront img-fluid" src="{{ url('public/assets/images/bestseller.png') }}" alt="" >
        </div>
        <div class="col-md-6">
            <h4>Best Sellers</h4>
            <p>We proudly showcase our best sellers to demonstrate why our products stand out. Our best sellers are carefully selected based on their popularity and customer satisfaction. These products have earned their top spots through a combination of superior quality, reliability, and outstanding performance.

We believe our best sellers highlight the core of what makes our store special. They reflect the tastes and preferences of our customers, showing that we offer products that people love and trust. Each item in this category has been chosen for its exceptional value and positive feedback from our loyal customers.

By focusing on our best sellers, we aim to provide you with a curated selection of items that are proven favorites. We’re dedicated to bringing you products that not only meet but exceed your expectations. Choosing us means you’re opting for products that others have enjoyed and recommended, ensuring a satisfying shopping experience.</p>
        </div>
    </div>
    <div class="row m-4 p-4">

        <div class="col-md-6">
            <h4>Best Quailty Products</h4>
            <p>We proudly highlight the exceptional standards of the products we offer. We are committed to providing items that stand out for their durability, craftsmanship, and overall quality. Our selection process is rigorous, ensuring that only the finest products make it to our store.

We source our products from trusted manufacturers and brands known for their excellence. Each item undergoes thorough testing and quality checks to ensure it meets our high standards. From the materials used to the final finishing touches, we focus on every detail to deliver products that you can rely on.

Our dedication to quality means you can shop with confidence, knowing that each product is designed to perform well and last long. We believe that investing in top-quality items enhances your experience and satisfaction. Explore our range of best quality products and see for yourself why our customers trust us for their needs.</p>
        </div>
        <div class="col-md-6">
            <img class="imgfront"  src="{{ url('public/assets/images/bestqulity.png') }}" alt="">
        </div>
    </div>
    <div class="row m-4 p-4">
        <div class="col-md-6">
            <img class="imgfront"  src="{{ url('public/assets/images/cashondelivery.png') }}" alt="">
        </div>
        <div class="col-md-6">
            <h4>Cash on Delivery</h4>
            <p>Our Cash on Delivery (COD) service is a key feature that makes shopping with us convenient and secure. We understand that trust is important when making online purchases, which is why we offer COD as a payment option. With COD, you can pay for your order only when it arrives at your doorstep.

This service allows you to inspect your package before making any payment, giving you peace of mind that you’re getting exactly what you ordered. It’s an ideal choice for those who prefer not to use online payment methods or want to see their products in person before paying.

Our COD service is easy to use—just select the option at checkout, and our delivery team will handle the rest. We strive to provide a smooth and reliable delivery experience, ensuring that your order reaches you safely and on time. Choosing COD means you can enjoy a hassle-free shopping experience with added security and confidence.</p>
        </div>
    </div>
    <div class="row m-4 p-4">

        <div class="col-md-6 mt-4">
            <h4>Easy Return Policy</h4>
            <p>We highlight our Easy Return Policy to ensure a worry-free shopping experience. We understand that sometimes things don’t go as planned, which is why we offer a straightforward 7-day return window for all our products.

If you’re not completely satisfied with your purchase or if it doesn’t meet your expectations, you can return it within 7 days of delivery. Our return process is simple and hassle-free. Just contact our customer service team, and we’ll guide you through the steps to return your item.

We believe that a flexible return policy is essential for customer satisfaction, and we want you to shop with confidence knowing that you have the option to return products if needed. Our goal is to make your shopping experience as enjoyable as possible, and our Easy Return Policy is just one of the ways we show our commitment to customer care. Enjoy peace of mind with every purchase, knowing that we’re here to support you.</p>
        </div>
        <div class="col-md-6">
            <img class="imgfront"  src="{{ url('public/assets/images/returnpolicy.png') }}" alt="">
        </div>
    </div>
</div>
    {{-- MAIN INDEX END --}}

    {{-- modals here --}}
    @include('userfront.modals.becomeaseller')
    @include('userfront.footer')



    <script>
        var myCarousel = document.querySelector('#carouselExampleCaptions');
var carousel = new bootstrap.Carousel(myCarousel, {
  interval: 5000,
  ride: 'carousel'
});
    </script>
</body>
@include('inc.scripts')

</html>
