<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="assets/bootstrap.min.css">
        <script src="assets/angular.min.js"></script>
        <script src="assets/angular-route.min.js"></script>
    </head>
    <body ng-app="myApp">
        <!-- Navbar section Start -->
        <nav class="bg-dark text-white p-3 d-flex align-items-center justify-content-between">
            <div>
                <span class="fs-1">Clocksy</span>
            </div>
            <div>
                <input type="search" class="bg-transparent border border-1 p-2 text-white" style="width: 250px; border-radius: 10px;" name="" id="">
                <input type="button" class="btn btn-outline-light" value="Search">
            </div>
        </nav>

        <section class="bg-secondary position-absolute" style="width: 13rem; height: 100rem;">
            <div class="text-center mt-5">
                <a href="dashboard.php" style="line-height: 50px;" class="d-block text-decoration-none text-white fs-4">
                    <span style="font-size: 25px;">Dashboard</span>
                </a>
                <a href="category.php" style="line-height: 50px;" class="d-block text-decoration-none text-white fs-4">
                    <span style="font-size: 25px;">Category</span>
                </a>
                <a href="products.php" style="line-height: 50px;" class="d-block text-decoration-none text-white fs-4">
                    <span style="font-size: 25px;">Products</span>
                </a>
                <a href="users.php" style="line-height: 50px;" class="d-block text-decoration-none text-white fs-4">
                    <span style="font-size: 25px;">View Users</span>
                </a>
                <a href="profile.php" style="line-height: 50px;" class="d-block text-decoration-none text-white fs-4">
                    <span style="font-size: 25px;">Profile</span>
                </a>
            </div>
        </section>
        <!--<section class="bg-secondary position-absolute" style="width: 13rem; height: 100rem;">
            <div class="text-center mt-5">
                <a href="#!/" style="line-height: 50px;" class="d-block text-decoration-none text-white fs-4">
                    <span style="font-size: 25px;">Dashboard</span>
                </a>
                <a href="#!category" style="line-height: 50px;" class="d-block text-decoration-none text-white fs-4">
                    <span style="font-size: 25px;">Category</span>
                </a>
                <a href="#!products" style="line-height: 50px;" class="d-block text-decoration-none text-white fs-4">
                    <span style="font-size: 25px;">Products</span>
                </a>
                <a href="#!users" style="line-height: 50px;" class="d-block text-decoration-none text-white fs-4">
                    <span style="font-size: 25px;">View Users</span>
                </a>
                <a href="#!profile" style="line-height: 50px;" class="d-block text-decoration-none text-white fs-4">
                    <span style="font-size: 25px;">Profile</span>
                </a>
            </div>
        </section>
        <div ng-view class="container mt-5 w-50"></div>
        <script>
            var app=angular.module("myApp",["ngRoute"]);
            app.config(function($routeProvider){
                $routeProvider
                .when("/",{
                    templateUrl:"dashboard.php"
                })
                .when("/category",{
                    templateUrl:"category.php"
                })
                /*.when("/products",{
                    templateUrl:"products.php"
                })*/
                .when("/users",{
                    templateUrl:"users.php"
                })
                .when("/profile",{
                    templateUrl:"profile.php"
                })
            });
        </script>-->

        <?php include_once('footer.php')?>
    </body>
</html>