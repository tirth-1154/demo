<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Theme Styles -->
<style>
  :root {
    --theme-color: #4caf50;    /* 🍏 Grocery Green */
    --theme-dark: #388e3c;     /* Darker Green hover */
    --theme-light: #f1f8e9;    /* Very light green */
    --primary-color: #1a2a3a;  /* Heading color */
    --secondary-color: #ffffff; /* Page BG */
    --text-color: #455a64;
    --accent-color: #8bc34a;
    --accent-secondary-color: #e8f5e9;
    --divider-color: #eceff1;
    --dark-divider-color: #cfd8dc;
    --error-color: #e53935;
    --default-font: 'Jost', sans-serif;
    --accent-font: 'Forum', serif;
  }
.text-theme {
  color: var(--theme-color) !important;
}

.btn-theme {
  background: var(--theme-color);
  color: #fff !important;
  transition: 0.3s ease;
  border: none;
  border-radius: 30px;
}

.btn-theme:hover {
  background: var(--theme-dark);
  color: #fff !important;
}
/* nav bar  */
  .navbar .nav-link:hover {
    color: var(--theme-color) !important;
  }

  .navbar .nav-link:hover::after {
    width: 100%;
  }

  .btn-warning:hover {
    background-color: #FFC107;
    transform: translateY(-3px);
    transition: all 0.2s;
  }

  .sticky-top {
    transition: all 0.3s;
  }

  .sticky-top.scrolled {
    padding: 0.5rem 0;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
  }

  a { text-decoration: none; transition: 0.3s; }
  a:hover { opacity: 0.8; }

  .text-theme { color: var(--theme-color) !important; }
  .bg-theme { background: var(--theme-color) !important; color: #fff !important; }

  .btn-theme {
    background: var(--theme-color);
    color: #fff !important;
    border: none;
    border-radius: 30px;
    padding: 0.6rem 1.4rem;
    transition: 0.3s;
  }
  .btn-theme:hover { background: var(--theme-dark); }

  .card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    transition: 0.3s;
  }
  .card:hover { transform: translateY(-5px); }

  footer {
    background: var(--theme-color);
    color: #fff;
    padding: 3rem 1rem;
    margin-top: 3rem;
  }
  footer h5 { font-weight: 600; margin-bottom: 1rem; }
  footer a { color: #fff; }
  footer .copy { margin-top: 1.5rem; font-size: 0.9rem; opacity: 0.8; }

  /* new home  */

  /* user home css  */

  /* user home css end */
/* ====== Global Styles ====== */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body{
	font-family: var(--default-font);
	font-size: 18px;
	font-weight: 400;
	line-height: 1em;
	background-color: var(--secondary-color);
	color: var(--text-color);
}
::-webkit-scrollbar-track{
	background-color: var(--primary-color);
	border-left: 1px solid var(--primary-color);
}
::-webkit-scrollbar{
	width: 7px;
	background-color: var(--primary-color);
}
::-webkit-scrollbar-thumb{
	background: var(--accent-color);
}

::selection{
	color: var(--secondary-color);
	background-color: var(--primary-color);
	filter: invert(1);
}
p{
	line-height: 1.6em;
	margin-bottom: 1.4em;
}

h1,
h2,
h3,
h4,
h5,
h6{
	margin : 0;
	font-weight: 600;
	line-height: 1.2em;
	color: var(--primary-color);
}
figure{
	margin: 0;
}

img{
	max-width: 100%;
}

a{
	text-decoration: none;
}

a:hover{
	text-decoration: none;
	outline: 0;
}

a:focus{
	text-decoration: none;
	outline: 0;
}

html,
body{
	width: 100%;
	overflow-x: clip;
}

.container{
	max-width: 1300px;
}

.container,
.container-fluid,
.container-lg,
.container-md,
.container-sm,
.container-xl,
.container-xxl{
    padding-right: 15px;
    padding-left: 15px;
}

.image-anime{
	position: relative;
	overflow: hidden;
}

.image-anime:after{
	content: "";
	position: absolute;
    width: 200%;
    height: 0%;
    left: 50%;
    top: 50%;
    background-color: rgba(255,255,255,.3);
    transform: translate(-50%,-50%) rotate(-45deg);
    z-index: 1;
}

.image-anime:hover:after{
    height: 250%;
    transition: all 600ms linear;
    background-color: transparent;
}

.reveal{
	position: relative;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    visibility: hidden;
    overflow: hidden;
}

.reveal img{
    height: 100%;
    width: 100%;
    -o-object-fit: cover;
    object-fit: cover;
    -webkit-transform-origin: left;
    transform-origin: left;
}

.row{
    margin-right: -15px;
    margin-left: -15px;
}

.row > *{
	padding-right: 15px;
	padding-left: 15px;
}

.row.no-gutters{
    margin-right: 0px;
    margin-left: 0px;
}

.row.no-gutters > *{
    padding-right: 0px;
    padding-left: 0px;
}

.btn-default{
	position: relative;
	display: inline-block;
	font-size: 16px;
	font-weight: 500;
	line-height: 1em;
	text-transform: capitalize;
	background: linear-gradient(90deg, var(--accent-color) 0%, var(--accent-secondary-color) 50%, var(--accent-color) 100%);
	background-size: 200% auto;
	color: var(--secondary-color);
	border: none;
	border-radius: 100px;
	padding: 17px 30px;
	overflow: hidden;
	transition: all 0.4s ease-in-out;
	z-index: 1;
}

.btn-default:hover{
	background-position: right center;
}

.btn-default.btn-highlighted{
	background: transparent;
	border: 1px solid var(--accent-color);
	color: var(--accent-color);
	padding: 16px 30px;
}

.btn-default.btn-highlighted:hover{
	color: var(--secondary-color);
}

.btn-default.btn-highlighted:before{
	content: "";
	position: absolute;
	top: 0;
	bottom: 0;
  	left: 50%;
  	right: 50%;
  	opacity: 0;
	background: linear-gradient(90deg, var(--accent-color) 0%, var(--accent-secondary-color) 100%);
	border-radius: 100px;
	transition: all 0.4s ease-in-out;
	z-index: -1;
}
  
.btn-default.btn-highlighted:hover:before{
	left: -5px;
  	right: -5px;
	opacity: 1;
}

.readmore-btn{
	position: relative;
	font-size: 16px;
	font-weight: 500;
	line-height: 1.4em;
	color: var(--accent-color);
	text-transform: capitalize;
	display: inline-block;
	padding-right: 30px;
	transition: all 0.4s ease-in-out;
}

.readmore-btn::before{
	content: '\f178';
    position: absolute;
	right: 0;
    top: 50%;
	font-family: 'Font Awesome 6 Free';
    font-size: 16px;
    line-height: normal;
    font-weight: 600;
	color: var(--accent-color);
	background-position: center center;
	border-radius: 50%;
	transform: translate(-3px, -50%);
	transition: all 0.4s ease-in-out;
}

.readmore-btn:hover{
	color: var(--primary-color);
}

.readmore-btn:hover::before{
	color: var(--primary-color);
	transform: translate(0, -50%);
}

.cb-cursor:before{
	background: linear-gradient(90deg, var(--accent-color) 0%, var(--accent-secondary-color) 100%);
}
.light-bg-section{
	position: relative;
}

.light-bg-section::after{
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	bottom: 0;
	right: 0;
	background: #fdfdfd;
	z-index: 0;
}

.light-bg-section .container{
	position: relative;
	z-index: 1;
}

.section-row{
	margin-bottom: 80px;
}

.section-row .section-title{
	margin-bottom: 0;
}

.section-row .section-title{
	width: 100%;
	max-width: 650px;
	margin: 0 auto;
	text-align: center;
}

.section-btn{
	text-align: end;
}

.section-title-content p{
	margin: 0;
}

.section-title{
	margin-bottom: 40px;
}

.section-title h3{
	position: relative;
	display: inline-block;
	font-size: 16px;
    font-weight: 500;
	line-height: 1.6em;
    text-transform: capitalize;
    color: var(--primary-color);
	padding-left: 30px;
    margin-bottom: 10px;
}

.section-title h3::before{
	content: '';
    position: absolute;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    background-color: var(--theme-color);
    border-radius: 4px;
    width: 15px;
    height: 4px;
}

.section-title h1{
	font-family: var(--accent-font);
	font-size: 70px;
	text-transform: uppercase;
	font-weight: 400;
	line-height: 1.1em;
	margin-bottom: 0;
	cursor: none;
}

.section-title h2{
	font-family: var(--accent-font);
	font-size: 44px;
	text-transform: uppercase;
	font-weight: 400;
	margin-bottom: 0;
	cursor: none;
}

.section-title p{
	margin-top: 20px;
	margin-bottom: 0;
}

/***        04. Hero css	      ***/
.hero{
	position: relative;
	background: url('images/image/hero-bg.jpg') no-repeat;
	background-position: center center;
	background-size: auto;
	padding: 210px 0;
}

.hero::before{
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	bottom: 0;
	right: 0;
	background: var(--secondary-color);
	opacity: 80%;
	z-index: 1;
}

.hero.hero-video .hero-bg-video{
	position: absolute;
	top: 0;
	right: 0;
	left: 0;
	bottom: 0;
	width: 100%;
	height: 100%;
}

.hero.hero-video .hero-bg-video video{
	width: 100%;
	height: 100%;
	object-fit: cover;
}

.hero.hero-slider-layout{
	background: none;
	padding: 0;
}

.hero.hero-slider-layout .hero-slide{
	position: relative;
	background: url('images/image/hero-bg.jpg');
	background-repeat: no-repeat;
	background-position: center center;
	background-size: cover;
    padding: 210px 0;
}

.hero.hero-slider-layout .hero-slide.slide-2{
	background: url('images/image/hero-bg-2.jpg');
	background-repeat: no-repeat;
	background-position: center center;
	background-size: cover;
}

.hero.hero-slider-layout .hero-slide::before{
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	bottom: 0;
	right: 0;
	background: var(--secondary-color);
	opacity: 80%;
	z-index: 1;
}

.hero.hero-slider-layout .hero-slide .hero-slider-image{
	position: absolute;
	top: 0;
	right: 0;
	left: 0;
	bottom: 0;
}

.hero.hero-slider-layout .hero-slide .hero-slider-image img{
	width: 100%;
	height: 100%;
	object-fit: cover;
}

.hero.hero-slider-layout .hero-pagination{
	position: absolute;
    bottom: 50px;
	padding-left: calc(((100vw - 1300px) / 2) + 15px);
	z-index: 2;
}

.hero.hero-slider-layout .hero-pagination .swiper-pagination-bullet{
    width: 12px;
    height: 12px;
    background: var(--divider-color);
    opacity: 1;
    transition: all 0.3s ease-in-out;
    margin: 0 5px;
}

.hero.hero-slider-layout .hero-pagination .swiper-pagination-bullet-active{
    background: var(--accent-color);
}

.hero-content{
	position: relative;
	z-index: 2;
}

.hero-btn{
	display: flex;
	flex-wrap: wrap;
	gap: 30px;
}

/**** Scrolling Ticker  ****/
.our-scrolling-ticker{
	background: linear-gradient(90deg, var(--accent-color) 0%, var(--accent-secondary-color) 100%);
	padding: 25px 0;
}

.scrolling-ticker-box{
	--gap: 30px;
	position: relative;
	display: flex;
	overflow: hidden;
	user-select: none;
	gap: var(--gap);
	align-items: center;
}

.scrolling-content{
	flex-shrink: 0;
	display: flex;
	gap: var(--gap);
	min-width: 100%;
	animation: scroll 50s linear infinite;
}

.scrolling-content span{
	font-family: var(--accent-font);
	display: inline-flex;
	align-items: center;
	font-size: 44px;
	line-height: 1.2em;
	text-transform: uppercase;
	color: var(--secondary-color);
	vertical-align: middle;
}

.scrolling-content span img{
	width: 100%;
	max-width: 30px;
	margin-right: 30px;
}

@keyframes scroll{
	from{
		transform: translateX(0);
	}

	to{
		transform: translateX(calc(-100% - var(--gap)));
	}
}
/***    30. Book Table Page css   ***/
/************************************/

.page-book-table{
	padding: 100px 0;
}

.book-table-image{
	margin-right: 95px;
}

.book-table-image figure{
	display: block;
	border-radius: 400px 400px 0 0;
}

.book-table-image img{
	width: 100%;
	aspect-ratio: 1 / 1.34;
	object-fit: cover;
	border-radius: 400px 400px 0 0;
}

.book-table-content .section-title p b{
	font-weight: 700;
}

.book-table-content .section-title p a{
	color: var(--accent-color);
	transition: all 0.4s ease-in-out;
}

.book-table-content .section-title p a:hover{
	color: var(--primary-color);
}

.contact-us-form .form-control.form-select{
	background-position: right 10px top 8px;
}

.contact-us-form .form-control.form-select option{
	background: var(--primary-color);
	color: var(--secondary-color);
	
}

/***       06. About Us css	      ***/
/************************************/

.about-us{
	background: url('images/image/about-bg-image.png') no-repeat;
	background-position: top center;
	background-size: 100% auto;
	padding: 100px 0;
}

.about-us-content{
	margin-right: 50px;
}

.about-body-item{
	display: flex;
	flex-wrap: wrap;
	margin-bottom: 30px;
}

.about-body-item:last-child{
	margin-bottom: 0;
}

.about-body-item .icon-box{
	position: relative;
	width: 60px;
	height: 60px;
	background: var(--dark-divider-color);
	border-radius: 50%;
	display: flex;
	align-items: center;
	justify-content: center;
	margin-right: 30px;
}

.about-body-item .icon-box::before{
    content: '';
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    background: linear-gradient(90deg, var(--accent-color) 0%, var(--accent-secondary-color) 100%);
    border-radius: 50%;
    width: 100%;
    height: 100%;
    transform: scale(0);
    transition: all 0.4s ease-in-out;
    z-index: 0;
}

.about-body-item:hover .icon-box::before{
	transform: scale(1);
}

.about-body-item .icon-box img{
	position: relative;
	width: 100%;
	max-width: 30px;
	transition: all 0.3s ease-in-out;
	z-index: 1;
}

.about-body-item:hover .icon-box img{
	filter: brightness(0) invert(0);
}

.about-body-list-content{
	width: calc(100% - 90px);
}

.about-body-list-content h3{
	font-size: 22px;
	text-transform: capitalize;
	margin-bottom: 10px;
}

.about-body-list-content p{
	margin-bottom: 0;
}

.about-us-footer{
	display: flex;
	flex-wrap: wrap;
	align-items: center;
	gap: 40px;
	margin-top: 60px;
}

.about-us-image{
	position: relative;
	padding-left: 70px;
}

.about-us-img figure{
	border-radius: 400px 400px 0 0;
	display: block;
}

.about-us-img img{
	width: 100%;
	aspect-ratio: 1 / 1.237;
	object-fit: cover;
	border-radius: 400px 400px 0 0;
}

.opening-time-box{
	position: absolute;
	bottom: 50px;
	left: 0;
	width: 100%;
	max-width: 320px;
	background: linear-gradient(90deg, var(--accent-color) 0%, var(--accent-secondary-color) 50%, var(--accent-color) 100%);
	background-size: 200% auto;
	border-radius: 26px;
	padding: 30px;
	transition: all 0.4s ease-in-out;
	z-index: 1;
}

.opening-time-box:hover{
	background-position: right center;
}

.opening-time-box .icon-box{
	width: 50px;
	height: 50px;
	display: flex;
	justify-content: center;
	align-items: center;
	background: var(--secondary-color);
	border-radius: 50%;
	margin-bottom: 15px;
}

.opening-time-box .icon-box i{
	font-size: 24px;
	color: var(--primary-color);
}

.opening-time-content h3{
	font-size: 22px;
	text-transform: capitalize;
	color: var(--secondary-color);
	margin-bottom: 20px;
}

.opening-time-content ul{
	margin: 0;
	padding: 0;
	list-style: none;
}

.opening-time-content ul li{
	color: var(--secondary-color);
	display: flex;
	justify-content: space-between;
	margin-bottom: 15px;
}

.opening-time-content ul li:last-child{
	margin-bottom: 0;
}

.opening-time-content ul li span{
	width: 45%;
}

/*** Pricing Css ***/
.our-pricing{
	background: url('images/image/pricing-bg-image.png') no-repeat;
	background-position: center center;
	background-size: 100% auto;
	padding: 100px 0;
}

.our-support-nav{
	margin-bottom: 80px;
}

.our-pricing-box .nav-tabs{
	padding: 0;
	margin: 0;
	list-style: none;
	display: flex;
	justify-content: center;
	gap: 30px;
	background: var(--secondary-color);
	border: none;
}

.our-pricing-box ul li button{
	border: none;
}

.our-pricing-box .nav-tabs .nav-item .btn-default.btn-highlighted.active{
	color: var(--secondary-color);
}

.our-pricing-box .nav-tabs .nav-item .btn-default.btn-highlighted.active:before,
.our-pricing-box .nav-tabs .nav-item .btn-default.btn-highlighted:focus:before{
	left: -5px;
    right: -5px;
    opacity: 1;
}

.pricing-image{
	margin-right: 95px;
}

.pricing-image figure{
	display: block;
	border-radius: 400px 400px 0 0;
}

.pricing-image img{
	width: 100%;
	aspect-ratio: 1 / 1.296;
	object-fit: cover;
	border-radius: 400px 400px 0 0;
}

.menu-list-item{
	display: flex;
	flex-wrap: wrap;
	align-items: center;
	border-bottom: 1px dashed var(--divider-color);
	margin-bottom: 30px;
	padding-bottom: 30px;
}

.menu-list-item:last-child{
	margin-bottom: 0;
	padding-bottom: 0;
	border-bottom: none;
}

.menu-list-image{
	margin-right: 30px;
}

.menu-list-image figure{
	display: block;
	max-width: 100px;
	border-radius: 50%;
}

.menu-list-image img{
	width: 100%;
	border-radius: 50%;
	aspect-ratio: 1 / 1;
	object-fit: cover;
}

.menu-item-body{
	width: calc(100% - 130px);
}

.menu-item-title{
	width: 100%;
	display: flex;
	align-items: center;
	justify-content: space-between;
	gap: 15px;
	margin-bottom: 10px;
}

.menu-item-title h3{
	font-family: var(--accent-font);
	width: 100%;
	font-size: 22px;
	max-width: fit-content;
	text-transform: uppercase;
}

.menu-item-title hr{
	height: 1px;
	width: 40%;
	color: var(--dark-divider-color);
	border-style: dashed;
	margin: 0;
	opacity: 1;
}

.menu-item-title span{
	font-weight: 700;
	font-size: 16px;
	color: var(--accent-color);
}

.menu-item-content p{
	margin: 0;
}

.section-footer-text{
	margin-top: 80px;
	text-align: center;
}

.section-footer-text p{
	text-transform: capitalize;
	margin-bottom: 0;
}

.section-footer-text p a{
	font-weight: 600;
	text-decoration: underline;
	text-underline-offset: 4px;
	color: var(--accent-color);
	transition: all 0.4s ease-in-out;
}

.section-footer-text p a:hover{
	color: var(--primary-color);
}

/*** Pricing Css ***/

/***      11. Our Offers css      ***/
/************************************/

.our-offers{
	background: url('images/image/offer-bg-image.png') no-repeat;
	background-position: center center;
	background-size: 100% auto;
	padding: 100px 0;
}

.offers-accordion .accordion-item{
    border-bottom: 1px solid var(--divider-color);
	padding-bottom: 30px;
	margin-bottom: 30px;
	transition: all 0.3s ease-in-out;
	overflow: hidden;
}

.offers-accordion .accordion-item:last-child{
	border-bottom: none;
	margin-bottom: 0;
	padding-bottom: 0;
}


.our-offers-images{
	position: relative;
	padding: 0 80px 0 60px;
	margin-left: 65px;
}

.offer-image figure{
	display: block;
	border-radius: 400px 400px 0 0;
}

.offer-image img{
	width: 100%;
	aspect-ratio: 1 / 1.405;
	object-fit: cover;
	border-radius: 400px 400px 0 0;
}

.offer-circle-image-1,
.offer-circle-image-2{
	position: absolute;
	border: 8px solid var(--primary-color);
	border-radius: 50%;
	z-index: 1;
}

.offer-circle-image-1{
	top: 80px;
	right: 0;
}

.offer-circle-image-2{
	left: 0;
	bottom: 80px;
}

.offer-circle-image-1 figure,
.offer-circle-image-2 figure{
	display: block;
	border-radius: 50%;
}

.offer-circle-image-1 img,
.offer-circle-image-2 img{
	width: 100%;
	max-width: 165px;
	object-fit: cover;
}
/***   12. About Restaurant css   ***/
/************************************/

.about-restaurant{
	background: url('images/image/about-restaurant-bg-image.svg') no-repeat;
	background-position: left bottom 120px;
	background-size: 80px auto;
	padding: 100px 0;
}

.about-restaurant .container .row{
	align-items: center;
}

.about-restaurant-content,
.restaurant-timing-box	{
	text-align: center;
}

.about-restaurant-info{
	border-top: 1px solid var(--divider-color);
	padding-top: 40px;
	margin-bottom: 40px;
}

.about-restaurant-info h3{
	font-size: 20px;
	line-height: 1.4em;
	margin-bottom: 30px;
}

.about-restaurant-info p:last-child{
	margin-bottom: 0;
}

.about-author-box img{
	width: 100%;
	max-width: 140px;
	margin-bottom: 10px;
}

.about-author-box h3{
	font-size: 20px;
	text-transform: uppercase;
	color: var(--accent-color);
}

.about-restaurant-image{
    margin: 0 15px;
}

.about-restaurant-image figure{
	display: block;
	border-radius: 400px 400px 0 0;
}

.about-restaurant-image img{
	width: 100%;
	aspect-ratio: 1 / 1.795;
	object-fit: cover;
	border-radius: 400px 400px 0 0;
}

.restaurant-time-body{
	border-top: 1px solid var(--divider-color);
	padding-top: 40px;
}

.restaurant-time-body h3{
	font-size: 20px;
	line-height: 1.4em;
	margin-bottom: 30px;
}

.restaurant-time-body h3:last-child{
	margin-bottom: 0;
}

.restaurant-time-body ul{
	position: relative;
	margin: 0 0 30px 0;
	padding: 0 0 30px 0;
	list-style: none;
}

.restaurant-time-body ul::before{
	content: '';
	position: absolute;
	bottom: 0;
	left: 50%;
	width: 100px;
	height: 1px;
	transform: translateX(-50%);
	background: var(--accent-color);
}

.restaurant-time-body ul li{
	line-height: 1.4em;
	margin-bottom: 15px;
}

.restaurant-time-body ul li:last-child{
	margin-bottom: 0;
}
/***    29. Contact Us Page css   ***/
/************************************/

.page-contact-us {
    padding: 100px 0 50px;
    background: #f8fafc;
    position: relative;
    z-index: 1;
}

.page-contact-us::before {
    display: none;
}


.contact-info-body{
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
}

.contact-info-box-1,
.contact-info-box-2{
    position: relative;
    width: 100%;
	border: 1px solid var(--divider-color);
	border-radius: 26px;
    padding: 30px 40px;
	overflow: hidden;
}

.contact-info-box-1{
    display: flex;
    flex-wrap: wrap;
    gap: 30px 60px;
}

.contact-info-item{
    position: relative;
    width: calc(50% - 30px);
}

.contact-info-box-1 .contact-info-item::before{
    content: '';
    position: absolute;
    top: 50%;
    right: 0;
    transform: translate(30px, -50%);
    height: 80%;
    width: 1px;
    background-color: var(--divider-color);
}

.contact-info-box-1 .contact-info-item:last-child:before,
.contact-info-box-1 .contact-info-item:nth-child(2n + 2):before{
	display: none;
}

.contact-info-box-2 .contact-info-item{
    display: flex;
	width: 100%;
}

.contact-info-item .icon-box{
    position: relative;
    background-color: var(--dark-divider-color);
    border-radius: 50%;
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    margin-bottom: 20px;
}

.contact-info-item .icon-box::before{
    content: '';
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    background: linear-gradient(90deg, var(--accent-color) 0%, var(--accent-secondary-color) 100%);
    border-radius: 50%;
    width: 100%;
    height: 100%;
    transform: scale(0);
    transition: all 0.4s ease-in-out;
    z-index: 0;
}

.contact-info-item:hover .icon-box::before{
    transform: scale(1);
}

.contact-info-item .icon-box img{
	width: 100%;
    max-width: 30px;
	transition: all 0.4s ease-in-out;
    z-index: 1;
}

.contact-info-item:hover .icon-box img{
	filter: brightness(0) invert(0);
}

.contact-info-box-2 .icon-box{
    margin: 0 20px 0 0;
}

.contact-info-box-2 .contact-item-content{
    width: calc(100% - 80px);
}

.contact-item-content h3{
    font-size: 22px;
    text-transform: capitalize;
    margin-bottom: 10px;
}

.contact-item-content p{
    margin: 0;
}

.contact-item-content p a{
	color: inherit;
	transition: all 0.4s ease-in-out;
}

.contact-item-content p a:hover{
	color: var(--accent-color);
}

.contact-us-form{
	border: 1px solid var(--divider-color);
	border-radius: 26px;
    padding: 40px;
	overflow: hidden;
}

.contact-form-content{
	margin-bottom: 40px;
}

.contact-form-content h3{
	font-size: 22px;
	text-transform: capitalize;
	margin-bottom: 10px;
}

.contact-form-content p{
	color: var(--primary-color);
	margin: 0;
}

.contact-us-form .form-control{
    font-size: 18px;
    font-weight: 400;
    color: var(--primary-color);
    padding: 0 0 15px 0;
    background-color: transparent;
	border: none;
    border-bottom: 1px solid var(--divider-color);
    border-radius: 0px;
    outline: none;
    box-shadow: none;
}

.contact-us-form .form-control::placeholder{
    color: var(--primary-color);
}
.google-map{
	padding: 50px 0 100px;
}

.google-map-iframe,
.google-map-iframe iframe{
	width: 100%;
	height: 600px;
	border-radius: 26px;
}

.google-map-iframe iframe{
    filter: grayscale(1);
    transition: all 0.4s ease-in-out;
}

.google-map-iframe iframe:hover{
    filter: grayscale(0);
}

/* order page  */
/* Background + Font */
/* Background + Font */
body {
  background-color: var(--secondary-color);
  color: var(--text-color);
  font-family: var(--default-font);
}

/* Title */
h1 {
  font-weight: 800;
  text-align: center;
  margin-bottom: 40px;
  color: #f43f5e;
  letter-spacing: 1px;
  text-transform: uppercase;
}

/* Order Card */
.card {
  border: none;
  border-radius: 16px;
  overflow: hidden;
  background: #ffffff;
  box-shadow: 0 8px 30px rgba(0,0,0,0.05);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 40px rgba(0,0,0,0.1);
}

/* Card Header */
.card-header {
  background: linear-gradient(135deg, #f43f5e, #f97316);
  font-weight: 600;
  border: none;
  padding: 15px 20px;
  color: #fff;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.card-header span {
  font-weight: bold;
}

/* Order Table */
.table {
  color: #334155;
}
.table thead {
  background: #f1f5f9;
  color: #1e293b;
}
.table tbody tr:hover {
  background: #f8fafc;
}
.table img {
  border-radius: 6px;
  box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

/* Delete Button */
.btn-delete {
  background: #ef4444;
  border: none;
  padding: 6px 14px;
  border-radius: 6px;
  color: #fff;
  font-size: 0.9rem;
  transition: all 0.3s ease;
}
.btn-delete:hover {
  background: #b91c1c;
  transform: scale(1.05);
}

/* Empty Orders Alert */
.alert {
  font-size: 1.1rem;
  border-radius: 12px;
  background: #fee2e2;
  color: #991b1b;
  border: none;
}

/* order page end  */

/* user login css  *//* Background Slideshow */

</style>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
