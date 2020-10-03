<!DOCTYPE html>

<?php

$connect = mysqli_connect("localhost", "root", "", "wowonder");
function make_query($connect)
{
  $query = "SELECT id,title,thumbnail,user,username,posted,view FROM Wo_Blog INNER JOIN Wo_Users ON Wo_Blog.user=Wo_Users.user_id ORDER BY view DESC";
  $result = mysqli_query($connect, $query);
  return $result;
}

function make_slides($connect)
{
  $output = '';

  $result = make_query($connect);
  while ($row = mysqli_fetch_array($result)) {

    $output .= '
  <div class="post">
    <img src="../' . $row["thumbnail"] . '" alt="' . $row["title"] . '" class="slider-image" />
    <div class="post-info">
      <h4 style="margin:5px"><a href="../read-blog/' . $row["id"] . '_' . $row["title"] . '.html">' . $row["title"] . '</a></h4>
      <i class="fas fa-user">' . $row["username"] . '</i>
      &nbsp;
      <i class="fas fa-calendar">' . date("d M Y", $row["posted"]) . '</i>
      &nbsp;
      <i class="fas fa-eye">' . $row["view"] . '</i>
    </div>
  </div>
  ';
  }
  return $output;
}
?>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>MUSIC SITE</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <!-- Font Awesome icons (free version)-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />

  <!-- Core theme CSS (includes Bootstrap)-->

  <!--slick CSS-->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="css/slick-theme.css" />

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">
  <!-- <link href="css/styles.css" rel="stylesheet" /> -->

  <style>
    html,
    body,
    header,
    #intro {
      height: 100%;
      background-color: #FFFFFF;
    }

    #intro {
      background: url("assets/img/bg-masthead.jpg")no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }

    .top-nav-collapse {
      background-color: #f4623a;
    }

    @media (max-width: 768px) {
      .navbar:not(.top-nav-collapse) {
        background-color: #f4623a;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      .navbar:not(.top-nav-collapse) {
        background-color: #f4623a;
      }
    }


    .post-slider {
      position: relative;


    }

    .post-slider,
    .slider-title {
      text-align: center;
      margin: 30px auto;
    }

    .post-slider,
    .post-wrapper {
      width: 100%;
      height: 470px;
      margin: 0px auto;
      padding: 10px 0px 10px 0px;
      overflow: hidden;

    }

    .post-slider .post-wrapper .post {
      background: white;
      display: inline-block;
      margin: 0px 10px;
      width: auto;
      height: auto;
      border-radius: 5px;
      box-shadow: 1rem 1rem 1rem -1rem #D0D0D0;
    }

    .post-slider .post-wrapper .post .post-info {
      height: 130px;

      padding: 0px 5px;
      border-bottom-left-radius: 5px;
      border-bottom-right-radius: 5px;
    }

    .post-slider .next {
      position: absolute;
      top: 65%;
      right: 8px;
      font-size: 3em;
      color: #f4623a;
      cursor: pointer;
      z-index: 3;
    }

    .post-slider .prev {
      position: absolute;
      top: 65%;
      left: 8px;
      font-size: 3em;
      color: #f4623a;
      cursor: pointer;
      z-index: 3;
    }

    .post-slider .post-wrapper .post .slider-image {
      width: 100%;
      height: 200px;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
    }


    .parallax {
      min-height: 400px;
      background: transparent;
    }

    .info {
      z-index: 2;
      position: relative;
      padding-top: 150px;
    }
  </style>


</head>

<body id="page-top">
  <header>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
      <div class="container">
        <a class="navbar-brand font-weight-bold" href="#page-top">Music Site</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="basicExampleNav">
          <ul class="navbar-nav ml-auto my-2 my-lg-0 smooth-scroll">
            <li class="nav-item"><a class="nav-link " href="http://localhost/wowonder_social/Script/blogs">部落格</a></li>
            <!-- <li class="nav-item"><a class="nav-link " href="http://localhost/wowonder_social/Script/">募資</a></li> -->
            <li class="nav-item"><a class="nav-link " href="http://localhost/wowonder_social/Script/">登入</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Masthead-->

    <div id="intro" class="view">

      <div class="mask rgba-black-strong">

        <div class="container-fluid d-flex align-items-center justify-content-center h-100">

          <div class="row d-flex justify-content-center text-center">

            <div class="col-md-12">

              <!-- Heading -->
              <h1 class="text-uppercase text-white font-weight-bold" style="font-size:80px;">用一首曲，譜一段故事</h1><br>
              <!-- Divider -->
              <hr class="hr-light">

              <!-- Description -->
              <h4 class="white-text my-4">Compose a Story.</h4><br>
              <a type="button" class="btn btn-outline-white" href="/wowonder_social/Script/">開始使用</a>

            </div>

          </div>

        </div>

      </div>

    </div>


    <!-- <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">

        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold" style="font-size:80px;">用一首曲，譜一段故事</h1><br>
          <hr class="divider my-4"><br>
        </div>
        <div class="col-lg-8 align-self-baseline">
          <a class="btn btn-primary btn-xl js-scroll-trigger" style="font-size:30px;" href="/wowonder_social/Script/">開始使用</a>
        </div>
      </div>
    </div> -->
  </header>


  <!--Main layout-->

  <main>
    <div class="container mb-5 ">

      <!--Section: Best Features-->
      <section class="text-center">
        <div class="col-md-12 mb-4">
          <div class="page-wrapper">
            <div class="post-slider">
              <h1 class="slider-title text-uppercase font-weight-bold">熱門貼文</h1>
              <span class="fas fa-chevron-left prev"></span>
              <span class="fas fa-chevron-right next"></span>
              <div class="post-wrapper">
                <?php echo make_slides($connect); ?>
              </div>
            </div>
          </div>
        </div>

      </section> 
      <!--Section: Best Features-->


    </div>
    <div class="parallax " data-parallax="scroll" data-z-index="1" data-image-src="assets/img/downbackground.jpg">
      <div class="info">
        <div class="text-center white-text">
          <h2 class="h2-responsive mb-5 wow fadeIn">關於我們</h2>
            假如我們的音樂只能使人愉快，那很遺憾，我們的目的是使人們高尚起來。—亨德爾
        </div>
      </div>
    </div>

    <div class="container">


      <!--Section: Contact-->
      
      <!--Section: Contact-->


    </div>
  </main>

  <!-- Footer -->
  <footer class="page-footer font-small unique-color-dark">

    <!--Footer Links-->
    <div class="container mt-5 mb-4 py-4 text-center text-md-left">
      <div class="row mt-3">

        <!--First column-->
        <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
          <h6 class="text-uppercase font-weight-bold">
          <a class="brand header-brand" href="http://localhost/wowonder_social/Script/startbootstrap-creative-gh-pages/index.php">
				    <img width="150" height="30" src="assets/img/logo.png" />
			    </a>
          </h6><br>
          <!-- 紫線 -->
          <!-- <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;"> -->
          <p>
            <i class="fas fa-home mr-3"></i>Taipei, Taiwan</p>
          <p>
            <i class="fa fa-phone mr-3"></i>02-12345678</p>
          <p>
            <i class="fa fa-envelope mr-3"></i>heke0621@gmail.com</p>
        </div>
        <!--/.First column-->

        <!--Second column-->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase font-weight-bold">
            <strong>Products</strong>
          </h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="http://localhost/wowonder_social/Script/blogs/">部落格</a>
          </p>
          <p>
            <a href="http://localhost/wowonder_social/Script/events/">活動</a>
          </p>
          <p>
            <a href="#!">租借器材</a>
          </p>
          <p>
            <a href="http://localhost/wowonder_social/Script/funding/">募資</a>
          </p>
        </div>
        <!--/.Second column-->

        <!--Third column-->
        <!-- <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase font-weight-bold">
            <strong>Useful links</strong>
          </h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="#!">Your Account</a>
          </p>
          <p>
            <a href="#!">Become an Affiliate</a>
          </p>
          <p>
            <a href="#!">Shipping Rates</a>
          </p>
          <p>
            <a href="#!">Help</a>
          </p>
        </div> -->
        <!--/.Third column-->

        <!--Fourth column-->
        <div class="col-md-4 col-lg-3 col-xl-3">
          <h6 class="text-uppercase font-weight-bold">
            <strong>About</strong>
          </h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="http://localhost/wowonder_social/Script/terms/about-us">關於我們</p>
          <p>
            <a href="http://localhost/wowonder_social/Script/contact-us">聯繫我們</p>
          <p>
            <a href="http://localhost/wowonder_social/Script/terms/privacy-policy">隱私政策</p>
          <p>
            <a href="http://localhost/wowonder_social/Script/terms/terms">使用條款</p>
        </div>
        <!--/.Fourth column-->

      </div>
    </div>
    <!--/.Footer Links-->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a href="https://mdbootstrap.com/bootstrap-tutorial/"> MDBootstrap.com</a>
    </div>
    <!-- Copyright -->

  </footer>





  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript" src="js/custom.js"></script>

</body>

</html>

<script>
  $(document).ready(function() {

    $('.post-wrapper').slick({
      nextArrow: $('.next'),
      prevArrow: $('.prev'),
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 950,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
    /*!
     * parallax.js v1.5.0 (http://pixelcog.github.io/parallax.js/)
     * @copyright 2016 PixelCog, Inc.
     * @license MIT (https://github.com/pixelcog/parallax.js/blob/master/LICENSE)
     */
    ! function(t, i, e, s) {
      function o(i, e) {
        var h = this;
        "object" == typeof e && (delete e.refresh, delete e.render, t.extend(this, e)), this.$element = t(i), !this.imageSrc && this.$element.is("img") && (this.imageSrc = this.$element.attr("src"));
        var r = (this.position + "").toLowerCase().match(/\S+/g) || [];
        if (r.length < 1 && r.push("center"), 1 == r.length && r.push(r[0]), "top" != r[0] && "bottom" != r[0] && "left" != r[1] && "right" != r[1] || (r = [r[1], r[0]]), this.positionX !== s && (r[0] = this.positionX.toLowerCase()), this.positionY !== s && (r[1] = this.positionY.toLowerCase()), h.positionX = r[0], h.positionY = r[1], "left" != this.positionX && "right" != this.positionX && (isNaN(parseInt(this.positionX)) ? this.positionX = "center" : this.positionX = parseInt(this.positionX)), "top" != this.positionY && "bottom" != this.positionY && (isNaN(parseInt(this.positionY)) ? this.positionY = "center" : this.positionY = parseInt(this.positionY)), this.position = this.positionX + (isNaN(this.positionX) ? "" : "px") + " " + this.positionY + (isNaN(this.positionY) ? "" : "px"), navigator.userAgent.match(/(iPod|iPhone|iPad)/)) return this.imageSrc && this.iosFix && !this.$element.is("img") && this.$element.css({
          backgroundImage: "url(" + this.imageSrc + ")",
          backgroundSize: "cover",
          backgroundPosition: this.position
        }), this;
        if (navigator.userAgent.match(/(Android)/)) return this.imageSrc && this.androidFix && !this.$element.is("img") && this.$element.css({
          backgroundImage: "url(" + this.imageSrc + ")",
          backgroundSize: "cover",
          backgroundPosition: this.position
        }), this;
        this.$mirror = t("<div />").prependTo(this.mirrorContainer);
        var a = this.$element.find(">.parallax-slider"),
          n = !1;
        0 == a.length ? this.$slider = t("<img />").prependTo(this.$mirror) : (this.$slider = a.prependTo(this.$mirror), n = !0), this.$mirror.addClass("parallax-mirror").css({
          visibility: "hidden",
          zIndex: this.zIndex,
          position: "fixed",
          top: 0,
          left: 0,
          overflow: "hidden"
        }), this.$slider.addClass("parallax-slider").one("load", function() {
          h.naturalHeight && h.naturalWidth || (h.naturalHeight = this.naturalHeight || this.height || 1, h.naturalWidth = this.naturalWidth || this.width || 1), h.aspectRatio = h.naturalWidth / h.naturalHeight, o.isSetup || o.setup(), o.sliders.push(h), o.isFresh = !1, o.requestRender()
        }), n || (this.$slider[0].src = this.imageSrc), (this.naturalHeight && this.naturalWidth || this.$slider[0].complete || a.length > 0) && this.$slider.trigger("load")
      }! function() {
        for (var t = 0, e = ["ms", "moz", "webkit", "o"], s = 0; s < e.length && !i.requestAnimationFrame; ++s) i.requestAnimationFrame = i[e[s] + "RequestAnimationFrame"], i.cancelAnimationFrame = i[e[s] + "CancelAnimationFrame"] || i[e[s] + "CancelRequestAnimationFrame"];
        i.requestAnimationFrame || (i.requestAnimationFrame = function(e) {
          var s = (new Date).getTime(),
            o = Math.max(0, 16 - (s - t)),
            h = i.setTimeout(function() {
              e(s + o)
            }, o);
          return t = s + o, h
        }), i.cancelAnimationFrame || (i.cancelAnimationFrame = function(t) {
          clearTimeout(t)
        })
      }(), t.extend(o.prototype, {
        speed: .2,
        bleed: 0,
        zIndex: -100,
        iosFix: !0,
        androidFix: !0,
        position: "center",
        overScrollFix: !1,
        mirrorContainer: "body",
        refresh: function() {
          this.boxWidth = this.$element.outerWidth(), this.boxHeight = this.$element.outerHeight() + 2 * this.bleed, this.boxOffsetTop = this.$element.offset().top - this.bleed, this.boxOffsetLeft = this.$element.offset().left, this.boxOffsetBottom = this.boxOffsetTop + this.boxHeight;
          var t, i = o.winHeight,
            e = o.docHeight,
            s = Math.min(this.boxOffsetTop, e - i),
            h = Math.max(this.boxOffsetTop + this.boxHeight - i, 0),
            r = this.boxHeight + (s - h) * (1 - this.speed) | 0,
            a = (this.boxOffsetTop - s) * (1 - this.speed) | 0;
          r * this.aspectRatio >= this.boxWidth ? (this.imageWidth = r * this.aspectRatio | 0, this.imageHeight = r, this.offsetBaseTop = a, t = this.imageWidth - this.boxWidth, "left" == this.positionX ? this.offsetLeft = 0 : "right" == this.positionX ? this.offsetLeft = -t : isNaN(this.positionX) ? this.offsetLeft = -t / 2 | 0 : this.offsetLeft = Math.max(this.positionX, -t)) : (this.imageWidth = this.boxWidth, this.imageHeight = this.boxWidth / this.aspectRatio | 0, this.offsetLeft = 0, t = this.imageHeight - r, "top" == this.positionY ? this.offsetBaseTop = a : "bottom" == this.positionY ? this.offsetBaseTop = a - t : isNaN(this.positionY) ? this.offsetBaseTop = a - t / 2 | 0 : this.offsetBaseTop = a + Math.max(this.positionY, -t))
        },
        render: function() {
          var t = o.scrollTop,
            i = o.scrollLeft,
            e = this.overScrollFix ? o.overScroll : 0,
            s = t + o.winHeight;
          this.boxOffsetBottom > t && this.boxOffsetTop <= s ? (this.visibility = "visible", this.mirrorTop = this.boxOffsetTop - t, this.mirrorLeft = this.boxOffsetLeft - i, this.offsetTop = this.offsetBaseTop - this.mirrorTop * (1 - this.speed)) : this.visibility = "hidden", this.$mirror.css({
            transform: "translate3d(" + this.mirrorLeft + "px, " + (this.mirrorTop - e) + "px, 0px)",
            visibility: this.visibility,
            height: this.boxHeight,
            width: this.boxWidth
          }), this.$slider.css({
            transform: "translate3d(" + this.offsetLeft + "px, " + this.offsetTop + "px, 0px)",
            position: "absolute",
            height: this.imageHeight,
            width: this.imageWidth,
            maxWidth: "none"
          })
        }
      }), t.extend(o, {
        scrollTop: 0,
        scrollLeft: 0,
        winHeight: 0,
        winWidth: 0,
        docHeight: 1 << 30,
        docWidth: 1 << 30,
        sliders: [],
        isReady: !1,
        isFresh: !1,
        isBusy: !1,
        setup: function() {
          function s() {
            if (p == i.pageYOffset) return i.requestAnimationFrame(s), !1;
            p = i.pageYOffset, h.render(), i.requestAnimationFrame(s)
          }
          if (!this.isReady) {
            var h = this,
              r = t(e),
              a = t(i),
              n = function() {
                o.winHeight = a.height(), o.winWidth = a.width(), o.docHeight = r.height(), o.docWidth = r.width()
              },
              l = function() {
                var t = a.scrollTop(),
                  i = o.docHeight - o.winHeight,
                  e = o.docWidth - o.winWidth;
                o.scrollTop = Math.max(0, Math.min(i, t)), o.scrollLeft = Math.max(0, Math.min(e, a.scrollLeft())), o.overScroll = Math.max(t - i, Math.min(t, 0))
              };
            a.on("resize.px.parallax load.px.parallax", function() {
              n(), h.refresh(), o.isFresh = !1, o.requestRender()
            }).on("scroll.px.parallax load.px.parallax", function() {
              l(), o.requestRender()
            }), n(), l(), this.isReady = !0;
            var p = -1;
            s()
          }
        },
        configure: function(i) {
          "object" == typeof i && (delete i.refresh, delete i.render, t.extend(this.prototype, i))
        },
        refresh: function() {
          t.each(this.sliders, function() {
            this.refresh()
          }), this.isFresh = !0
        },
        render: function() {
          this.isFresh || this.refresh(), t.each(this.sliders, function() {
            this.render()
          })
        },
        requestRender: function() {
          var t = this;
          t.render(), t.isBusy = !1
        },
        destroy: function(e) {
          var s, h = t(e).data("px.parallax");
          for (h.$mirror.remove(), s = 0; s < this.sliders.length; s += 1) this.sliders[s] == h && this.sliders.splice(s, 1);
          t(e).data("px.parallax", !1), 0 === this.sliders.length && (t(i).off("scroll.px.parallax resize.px.parallax load.px.parallax"), this.isReady = !1, o.isSetup = !1)
        }
      });
      var h = t.fn.parallax;
      t.fn.parallax = function(s) {
        return this.each(function() {
          var h = t(this),
            r = "object" == typeof s && s;
          this == i || this == e || h.is("body") ? o.configure(r) : h.data("px.parallax") ? "object" == typeof s && t.extend(h.data("px.parallax"), r) : (r = t.extend({}, h.data(), r), h.data("px.parallax", new o(this, r))), "string" == typeof s && ("destroy" == s ? o.destroy(this) : o[s]())
        })
      }, t.fn.parallax.Constructor = o, t.fn.parallax.noConflict = function() {
        return t.fn.parallax = h, this
      }, t(function() {
        t('[data-parallax="scroll"]').parallax()
      })
    }(jQuery, window, document);
  });
</script>