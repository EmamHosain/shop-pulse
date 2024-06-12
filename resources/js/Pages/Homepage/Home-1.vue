<template>
    <!-- Jumbotron -->
    <div class="p-3 text-center bg-white border-b">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-y-3">
                <!-- Left elements -->
                <div class="col-span-1 md:col-span-1">
                    <a href="https://mdbootstrap.com/" target="_blank" class="float-left">
                        <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="35" />
                    </a>
                </div>
                <!-- Left elements -->



                <!-- Right elements -->
                <div class="col-span-3 md:col-span-1">
                    <div class="flex float-center">
                        <div class="w-full flex">
                            <input type="search" id="form1" class="form-control w-full" />
                            <!-- <label class="form-label" for="form1">Search</label> -->
                        </div>
                        <button type="button" class="bg-green-500 px-5 py-2 shadow-0">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <!-- Right elements -->
                <div class=" flex justify-end gap-x-2 items-center">
                    <p>+8080 1709285429</p>
                    <select>
                        <option selected value="">BN</option>
                        <option value="">EN</option>
                    </select>
                </div>





            </div>
        </div>
    </div>
    <!-- Jumbotron -->

    <!-- Navbar -->
    <div class="bg-gray-200 py-6 ">
        <div class="container">
            <nav class="flex justify-between">
                <ul class="flex  gap-x-6">
                    <li><a href="">Home</a></li>
                    <li><a href="">Products</a></li>
                    <li><a href="">Category</a></li>
                    <li><a href="">About Us</a></li>

                </ul>
                <!-- Center elements -->
                <div class="">
                    <div class="flex float-right">
                        <a href="https://github.com/mdbootstrap/bootstrap-material-design"
                            class="mr-1 rounded py-1 px-3 flex items-center border" target="_blank">
                            <i class="fas fa-user-alt m-1 mr-md-2"></i>
                            <p class="hidden md:block mb-0">Sign in</p>
                        </a>
                        <a href="https://github.com/mdbootstrap/bootstrap-material-design"
                            class="mr-1 rounded py-1 px-3 flex items-center border" target="_blank">
                            <i class="fas fa-heart m-1 mr-md-2"></i>
                            <p class="hidden md:block mb-0">Wishlist</p>
                        </a>
                        <a href="https://github.com/mdbootstrap/bootstrap-material-design"
                            class="rounded py-1 px-3 flex items-center border" target="_blank">
                            <i class="fas fa-shopping-cart m-1 mr-md-2"></i>
                            <p class="hidden md:block mb-0">My cart</p>
                        </a>
                    </div>
                </div>
                <!-- Center elements -->
            </nav>
        </div>
    </div>

    <!-- Navbar -->

    <!-- intro -->
    <section class="pt-4">
        <div class="">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

                <!-- <main class="col-span-9 bg-green-300">
                    <div class="bg-primary rounded-5 p-5" style="height: 350px">
                        <div class="max-w-lg">
                            <h2 class="text-white">
                                Great products with <br />
                                best deals
                            </h2>
                            <p class="text-white">
                                No matter how far along you are in your sophistication as an amateur
                                astronomer, there is always one.
                            </p>
                            <a href="#" class="btn btn-light shadow-0 text-primary"> View more </a>
                        </div>
                    </div>
                </main> -->
                <div style="height: 350px" class="flex flex-wrap w-full  py-32 px-10 relative  col-span-9">
                    <img alt="gallery" class="w-full object-cover h-full object-center block opacity-25 absolute inset-0"
                        src="https://dummyimage.com/820x340">
                    <div class="text-center relative z-10 w-full">
                        <h2 class="text-2xl text-gray-900 font-medium title-font mb-2">Shooting Stars</h2>
                        <p class="leading-relaxed">Skateboard +1 mustache fixie paleo lumbersexual.</p>
                        <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>





                <div class="col-span-3 ">
                    <div style="height: 350px"
                        class="flex flex-wrap w-full bg-gray-100 sm:py-24 py-16 sm:px-10 px-6 relative ">
                        <img alt="gallery"
                            class="w-full object-cover h-full object-center block opacity-25 absolute inset-0"
                            src="https://dummyimage.com/542x340">
                        <div class="text-center relative z-10 w-full">
                            <h2 class="text-xl text-gray-900 font-medium title-font mb-2">Shooting Stars</h2>
                            <p class="leading-relaxed">Skateboard +1 mustache fixie paleo lumbersexual.</p>
                            <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
    <!-- intro -->








    <!-- category -->
    <section>
        <div class="container mx-auto pt-5">
            <nav class="flex flex-wrap -mx-3">
                <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-0">
                    <div class="flex flex-wrap -mx-1">
                        <div class="w-1/4 px-1">
                            <a href="#" class="flex flex-col items-center text-center">
                                <button type="button"
                                    class="btn btn-outline-secondary p-3 mb-2 mx-auto border border-gray-400 rounded"
                                    data-mdb-ripple-color="dark">
                                    <i class="fas fa-couch text-xl"></i>
                                </button>
                                <div class="text-gray-800">Interior items</div>
                            </a>
                        </div>
                        <div class="w-1/4 px-1">
                            <a href="#" class="flex flex-col items-center text-center">
                                <button type="button"
                                    class="btn btn-outline-secondary p-3 mb-2 mx-auto border border-gray-400 rounded"
                                    data-mdb-ripple-color="dark">
                                    <i class="fas fa-basketball-ball text-xl"></i>
                                </button>
                                <div class="text-gray-800">Sport and travel</div>
                            </a>
                        </div>
                        <div class="w-1/4 px-1">
                            <a href="#" class="flex flex-col items-center text-center">
                                <button type="button"
                                    class="btn btn-outline-secondary p-3 mb-2 mx-auto border border-gray-400 rounded"
                                    data-mdb-ripple-color="dark">
                                    <i class="fas fa-ring text-xl"></i>
                                </button>
                                <div class="text-gray-800">Jewellery</div>
                            </a>
                        </div>
                        <div class="w-1/4 px-1">
                            <a href="#" class="flex flex-col items-center text-center">
                                <button type="button"
                                    class="btn btn-outline-secondary p-3 mb-2 mx-auto border border-gray-400 rounded"
                                    data-mdb-ripple-color="dark">
                                    <i class="fas fa-clock text-xl"></i>
                                </button>
                                <div class="text-gray-800">Accessories</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-0">
                    <div class="flex flex-wrap -mx-1">
                        <div class="w-1/4 px-1">
                            <a href="#" class="flex flex-col items-center text-center">
                                <button type="button"
                                    class="btn btn-outline-secondary p-3 mb-2 mx-auto border border-gray-400 rounded"
                                    data-mdb-ripple-color="dark">
                                    <i class="fas fa-car-side text-xl"></i>
                                </button>
                                <div class="text-gray-800">Automobiles</div>
                            </a>
                        </div>
                        <div class="w-1/4 px-1">
                            <a href="#" class="flex flex-col items-center text-center">
                                <button type="button"
                                    class="btn btn-outline-secondary p-3 mb-2 mx-auto border border-gray-400 rounded"
                                    data-mdb-ripple-color="dark">
                                    <i class="fas fa-home text-xl"></i>
                                </button>
                                <div class="text-gray-800">Home items</div>
                            </a>
                        </div>
                        <div class="w-1/4 px-1">
                            <a href="#" class="flex flex-col items-center text-center">
                                <button type="button"
                                    class="btn btn-outline-secondary p-3 mb-2 mx-auto border border-gray-400 rounded"
                                    data-mdb-ripple-color="dark">
                                    <i class="fas fa-guitar text-xl"></i>
                                </button>
                                <div class="text-gray-800">Musical items</div>
                            </a>
                        </div>
                        <div class="w-1/4 px-1">
                            <a href="#" class="flex flex-col items-center text-center">
                                <button type="button"
                                    class="btn btn-outline-secondary p-3 mb-2 mx-auto border border-gray-400 rounded"
                                    data-mdb-ripple-color="dark">
                                    <i class="fas fa-book text-xl"></i>
                                </button>
                                <div class="text-gray-800">Book, reading</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-0">
                    <div class="flex flex-wrap -mx-1">
                        <div class="w-1/4 px-1">
                            <a href="#" class="flex flex-col items-center text-center">
                                <button type="button"
                                    class="btn btn-outline-secondary p-3 mb-2 mx-auto border border-gray-400 rounded"
                                    data-mdb-ripple-color="dark">
                                    <i class="fas fa-baby-carriage text-xl"></i>
                                </button>
                                <div class="text-gray-800">Kid's toys</div>
                            </a>
                        </div>
                        <div class="w-1/4 px-1">
                            <a href="#" class="flex flex-col items-center text-center">
                                <button type="button"
                                    class="btn btn-outline-secondary p-3 mb-2 mx-auto border border-gray-400 rounded"
                                    data-mdb-ripple-color="dark">
                                    <i class="fas fa-paw text-xl"></i>
                                </button>
                                <div class="text-gray-800">Pet items</div>
                            </a>
                        </div>
                        <div class="w-1/4 px-1">
                            <a href="#" class="flex flex-col items-center text-center">
                                <button type="button"
                                    class="btn btn-outline-secondary p-3 mb-2 mx-auto border border-gray-400 rounded"
                                    data-mdb-ripple-color="dark">
                                    <i class="fas fa-tshirt text-xl"></i>
                                </button>
                                <div class="text-gray-800">Men's clothing</div>
                            </a>
                        </div>
                        <div class="w-1/4 px-1">
                            <a href="#" class="flex flex-col items-center text-center">
                                <button type="button"
                                    class="btn btn-outline-secondary p-3 mb-2 mx-auto border border-gray-400 rounded"
                                    data-mdb-ripple-color="dark">
                                    <i class="fas fa-shoe-prints text-xl"></i>
                                </button>
                                <div class="text-gray-800">Men's clothing</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 px-3">
                    <div class="flex flex-wrap -mx-1">
                        <div class="w-1/4 px-1">
                            <a href="#" class="flex flex-col items-center text-center">
                                <button type="button"
                                    class="btn btn-outline-secondary p-3 mb-2 mx-auto border border-gray-400 rounded"
                                    data-mdb-ripple-color="dark">
                                    <i class="fas fa-mobile text-xl"></i>
                                </button>
                                <div class="text-gray-800">Smartphones</div>
                            </a>
                        </div>
                        <div class="w-1/4 px-1">
                            <a href="#" class="flex flex-col items-center text-center">
                                <button type="button"
                                    class="btn btn-outline-secondary p-3 mb-2 mx-auto border border-gray-400 rounded"
                                    data-mdb-ripple-color="dark">
                                    <i class="fas fa-tools text-xl"></i>
                                </button>
                                <div class="text-gray-800">Tools</div>
                            </a>
                        </div>
                        <div class="w-1/4 px-1">
                            <a href="#" class="flex flex-col items-center text-center">
                                <button type="button"
                                    class="btn btn-outline-secondary p-3 mb-2 mx-auto border border-gray-400 rounded"
                                    data-mdb-ripple-color="dark">
                                    <i class="fas fa-pencil-ruler text-xl"></i>
                                </button>
                                <div class="text-gray-800">Education</div>
                            </a>
                        </div>
                        <div class="w-1/4 px-1">
                            <a href="#" class="flex flex-col items-center text-center">
                                <button type="button"
                                    class="btn btn-outline-secondary p-3 mb-2 mx-auto border border-gray-400 rounded"
                                    data-mdb-ripple-color="dark">
                                    <i class="fas fa-warehouse text-xl"></i>
                                </button>
                                <div class="text-gray-800">Other items</div>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </section>
    <!-- category -->


    <!-- Products -->
    <section>
        <div class="container mx-auto my-12">
            <header class="mb-8">
                <h3 class="text-2xl font-semibold">New products</h3>
            </header>

            <div class="flex flex-wrap -mx-4">
                <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8">
                    <div class="bg-white shadow rounded-md overflow-hidden">
                        <a href="#" class="block relative">
                            <div class="absolute top-0 left-0 m-2 h-12 flex items-start">
                                <span class="bg-red-500 text-white text-xs py-1 px-2 rounded">New</span>
                            </div>
                            <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/1.webp"
                                class="object-cover w-full aspect-square" />
                        </a>
                        <div class="p-4">
                            <a href="#!" class="btn btn-light border px-2 pt-2 float-end icon-hover">
                                <i class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
                            <h5 class="text-lg font-bold">$29.95</h5>
                            <p class="text-sm mb-1">GoPro action camera 4K</p>
                            <p class="text-xs text-gray-500">Model: X-200</p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8">
                    <div class="bg-white shadow rounded-md overflow-hidden">
                        <a href="#" class="block relative">
                            <div class="absolute top-0 left-0 m-2 h-12 flex items-start">
                                <span class="bg-orange-500 text-white text-xs py-1 px-2 rounded">Offer</span>
                            </div>
                            <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/2.webp"
                                class="object-cover w-full aspect-square" />
                        </a>
                        <div class="p-4">
                            <a href="#!" class="btn btn-light border px-2 pt-2 float-end icon-hover">
                                <i class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
                            <h5 class="text-lg font-bold">$590.00</h5>
                            <p class="text-sm mb-1">Canon EOS professional</p>
                            <p class="text-xs text-gray-500">Capacity: 128GB</p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8">
                    <div class="bg-white shadow rounded-md overflow-hidden">
                        <a href="#" class="block">
                            <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/3.webp"
                                class="object-cover w-full aspect-square" />
                        </a>
                        <div class="p-4">
                            <a href="#!" class="btn btn-light border px-2 pt-2 float-end icon-hover">
                                <i class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
                            <h5 class="text-lg font-bold">$29.95</h5>
                            <p class="text-sm mb-1">Modern product name here</p>
                            <p class="text-xs text-gray-500">Sizes: S, M, XL</p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8">
                    <div class="bg-white shadow rounded-md overflow-hidden">
                        <a href="#" class="block">
                            <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/4.webp"
                                class="object-cover w-full aspect-square" />
                        </a>
                        <div class="p-4">
                            <a href="#!" class="btn btn-light border px-2 pt-2 float-end icon-hover">
                                <i class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
                            <h5 class="text-lg font-bold">$1099.00</h5>
                            <p class="text-sm mb-1">Apple iPhone 13 Pro max</p>
                            <p class="text-xs text-gray-500">Color: Black, Memory: 128GB</p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8">
                    <div class="bg-white shadow rounded-md overflow-hidden">
                        <a href="#" class="block">
                            <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/5.webp"
                                class="object-cover w-full aspect-square" />
                        </a>
                        <div class="p-4">
                            <a href="#!" class="btn btn-light border px-2 pt-2 float-end icon-hover">
                                <i class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
                            <h5 class="text-lg font-bold">$29.95</h5>
                            <p class="text-sm mb-1">Modern product name here</p>
                            <p class="text-xs text-gray-500">Sizes: S, M, XL</p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8">
                    <div class="bg-white shadow rounded-md overflow-hidden">
                        <a href="#" class="block">
                            <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/6.webp"
                                class="object-cover w-full aspect-square" />
                        </a>
                        <div class="p-4">
                            <a href="#!" class="btn btn-light border px-2 pt-2 float-end icon-hover">
                                <i class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
                            <h5 class="text-lg font-bold">$29.95</h5>
                            <p class="text-sm mb-1">Modern product name here</p>
                            <p class="text-xs text-gray-500">Model: X-200</p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8">
                    <div class="bg-white shadow rounded-md overflow-hidden">
                        <a href="#" class="block">
                            <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/7.webp"
                                class="object-cover w-full aspect-square" />
                        </a>
                        <div class="p-4">
                            <a href="#!" class="btn btn-light border px-2 pt-2 float-end icon-hover">
                                <i class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
                            <h5 class="text-lg font-bold">$29.95</h5>
                            <p class="text-sm mb-1">Modern product name here</p>
                            <p class="text-xs text-gray-500">Sizes: S, M, XL</p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8">
                    <div class="bg-white shadow rounded-md overflow-hidden">
                        <a href="#" class="block">
                            <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/8.webp"
                                class="object-cover w-full aspect-square" />
                        </a>
                        <div class="p-4">
                            <a href="#!" class="btn btn-light border px-2 pt-2 float-end icon-hover">
                                <i class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
                            <h5 class="text-lg font-bold">$29.95</h5>
                            <p class="text-sm mb-1">Modern product name here</p>
                            <p class="text-xs text-gray-500">Material: Jeans</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Products -->


    <!-- Feature -->
    <section class="">
        <div class="container mx-auto">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full lg:w-1/2 px-4 mb-8">
                    <div class="bg-gray-200 relative h-full overflow-hidden" style="
                        min-height: 200px;
                        background-size: cover;
                        background-position: center;
                        width: 100%;
                        background-repeat: no-repeat;
                        background-image: url('https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/banners/banner-item2.webp');
                    ">
                        <div class="absolute top-1/2 transform -translate-y-1/2 p-6 lg:p-10 max-w-lg">
                            <h3 class="text-gray-800 text-xl lg:text-3xl font-semibold mb-4">Best products & brands in our
                                store at 80% off</h3>
                            <p class="text-gray-700 mb-4">That's true but not always</p>
                            <a class="bg-yellow-500 text-white py-2 px-4 rounded shadow" href="#">Claim offer</a>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 px-4 mb-8">
                    <div class="flex flex-wrap -mx-2 mb-4">
                        <div class="w-full sm:w-1/2 px-2 mb-4">
                            <div class="bg-blue-600 h-full flex flex-col justify-center p-6 text-white"
                                style="min-height: 200px;">
                                <h5 class="text-lg sm:text-xl font-semibold mb-2">Gaming toolset</h5>
                                <p class="text-blue-200 mb-4">Technology for cyber sport</p>
                                <a class="border border-white text-white py-1 px-3 text-sm sm:text-base rounded"
                                    href="#">Learn more</a>
                            </div>
                        </div>
                        <div class="w-full sm:w-1/2 px-2 mb-4">
                            <div class="bg-blue-600 h-full flex flex-col justify-center p-6 text-white"
                                style="min-height: 200px;">
                                <h5 class="text-lg sm:text-xl font-semibold mb-2">Quality sound</h5>
                                <p class="text-blue-200 mb-4">All you need for music</p>
                                <a class="border border-white text-white py-1 px-3 text-sm sm:text-base rounded"
                                    href="#">Learn more</a>
                            </div>
                        </div>
                    </div>
                    <!-- row.// -->

                    <div class="bg-green-600  flex flex-col justify-center p-6 text-white" style="min-height: 200px;">
                        <h5 class="text-lg sm:text-xl font-semibold mb-2">Buy 2 items, With special gift</h5>
                        <p class="text-green-200 max-w-md mb-4">Buy one, get one free marketing strategy helps your business
                            improves the brand by sharing the profits</p>
                        <a class="border border-white text-white py-1 px-3 text-sm sm:text-base rounded" href="#">Learn
                            more</a>
                    </div>
                </div>
                <!-- col.// -->
            </div>
            <!-- row.// -->
        </div>
        <!-- container end.// -->
    </section>
    <!-- Feature -->




    <!-- Footer -->
    <footer class="bg-orange-500 text-center text-lg-start text-white py-4">
        <!-- Section: Links  -->
        <section class="container mx-auto p-4">
            <!-- Grid row -->
            <div class="flex flex-wrap justify-center lg:justify-between">
                <!-- Grid column -->
                <div class="w-full lg:w-1/4 px-4 mb-4">
                    <!-- Content -->
                    <a href="https://mdbootstrap.com/" target="_blank" class="text-white h2">
                        MDB
                    </a>
                    <p class="mt-1">© 2023 Copyright: MDBootstrap.com</p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="w-full sm:w-1/2 lg:w-1/4 px-4 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-2">Store</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a class="text-white-50" href="#">About us</a></li>
                        <li><a class="text-white-50" href="#">Find store</a></li>
                        <li><a class="text-white-50" href="#">Categories</a></li>
                        <li><a class="text-white-50" href="#">Blogs</a></li>
                    </ul>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="w-full sm:w-1/2 lg:w-1/4 px-4 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-2">Information</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a class="text-white-50" href="#">Help center</a></li>
                        <li><a class="text-white-50" href="#">Money refund</a></li>
                        <li><a class="text-white-50" href="#">Shipping info</a></li>
                        <li><a class="text-white-50" href="#">Refunds</a></li>
                    </ul>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="w-full sm:w-1/2 lg:w-1/4 px-4 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-2">Support</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a class="text-white-50" href="#">Help center</a></li>
                        <li><a class="text-white-50" href="#">Documents</a></li>
                        <li><a class="text-white-50" href="#">Account restore</a></li>
                        <li><a class="text-white-50" href="#">My orders</a></li>
                    </ul>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->

            <div class="mt-4 lg:flex lg:justify-between lg:items-center">
                <!-- Newsletter -->
                <div class="w-full lg:w-1/4 px-4 mb-4">
                    <h6 class="text-uppercase fw-bold mb-2">Newsletter</h6>
                    <p>Stay in touch with latest updates about our products and offers</p>
                    <div class="flex flex-col sm:flex-row gap-2">
                        <input type="email" class="w-full sm:w-auto border py-1 px-2" placeholder="Email"
                            aria-label="Email" />
                        <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded"
                            type="button">Join</button>
                    </div>
                </div>

                <!-- Payment Icons -->
                <div class="w-full lg:w-1/4 px-4">
                    <div class="flex justify-center lg:justify-end gap-2">
                        <i class="fab fa-cc-visa"></i>
                        <i class="fab fa-cc-amex"></i>
                        <i class="fab fa-cc-mastercard"></i>
                        <i class="fab fa-cc-paypal"></i>
                    </div>
                </div>

                <!-- Language Selector -->
                <div class="w-full lg:w-1/4 px-4">
                    <div class="flex justify-center lg:justify-end gap-2">
                        <div class="dropdown dropup">
                            <a class="dropdown-toggle text-white" href="#" role="button" id="Dropdown"
                                data-mdb-toggle="dropdown" aria-expanded="false">
                                <i class="flag-united-kingdom"></i> English
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="Dropdown">
                                <li><a class="dropdown-item" href="#"><i class="flag-united-kingdom"></i> English</a></li>
                                <li><a class="dropdown-item" href="#"><i class="flag-poland"></i> Polski</a></li>
                                <li><a class="dropdown-item" href="#"><i class="flag-china"></i> 中文</a></li>
                                <li><a class="dropdown-item" href="#"><i class="flag-japan"></i> 日本語</a></li>
                                <li><a class="dropdown-item" href="#"><i class="flag-germany"></i> Deutsch</a></li>
                                <li><a class="dropdown-item" href="#"><i class="flag-france"></i> Français</a></li>
                                <li><a class="dropdown-item" href="#"><i class="flag-spain"></i> Español</a></li>
                                <li><a class="dropdown-item" href="#"><i class="flag-russia"></i> Русский</a></li>
                                <li><a class="dropdown-item" href="#"><i class="flag-portugal"></i> Português</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: Links  -->
    </footer>
    <!-- Footer -->
</template>
