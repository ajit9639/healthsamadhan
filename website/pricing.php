<?php include "config.php" ?>

<!DOCTYPE html>
<html lang="en">

<?php include 'head.php' ?>

<body class="custom-cursor">

<?php include 'header.php' ?>

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg" >
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><span>/</span></li>
                        <li>Pricing</li>
                    </ul>
                    <h2>Pricing</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

         <!--pricing Start-->
        <section class="pricing">
            <div class="container">
                <div class="section-title text-center">
                    <div class="section-sub-title-box">
                        <p class="section-sub-title">pricing plans</p>
                        <div class="section-title-shape-1">
                            <img src="assets/images/shapes/section-title-shape-1.png" alt="">
                        </div>
                        <div class="section-title-shape-2">
                            <img src="assets/images/shapes/section-title-shape-2.png" alt="">
                        </div>
                    </div>
                    <h2 class="section-title__title">Choose the best plans <br> for yourself</h2>
                </div>
                <div class="pricing__tab">
                    <div class="pricing__tab-box tabs-box">
                        <!-- <ul class="tab-buttons clearfix list-unstyled">
                            <li data-tab="#monthly" class="tab-btn active-btn"><span>Monthly Plan</span></li>
                            <li data-tab="#yearly" class="tab-btn"><span>Yearly Plan</span></li>
                        </ul> -->
                        <div class="tabs-content">
                            <!--tab-->
                            <div class="tab active-tab" id="monthly">
                                <div class="pricing__main-content-box">
                                    <div class="row">
                                        <!--Pricing Single Start-->
                                        
                <?php  $data = mysqli_query($conn,"SELECT * FROM `package`");
                while($all_rows = mysqli_fetch_assoc($data))
                  {?>
                                        <!--Pricing Single Start-->
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="pricing__single">
                                                <div class="pricing-shape-1">
                                                    <img src="assets/images/shapes/pricing-shape-1.png" alt="">
                                                </div>
                                                <div class="pricing__single-top">
                                                    <div class="pricing__img">
                                                        <img src="assets/images/resources/pricing-img-2.png" alt="">
                                                    </div>
                                                    <div class="pricing__content">
                                                        <h3>Rs <?= $all_rows['package_amount'] ?></h3>
                                                        <p>Per month</p>
                                                    </div>
                                                </div>
                                                <div class="pricing__single-bottom">
                                                    <h3 class="pricing__title"><?= $all_rows['package_name'] ?></h3>
                                                    <ul class="list-unstyled pricing__points">
                                                       
                                                    
                                                    <li>
                                                            <!-- <div class="icon">
                                                                <i class="fa fa-check"></i>
                                                            </div> -->
                                                            <div class="text">
                                                                <p><?= $all_rows['package_description'] ?></p>
                                                            </div>
                                                        </li>
                                                        

                                                    </ul>
                                                    <div class="pricing__btn-box">
                                                        <a href="" class="thm-btn pricing__btn">Buy Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php } ?>
                                        <!--Pricing Single End-->
                                       
                                    </div>
                                </div>
                            </div>
                            <!--tab-->
                            <div class="tab" id="yearly">
                                <div class="pricing__main-content-box">
                                    <div class="row">
                                        <!--Pricing Single Start-->
                                     
                                      
                                        <!--Pricing Single End-->
                                        <!--Pricing Single Start-->
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="pricing__single">
                                                <div class="pricing-shape-1">
                                                    <img src="assets/images/shapes/pricing-shape-1.png" alt="">
                                                </div>
                                                <div class="pricing__single-top">
                                                    <div class="pricing__img">
                                                        <img src="assets/images/resources/pricing-img-3.png" alt="">
                                                    </div>
                                                    <div class="pricing__content">
                                                        <h3>75$</h3>
                                                        <p>Per month</p>
                                                    </div>
                                                </div>
                                                <div class="pricing__single-bottom">
                                                    <h3 class="pricing__title">Property plan</h3>
                                                    <ul class="list-unstyled pricing__points">
                                                        <li>
                                                            <div class="icon">
                                                                <i class="fa fa-check"></i>
                                                            </div>
                                                            <div class="text">
                                                                <p>Invoices/Estimates</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <i class="fa fa-check"></i>
                                                            </div>
                                                            <div class="text">
                                                                <p>Online Payments</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <i class="fa fa-check"></i>
                                                            </div>
                                                            <div class="text">
                                                                <p>Projects and Time Sheet</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <i class="fa fa-check"></i>
                                                            </div>
                                                            <div class="text">
                                                                <p>Recurring Transations</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <i class="fa fa-check"></i>
                                                            </div>
                                                            <div class="text">
                                                                <p>Client Portal</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="pricing__btn-box">
                                                        <a href="pricing.html" class="thm-btn pricing__btn">Select Policy</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Pricing Single End-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--pricing End-->


         <!--CTA One Start-->
         <section class="cta-one cta-four">
            <div class="cta-four-shape-1 float-bob-x">
                <img src="assets/images/shapes/cta-four-shape-1.png" alt="">
            </div>
            <div class="container">
                <div class="cta-one__content">
                    <div class="cta-one__inner">
                        <div class="cta-one__left">
                            <h3 class="cta-one__title">Connect with us for free consultation</h3>
                        </div>
                        <div class="cta-one__right">
                            <div class="cta-one__call">
                                <div class="cta-one__call-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="cta-one__call-number">
                                    <a href="tel:9200368090">+92 (003) 68-090</a>
                                    <p>Call to Our Experts</p>
                                </div>
                            </div>
                            <div class="cta-one__btn-box">
                                <a href="contact.html" class="thm-btn cta-one__btn">Get a Quote</a>
                            </div>
                        </div>
                        <div class="cta-one__img">
                            <img src="assets/images/resources/cta-one-img.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--CTA One End-->

        <!--Counter One Start-->
        <Section class="counter-one">
            <div class="counter-one-shape-1 float-bob-y">
                <img src="assets/images/shapes/counter-one-shape-1.png" alt="">
            </div>
            <div class="counter-one-shape-2 float-bob-y">
                <img src="assets/images/shapes/counter-one-shape-2.png" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <!--Counter One Single Start-->
                    <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="counter-one__single">
                            <div class="counter-one__top">
                                <div class="counter-one__icon">
                                    <span class="icon-insurance-1"></span>
                                </div>
                                <div class="counter-one__count-box">
                                    <div class="counter-one__count-box-inner">
                                        <h3 class="odometer" data-count="2.6">00</h3>
                                        <span class="counter-one__plus">k</span>
                                    </div>
                                </div>
                            </div>
                            <p class="counter-one__text">Customers Engaged</p>
                        </div>
                    </div>
                    <!--Counter One Single End-->
                    <!--Counter One Single Start-->
                    <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                        <div class="counter-one__single">
                            <div class="counter-one__top">
                                <div class="counter-one__icon">
                                    <span class="icon-group"></span>
                                </div>
                                <div class="counter-one__count-box">
                                    <div class="counter-one__count-box-inner">
                                        <h3 class="odometer" data-count="25">00</h3>
                                        <span class="counter-one__plus">+</span>
                                    </div>
                                </div>
                            </div>
                            <p class="counter-one__text">Professional team</p>
                        </div>
                    </div>
                    <!--Counter One Single End-->
                    <!--Counter One Single Start-->
                    <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                        <div class="counter-one__single">
                            <div class="counter-one__top">
                                <div class="counter-one__icon">
                                    <span class="icon-life-insurance"></span>
                                </div>
                                <div class="counter-one__count-box">
                                    <div class="counter-one__count-box-inner">
                                        <h3 class="odometer" data-count="1.4">00</h3>
                                        <span class="counter-one__plus">k</span>
                                    </div>
                                </div>
                            </div>
                            <p class="counter-one__text">Satisfied customers</p>
                        </div>
                    </div>
                    <!--Counter One Single End-->
                    <!--Counter One Single Start-->
                    <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                        <div class="counter-one__single">
                            <div class="counter-one__top">
                                <div class="counter-one__icon">
                                    <span class="icon-success"></span>
                                </div>
                                <div class="counter-one__count-box">
                                    <div class="counter-one__count-box-inner">
                                        <h3 class="odometer" data-count="92">00</h3>
                                        <span class="counter-one__plus">%</span>
                                    </div>
                                </div>
                            </div>
                            <p class="counter-one__text">Our success rate</p>
                        </div>
                    </div>
                    <!--Counter One Single End-->
                </div>
            </div>
        </Section>
        <!--Counter One End-->

       

        <?php include 'footer.php' ?>
</body>



</html>