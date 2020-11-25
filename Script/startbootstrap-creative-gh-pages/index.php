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
  <title>藏樂坊</title>
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
  <!-- 
  <link rel="stylesheet" href="https://localhost/wowonder_social/Script/themes/sunshine/stylesheet/general-style-plugins.css"> -->


  <link rel="stylesheet" href="https://localhost/wowonder_social/Script/themes/sunshine/stylesheet/style.css">
  <link rel="stylesheet" href="https://localhost/wowonder_social/Script/themes/sunshine/stylesheet/theme-style.css">



  <script src="https://localhost/wowonder_social/Script/themes/sunshine/javascript/jquery-3.1.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-ui-touch-punch@0.2.3/jquery.ui.touch-punch.min.js"></script>

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

  <style>
    .main-menu {
      color: #FFFFFF;
      background-color: #666666;
      padding: 5px;
      margin: 0px;
      cursor: pointer;
      display: inline-block;

    }

    /* 主選單的樣式 */

    .main-menu:hover {
      background-color: #0000FF;

    }

    .sub-menu {
      background-color: #fff;
      margin: 5px -5px;
      padding: 0px;
      list-style-type: none;
      position: absolute;
      z-index: 1;
      display: block;
      border-radius: 5px;


    }

    /* 下拉清單的樣式 */

    .sub-menu li {
      padding: 7px 25px;
      text-align: left;
      font-family: "Lato", sans-serif;
      font-weight: 600;
      font-size: 13px;
      display: block;
      text-decoration: none;
      color: #525252;

    }


    /* 下拉清單每一列的樣式 */

    .sub-menu li:hover {
      color: #fff;
      background-color: #4d91ea;
      border-radius: 5px;

    }

    .sub-menu a {
      text-align: left;
      display: block;
      text-decoration: none;
      color: #525252;
    }

    .sub-menu a:hover {
      color: #fff;

      text-decoration: none;

    }
  </style>


</head>

<body id="page-top">
  <header>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
      <div class="container">
        <a class="navbar-brand font-weight-bold" href="#page-top">藏樂坊</a>
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
      <div class="col-md-12 mb-4">
        <h1 class="slider-title text-uppercase font-weight-bold">器材徵集</h1>
      </div>


      <!--Section: Contact-->
      <div class="sun_search_head">
        <form action="https://localhost/wowonder_social/Script/search" method="get" class="search-filter-form" id="search_form">
          <div class="sun_srch_tp_filtr">
            <div class="frst_srch_row">


              <span class="dropdown-toggle" style="padding: 4px 10px;" onclick="switchMenu( this, 'SubMenu1' )">出借項目: <span class="loan_text">所有範圍</span>
                <ul id="SubMenu1" class="sub-menu loan" style="display:none;">
                  <li id="loan" value="0">所有範圍</li>
                  <li id="loan" value="1">錄音介面</li>
                  <li id="loan" value="2">鍵盤</li>
                  <li id="loan" value="3">合成器</li>
                  <li id="loan" value="4">模組化合成器</li>
                  <li id="loan" value="5">節奏/取樣機</li>
                  <li id="loan" value="6">聲學材料</li>
                  <li id="loan" value="7">傳統樂器</li>
                  <li id="loan" value="8">DJ器材</li>
                  <li id="loan" value="9">音箱</li>
                  <li id="loan" value="10">效果器</li>
                  <li id="loan" value="11">其他</li>
                </ul>
              </span>

              <span class="dropdown-toggle" style="padding: 4px 10px;" onclick="switchMenu( this, 'SubMenu2' )">器材價位: <span class="money_rang_text">所有範圍</span>
                <ul id="SubMenu2" class="sub-menu money_rang" style="display:none;">
                  <li>1萬以下</li>
                  <li>5萬以下</li>
                  <li>10萬以下</li>
                  <li>50萬以下</li>
                  <li>100萬以下</li>
                </ul>
              </span>

              <span class="dropdown-toggle" style="padding: 4px 10px;" onclick="switchMenu( this, 'SubMenu3' )">品牌: <span class="brand_text">所有範圍</span>
                <ul id="SubMenu3" class="sub-menu brand" style="display:none;">
                  <li>RODE</li>
                  <li>Focusrite</li>
                  <li>Steinberg</li>
                  <li>PreSonus</li>
                  <li>Roland</li>
                  <li>Yamaha山葉</li>
                  <li>Dynaudio</li>
                  <li>EvE</li>
                  <li>Focal</li>
                  <li>Tannoy</li>
                  <li>其他</li>
                </ul>
              </span>


            </div>
            <div class="sec_srch_row">
              <span class="dropdown-toggle" style="padding: 4px 10px;" onclick="switchMenu( this, 'SubMenu4' )">租金: <span class="rent_text">所有範圍</span>
                <ul id="SubMenu4" class="sub-menu rent" style="display:none;">
                  <li>免費</li>
                  <li>1000以下</li>
                  <li>2000以下</li>
                  <li>3000以下</li>
                  <li>5000以上</li>
                  <li>按日計費</li>
                  <li>按時計費</li>
                  <li>其他</li>
                </ul>
              </span>
            </div>
          </div>

          <div class="sun_srch_btm_filtr">
            <div class="row ml0 mr0">
              <div class="col-md-6 col-xs-6">
                <div class="form-group">
                  <input type="text" name="query" id="query" class="form-control" value="" autocomplete="off" placeholder="輸入詳細器材名稱">
                </div>
              </div>
              <div class="col-md-6 col-xs-6">
                <div class="form-group">
                  <select name="country" id="country" class="form-control">
                    <option value="all" selected="">國家: 任何</option>
                    <option value="0" selected="">選擇你所在的地區</option>
                    <option value="1">United States</option>
                    <option value="2">Canada</option>
                    <option value="3">Afghanistan</option>
                    <option value="4">Albania</option>
                    <option value="5">Algeria</option>
                    <option value="6">American Samoa</option>
                    <option value="7">Andorra</option>
                    <option value="8">Angola</option>
                    <option value="9">Anguilla</option>
                    <option value="10">Antarctica</option>
                    <option value="11">Antigua and/or Barbuda</option>
                    <option value="12">Argentina</option>
                    <option value="13">Armenia</option>
                    <option value="14">Aruba</option>
                    <option value="15">Australia</option>
                    <option value="16">Austria</option>
                    <option value="17">Azerbaijan</option>
                    <option value="18">Bahamas</option>
                    <option value="19">Bahrain</option>
                    <option value="20">Bangladesh</option>
                    <option value="21">Barbados</option>
                    <option value="22">Belarus</option>
                    <option value="23">Belgium</option>
                    <option value="24">Belize</option>
                    <option value="25">Benin</option>
                    <option value="26">Bermuda</option>
                    <option value="27">Bhutan</option>
                    <option value="28">Bolivia</option>
                    <option value="29">Bosnia and Herzegovina</option>
                    <option value="30">Botswana</option>
                    <option value="31">Bouvet Island</option>
                    <option value="32">Brazil</option>
                    <option value="34">Brunei Darussalam</option>
                    <option value="35">Bulgaria</option>
                    <option value="36">Burkina Faso</option>
                    <option value="37">Burundi</option>
                    <option value="38">Cambodia</option>
                    <option value="39">Cameroon</option>
                    <option value="40">Cape Verde</option>
                    <option value="41">Cayman Islands</option>
                    <option value="42">Central African Republic</option>
                    <option value="43">Chad</option>
                    <option value="44">Chile</option>
                    <option value="45">China</option>
                    <option value="46">Christmas Island</option>
                    <option value="47">Cocos (Keeling) Islands</option>
                    <option value="48">Colombia</option>
                    <option value="49">Comoros</option>
                    <option value="50">Congo</option>
                    <option value="51">Cook Islands</option>
                    <option value="52">Costa Rica</option>
                    <option value="53">Croatia (Hrvatska)</option>
                    <option value="54">Cuba</option>
                    <option value="55">Cyprus</option>
                    <option value="56">Czech Republic</option>
                    <option value="57">Denmark</option>
                    <option value="58">Djibouti</option>
                    <option value="59">Dominica</option>
                    <option value="60">Dominican Republic</option>
                    <option value="61">East Timor</option>
                    <option value="62">Ecuador</option>
                    <option value="63">Egypt</option>
                    <option value="64">El Salvador</option>
                    <option value="65">Equatorial Guinea</option>
                    <option value="66">Eritrea</option>
                    <option value="67">Estonia</option>
                    <option value="68">Ethiopia</option>
                    <option value="69">Falkland Islands (Malvinas)</option>
                    <option value="70">Faroe Islands</option>
                    <option value="71">Fiji</option>
                    <option value="72">Finland</option>
                    <option value="73">France</option>
                    <option value="74">France, Metropolitan</option>
                    <option value="75">French Guiana</option>
                    <option value="76">French Polynesia</option>
                    <option value="77">French Southern Territories</option>
                    <option value="78">Gabon</option>
                    <option value="79">Gambia</option>
                    <option value="80">Georgia</option>
                    <option value="81">Germany</option>
                    <option value="82">Ghana</option>
                    <option value="83">Gibraltar</option>
                    <option value="84">Greece</option>
                    <option value="85">Greenland</option>
                    <option value="86">Grenada</option>
                    <option value="87">Guadeloupe</option>
                    <option value="88">Guam</option>
                    <option value="89">Guatemala</option>
                    <option value="90">Guinea</option>
                    <option value="91">Guinea-Bissau</option>
                    <option value="92">Guyana</option>
                    <option value="93">Haiti</option>
                    <option value="94">Heard and Mc Donald Islands</option>
                    <option value="95">Honduras</option>
                    <option value="96">Hong Kong</option>
                    <option value="97">Hungary</option>
                    <option value="98">Iceland</option>
                    <option value="99">India</option>
                    <option value="100">Indonesia</option>
                    <option value="101">Iran (Islamic Republic of)</option>
                    <option value="102">Iraq</option>
                    <option value="103">Ireland</option>
                    <option value="104">Israel</option>
                    <option value="105">Italy</option>
                    <option value="106">Ivory Coast</option>
                    <option value="107">Jamaica</option>
                    <option value="108">Japan</option>
                    <option value="109">Jordan</option>
                    <option value="110">Kazakhstan</option>
                    <option value="111">Kenya</option>
                    <option value="112">Kiribati</option>
                    <option value="113">Korea, Democratic People's Republic of</option>
                    <option value="114">Korea, Republic of</option>
                    <option value="115">Kosovo</option>
                    <option value="116">Kuwait</option>
                    <option value="117">Kyrgyzstan</option>
                    <option value="118">Lao People's Democratic Republic</option>
                    <option value="119">Latvia</option>
                    <option value="120">Lebanon</option>
                    <option value="121">Lesotho</option>
                    <option value="122">Liberia</option>
                    <option value="123">Libyan Arab Jamahiriya</option>
                    <option value="124">Liechtenstein</option>
                    <option value="125">Lithuania</option>
                    <option value="126">Luxembourg</option>
                    <option value="127">Macau</option>
                    <option value="128">Macedonia</option>
                    <option value="129">Madagascar</option>
                    <option value="130">Malawi</option>
                    <option value="131">Malaysia</option>
                    <option value="132">Maldives</option>
                    <option value="133">Mali</option>
                    <option value="134">Malta</option>
                    <option value="135">Marshall Islands</option>
                    <option value="136">Martinique</option>
                    <option value="137">Mauritania</option>
                    <option value="138">Mauritius</option>
                    <option value="139">Mayotte</option>
                    <option value="140">Mexico</option>
                    <option value="141">Micronesia, Federated States of</option>
                    <option value="142">Moldova, Republic of</option>
                    <option value="143">Monaco</option>
                    <option value="144">Mongolia</option>
                    <option value="145">Montenegro</option>
                    <option value="146">Montserrat</option>
                    <option value="147">Morocco</option>
                    <option value="148">Mozambique</option>
                    <option value="149">Myanmar</option>
                    <option value="150">Namibia</option>
                    <option value="151">Nauru</option>
                    <option value="152">Nepal</option>
                    <option value="153">Netherlands</option>
                    <option value="154">Netherlands Antilles</option>
                    <option value="155">New Caledonia</option>
                    <option value="156">New Zealand</option>
                    <option value="157">Nicaragua</option>
                    <option value="158">Niger</option>
                    <option value="159">Nigeria</option>
                    <option value="160">Niue</option>
                    <option value="161">Norfork Island</option>
                    <option value="162">Northern Mariana Islands</option>
                    <option value="163">Norway</option>
                    <option value="164">Oman</option>
                    <option value="165">Pakistan</option>
                    <option value="166">Palau</option>
                    <option value="167">Panama</option>
                    <option value="168">Papua New Guinea</option>
                    <option value="169">Paraguay</option>
                    <option value="170">Peru</option>
                    <option value="171">Philippines</option>
                    <option value="172">Pitcairn</option>
                    <option value="173">Poland</option>
                    <option value="174">Portugal</option>
                    <option value="175">Puerto Rico</option>
                    <option value="176">Qatar</option>
                    <option value="177">Reunion</option>
                    <option value="178">Romania</option>
                    <option value="179">Russian Federation</option>
                    <option value="180">Rwanda</option>
                    <option value="181">Saint Kitts and Nevis</option>
                    <option value="182">Saint Lucia</option>
                    <option value="183">Saint Vincent and the Grenadines</option>
                    <option value="184">Samoa</option>
                    <option value="185">San Marino</option>
                    <option value="186">Sao Tome and Principe</option>
                    <option value="187">Saudi Arabia</option>
                    <option value="188">Senegal</option>
                    <option value="189">Serbia</option>
                    <option value="190">Seychelles</option>
                    <option value="191">Sierra Leone</option>
                    <option value="192">Singapore</option>
                    <option value="193">Slovakia</option>
                    <option value="194">Slovenia</option>
                    <option value="195">Solomon Islands</option>
                    <option value="196">Somalia</option>
                    <option value="197">South Africa</option>
                    <option value="198">South Georgia South Sandwich Islands</option>
                    <option value="199">Spain</option>
                    <option value="200">Sri Lanka</option>
                    <option value="201">St. Helena</option>
                    <option value="202">St. Pierre and Miquelon</option>
                    <option value="203">Sudan</option>
                    <option value="204">Suriname</option>
                    <option value="205">Svalbarn and Jan Mayen Islands</option>
                    <option value="206">Swaziland</option>
                    <option value="207">Sweden</option>
                    <option value="208">Switzerland</option>
                    <option value="209">Syrian Arab Republic</option>
                    <option value="210">Taiwan</option>
                    <option value="211">Tajikistan</option>
                    <option value="212">Tanzania, United Republic of</option>
                    <option value="213">Thailand</option>
                    <option value="214">Togo</option>
                    <option value="215">Tokelau</option>
                    <option value="216">Tonga</option>
                    <option value="217">Trinidad and Tobago</option>
                    <option value="218">Tunisia</option>
                    <option value="219">Turkey</option>
                    <option value="220">Turkmenistan</option>
                    <option value="221">Turks and Caicos Islands</option>
                    <option value="222">Tuvalu</option>
                    <option value="223">Uganda</option>
                    <option value="224">Ukraine</option>
                    <option value="225">United Arab Emirates</option>
                    <option value="226">United Kingdom</option>
                    <option value="227">United States minor outlying islands</option>
                    <option value="228">Uruguay</option>
                    <option value="229">Uzbekistan</option>
                    <option value="230">Vanuatu</option>
                    <option value="231">Vatican City State</option>
                    <option value="232">Venezuela</option>
                    <option value="233">Vietnam</option>
                    <option value="238">Yemen</option>
                    <option value="239">Yugoslavia</option>
                    <option value="240">Zaire</option>
                    <option value="241">Zambia</option>
                    <option value="242">Zimbabwe</option>
                  </select>
                </div>
              </div>
              <div class="">
              </div>
            </div>
            <div class="sun_srch_range">
              <div class="pp_mat_input">
                <input type="text" id="amount" class="agefilter_hide age_number" readonly="" style="display:none;">
              </div>
              <div class="form-group agefilter_hide" id="agefilter" style="display: none;">
                <div class="form-group">
                  <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                    <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 13.3333%; width: 53.3333%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 13.3333%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 66.6667%;"></span>
                  </div>
                  <input type="hidden" name="age_from" id="age_from" value="18">
                  <input type="hidden" name="age_to" id="age_to" value="50">
                </div>
              </div>
            </div>
          </div>

          <div class="sun_srch_btn text-center">
            <button type="submit" class="btn btn-primary">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z"></path>
              </svg> 搜尋 </button>
          </div>
        </form>
      </div>
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
              <img width="100" height="30" src="assets/img/logo.png" />
            </a>
          </h6><br><br>
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
            <a href="https://localhost/wowonder_social/Script/search?verified=all&status=all&filterbyage=no&query=&country=0&age_from=18&age_to=50">器材徵集</a>
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
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="https://mdbootstrap.com/bootstrap-tutorial/"> MDBootstrap.com</a>
    </div>
    <!-- Copyright -->

  </footer>





  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!-- <script type="text/javascript" src="js/popper.min.js"></script> -->
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript" src="js/custom.js"></script>



</body>

</html>

<script type="text/javascript">
  var VisibleMenu = ''; // 記錄目前顯示的子選單的 ID

  // 顯示或隱藏子選單
  function switchMenu(theMainMenu, theSubMenu, theEvent) {
    var SubMenu = document.getElementById(theSubMenu);
    if (SubMenu.style.display == 'none') { // 顯示子選單
      SubMenu.style.minWidth = theMainMenu.clientWidth; // 讓子選單的最小寬度與主選單相同 (僅為了美觀)
      SubMenu.style.display = 'block';
      hideMenu(); // 隱藏子選單
      VisibleMenu = theSubMenu;
    } else { // 隱藏子選單
      if (theEvent != 'MouseOver' || VisibleMenu != theSubMenu) {
        SubMenu.style.display = 'none';
        VisibleMenu = '';
      }
    }
  }

  // 隱藏子選單
  function hideMenu() {
    if (VisibleMenu != '') {
      document.getElementById(VisibleMenu).style.display = 'none';
    }
    VisibleMenu = '';
  }
</script>


<script>
  $(document).ready(function() {


    $(document).ready(function() {
      $(".loan > li ").click(function() {
        $(".loan_text").html($(this).html());
      });
    });

    $(document).ready(function() {
      $(".money_rang > li ").click(function() {
        $(".money_rang_text").html($(this).html());
      });
    });

    $(document).ready(function() {
      $(".brand > li ").click(function() {
        $(".brand_text").html($(this).html());
      });
    });

    $(document).ready(function() {
      $(".rent > li ").click(function() {
        $(".rent_text").html($(this).html());
      });
    });



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