<?php
require_once("../includes/functions/sanitize.php");
require_once("../includes/layout/header.php");
?>

<!-- Slider -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img class="first-slide" src="image/Shine_1024x683.png" alt="Shine">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Let your Heart...</h1>
                        <p>Follow our upcoming sermon. How your heart can shine for God.</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="second-slide" src="image/weserv_1024x683.png" alt="WeServ">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>WeServ Project Leader</h1>
                        <p>Any interest in becoming a project leader? Learn how you can get involved with being a project leader after service today. We will meet at South Hall</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="third-slide" src="image/BCL.png" alt="Children">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Base Camp Live!</h1>
                        <p>After worship service, meet your elementary schooler in the theatre to hear what your kids learned about church</p>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div><!-- /.carousel -->



<!-- Features -->
    <div class="container_marketing">
        <div id="cir" class="row">
            <div id="find" class="col-lg-4">
                <img class="img-circle" src="image/map1.png" alt="Find Us" width="150" height="100" />
                <h2>Find Us</h2>
                <p>Use the map to see where we are located.</p>
                <p><a class="btn" href="location.php" role="button">View details &raquo;</a></p>
            </div><!--close col-lg-4 -->

            <div id="grp" class="col-lg-4">
                <img class="img-circle" src="image/grp1_q.jpg" alt="Small Group" width="150" height="100" />
                <h2>Small Group</h2>
                <p>Choose from our variety of small groups.</p>
                <p><a class="btn" href="ministries.php" role="button">View details &raquo;</a></p>
            </div><!--close col-lg-4 -->

            <div id="new" class="col-lg-4">
                <img class="img-circle" src="image/guy.png" alt="I'm new" width="150" height="100" />
                <h2>I'm New</h2>
                <p>What you can expect from Shalom</p>
                <p><a class="btn" href="about.php" role="button">View details &raquo;</a></p>
            </div><!--close col-lg-4 -->
        </div><!--close row -->

        <hr class="featurette-divider">

<!-- Events -->
    <div class="row_featurette">
        <div class="heading">
            <h2>Our Events</h2>
            <p class="upcomingEvents">Stay up-to-date on what's going on at Shalom of Bay City and check out all our upcoming events.</p>
        </div><!--close heading -->


        <!--<hr class="featurette-divider">-->

        <div id="e" class="row">
            <div id="upcoming1" class="col-lg-6">
                <img class="event" src="image/Lead.png" alt="leadGrp" width="200" height="100">

                <h3>Lead a Group</h3>
                <time class="hour">April 12, 2015 - 6:00PM</time>
                <address>Location: South Hall</address>
            </div><!--close col -->


            <div id="upcoming2" class="col-lg-6">
                <img class="event" src="image/partner.png" alt="partner" width="200" height="100">

                <h3>Partnership Class</h3>
                <time class="hour">March 26, 2015 - 7:00PM</time>
                <address>Location: Main Entrance Upstairs</address>
            </div>
        </div><!--close col -->

    </div><!--close row featurette -->
    </div><!--close container marketing -->



<?php
require_once("../includes/layout/footer.php");
?>