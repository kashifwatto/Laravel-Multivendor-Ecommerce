<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.style')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Market</title>

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
    <!-- <div id="carouselExampleCaptions" class="carousel slide">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ url('public/assets/images/slider2.jpg') }}" class="d-block w-100" alt="...">
                

                    <a href="{{ url('/shop') }}"><button class="btn btn-primary">Shop Now</button></a>
                </div>
            </div>


        </div>


    </div> -->
   
      <div class="carousel-caption2">
        <div>
            <p>Welcome to MarketSphere, your ultimate destination for a diverse range of products from various sellers. With our multivendor eCommerce platform and unique auction system, we offer a seamless shopping experience with exceptional savings. Discover quality items and upgrade your living space with the latest trends and timeless classics, all while enjoying top-notch customer service.</p>
        </div>
        <div class="">
            <a href="shop"><button class="btn btn-lg btn-primary">Shop Now</button></a>
        </div>
  
          
      </div>
    
    {{-- top header end  --}}


    <div class="featurecontainer container my-3 ">
    <div class="row m-4 p-4">
        <div class="col-md-6">
            <img class="imgfront" src="{{ url('public/assets/images/bestseller.png') }}" alt="" >
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

        <div class="col-md-6">
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
</body>
@include('inc.scripts')

</html>
