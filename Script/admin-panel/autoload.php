<?php
$page  = 'dashboard';

$pages = array(
    'general-settings',
    'dashboard',
    'site-settings',
    'dashboard',
    'site-features',
    'amazon-settings',
    'email-settings',
    'social-login',
    'video-settings',
    'manage-languages',
    'add-language',
    'edit-lang',
    'manage-users',
    'manage-stories',
    'manage-profile-fields',
    'add-new-profile-field',
    'edit-profile-field',
    'manage-verification-reqeusts',
    'payment-reqeuests',
    'affiliates-settings',
    'referrals-list',
    'pro-memebers',
    'pro-settings',
    'pro-payments',
    'payment-settings',
    'manage-pages',
    'manage-groups',
    'manage-posts',
    'manage-articles',
    'manage-events',
    'manage-forum-sections',
    'manage-forum-forums',
    'manage-forum-threads',
    'manage-forum-messages',
    'create-new-section',
    'create-new-forum',
    'manage-movies',
    'add-new-movies',
    'manage-games',
    'add-new-game',
    'ads-settings',
    'manage-site-ads',
    'manage-user-ads',
    'manage-themes',
    'manage-site-design',
    'manage-announcements',
    'mailing-list',
    'mass-notifications',
    'ban-users',
    'generate-sitemap',
    'manage-invitation-keys',
    'backups',
    'manage-custom-pages',
    'add-new-custom-page',
    'edit-custom-page',
    'edit-terms-pages',
    'manage-reports',
    'push-notifications-system',
    'manage-api-access-keys',
    'verfiy-applications',
    'manage-updates',
    'changelog',
    'online-users',
    'custom-code',
    'manage-third-psites',
    'edit-movie',
    'auto-delete',
    'manage-gifts',
    'add-new-gift',
    'post-settings',
    'manage-stickers',
    'add-new-sticker',
    'manage-apps',
    'auto-friend',
    'fake-users',
    'manage-genders',
    'pages-categories',
    'groups-categories',
    'blogs-categories',
    'products-categories',
    'bank-receipts',
    'manage-currencies',
    'manage-colored-posts',
    'job-categories',
    'manage-fund',
    'manage-jobs',
    'auto-like',
    'auto-join'
);
$mod_pages = array('dashboard', 'post-settings', 'manage-stickers', 'manage-gifts', 'manage-users', 'online-users', 'manage-stories', 'manage-pages', 'manage-groups', 'manage-posts', 'manage-articles', 'manage-events', 'manage-forum-threads', 'manage-forum-messages', 'manage-movies', 'manage-games', 'add-new-game', 'manage-user-ads', 'manage-reports', 'manage-third-psites', 'edit-movie', 'bank-receipts', 'job-categories', 'manage-jobs');


if (!empty($_GET['page'])) {
    $page = Wo_Secure($_GET['page'], 0);
}
if ($page == 'dashboard') {
    Wo_GetOfflineTyping();
    //Wo_DelexpiredEnvents();
}
$wo['decode_android_v']  = $wo['config']['footer_background'];
$wo['decode_android_value']  = base64_decode('I2FhYQ==');

$wo['decode_android_n_v']  = $wo['config']['footer_background_n'];
$wo['decode_android_n_value']  = base64_decode('I2FhYQ==');

$wo['decode_ios_v']  = $wo['config']['footer_background_2'];
$wo['decode_ios_value']  = base64_decode('I2FhYQ==');

$wo['decode_windwos_v']  = $wo['config']['footer_text_color'];
$wo['decode_windwos_value']  = base64_decode('I2RkZA==');

if ($is_moderoter == true && $is_admin == false) {
    if (!in_array($page, $mod_pages)) {
        header("Location: " . Wo_SeoLink('index.php?link1=admin-cp'));
        exit();
    }
}
if (in_array($page, $pages)) {
    $page_loaded = Wo_LoadAdminPage("$page/content");
}
if (empty($page_loaded)) {
    header("Location: " . Wo_SeoLink('index.php?link1=admin-cp'));
    exit();
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin Panel | <?php echo $wo['config']['siteTitle']; ?></title>
    <link rel="icon" href="<?php echo $wo['config']['theme_url']; ?>/img/icon.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <script src="<?php echo Wo_LoadAdminLink('plugins/jquery/jquery.min.js'); ?>"></script>
    <link href="<?php echo Wo_LoadAdminLink('plugins/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?php echo Wo_LoadAdminLink('plugins/node-waves/waves.css'); ?>" rel="stylesheet" />
    <link href="<?php echo Wo_LoadAdminLink('plugins/animate-css/animate.css'); ?>" rel="stylesheet" />
    <link href="<?php echo Wo_LoadAdminLink('css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo Wo_LoadAdminLink('plugins/sweetalert/sweetalert.css'); ?>" rel="stylesheet" />
    <link href="<?php echo Wo_LoadAdminLink('css/themes/all-themes.css'); ?>" rel="stylesheet" />
    <link href="<?php echo Wo_LoadAdminLink('plugins/bootstrap-select/css/bootstrap-select.css'); ?>" rel="stylesheet" />
    <link href="<?php echo Wo_LoadAdminLink('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?php echo Wo_LoadAdminLink('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css'); ?>" rel="stylesheet">
    <script src="<?php echo Wo_LoadAdminLink('plugins/codemirror-5.30.0/lib/codemirror.js'); ?>"></script>
    <script src="<?php echo Wo_LoadAdminLink('plugins/codemirror-5.30.0/mode/css/css.js'); ?>"></script>
    <script src="<?php echo Wo_LoadAdminLink('plugins/jquery.form.min.js'); ?>"></script>
    <script src="<?php echo Wo_LoadAdminLink('plugins/codemirror-5.30.0/mode/javascript/javascript.js'); ?>"></script>
    <link href="<?php echo Wo_LoadAdminLink('plugins/codemirror-5.30.0/lib/codemirror.css'); ?>" rel="stylesheet">
    <link href="<?php echo $wo['config']['theme_url']; ?>/stylesheet/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="<?php echo Wo_LoadAdminLink('plugins/m-popup/jquery.magnific-popup.min.js'); ?>"></script>
    <link href="<?php echo Wo_LoadAdminLink('plugins/m-popup/magnific-popup.css'); ?>" rel="stylesheet">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script>
        function Wo_Ajax_Requests_File() {
            return "<?php echo $wo['config']['site_url'] . '/requests.php'; ?>"
        }
    </script>
</head>

<body class="theme-red">
    <input type="hidden" class="main_session" value="<?php echo Wo_CreateMainSession(); ?>">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo $wo['site_url']; ?>"><img width="120" height="47" class="align-items-start" src="<?php echo $wo['config']['theme_url']; ?>/img/logo.png" alt=""></a>
            </div>
            <div class="navbar-header pull-right">
                <div class="form-group form-float wo_admin_hdr_srch">
                    <div class="form-line">
                        <input type="text" id="search_for" name="search_for" class="form-control" onkeyup="searchInFiles($(this).val())" placeholder="Search Settings">
                    </div>
                    <div class="wo_admin_hdr_srch_reslts" id="search_for_bar"></div>
                </div>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo $wo['user']['avatar']; ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name">歡迎回來， <a href="<?php echo $wo['user']['url']; ?>" target="_blank"><?php echo $wo['user']['name']; ?></a></div>
                    <div class="name" style="font-size: 12px">登入類型為 <?php echo ($is_admin) ? '管理員' : 'Moderator' ?></div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li <?php echo ($page == 'dashboard') ? 'class="active"' : ''; ?>>
                        <a href="<?php echo Wo_LoadAdminLinkSettings(''); ?>">
                            <i class="material-icons">&#xE871</i>
                            <span>儀表板</span>
                        </a>
                    </li>
                    <?php if ($is_admin == true) { ?>
                        <li <?php echo ($page == 'general-settings' || $page == 'post-settings' || $page == 'site-settings' || $page == 'email-settings' || $page == 'social-login' || $page == 'site-features' || $page == 'amazon-settings' ||  $page == 'video-settings' || $page == 'payment-settings' || $page == 'manage-currencies' || $page == 'manage-colored-posts') ? 'class="active"' : ''; ?>>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">&#xE8b8</i>
                                <span>設定</span>
                            </a>
                            <ul class="ml-menu">
                                <li <?php echo ($page == 'general-settings') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('general-settings'); ?>">基本設定</a>
                                </li>
                                <li <?php echo ($page == 'site-settings') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('site-settings'); ?>">網站設定</a>
                                </li>
                                <li <?php echo ($page == 'site-features') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('site-features'); ?>">管理網站功能</a>
                                </li>
                                <li <?php echo ($page == 'email-settings') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('email-settings'); ?>">電子信箱 & 簡訊設定</a>
                                </li>
                                <li <?php echo ($page == 'video-settings') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('video-settings'); ?>">視訊 & 語音通話設定</a>
                                </li>
                                <li <?php echo ($page == 'social-login') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('social-login'); ?>">社群登入設定</a>
                                </li>
                                <li <?php echo ($page == 'payment-settings') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('payment-settings'); ?>">付款系統設定</a>
                                </li>
                                <li <?php echo ($page == 'manage-currencies') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('manage-currencies'); ?>">管理貨幣</a>
                                </li>
                                <li <?php echo ($page == 'amazon-settings') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('amazon-settings'); ?>">儲存空間設定</a>
                                </li>
                                <li <?php echo ($page == 'post-settings' || $page == 'manage-colored-posts') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('post-settings'); ?>">貼文設定</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if ($is_admin == true) { ?>
                        <li <?php echo ($page == 'manage-languages' || $page == 'add-language' || $page == 'edit-lang') ? 'class="active"' : ''; ?>>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">&#xE894</i>
                                <span>語言</span>
                            </a>
                            <ul class="ml-menu">
                                <li <?php echo ($page == 'add-language') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('add-language'); ?>">新增語言 & 關鍵字</a>
                                </li>
                                <li <?php echo ($page == 'manage-languages') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('manage-languages'); ?>">管理語言</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <li <?php echo ($page == 'manage-users' || $page == 'manage-stories' || $page == 'manage-profile-fields' || $page == 'add-new-profile-field' || $page == 'edit-profile-field' || $page == 'manage-verification-reqeusts' || $page == 'affiliates-settings' || $page == 'payment-reqeuests' || $page == 'referrals-list' || $page == 'online-users' || $page == 'manage-genders') ? 'class="active"' : ''; ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">&#xE853</i>
                            <span>用戶</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php echo ($page == 'manage-users') ? 'class="active"' : ''; ?>>
                                <a href="<?php echo Wo_LoadAdminLinkSettings('manage-users'); ?>">管理用戶列表</a>
                            </li>
                            <li <?php echo ($page == 'online-users') ? 'class="active"' : ''; ?>>
                                <a href="<?php echo Wo_LoadAdminLinkSettings('online-users'); ?>">線上用戶列表</a>
                            </li>
                            <li <?php echo ($page == 'manage-stories') ? 'class="active"' : ''; ?>>
                                <a href="<?php echo Wo_LoadAdminLinkSettings('manage-stories'); ?>">管理用戶歷史/狀態</a>
                            </li>
                            <?php if ($is_admin == true) { ?>
                                <li <?php echo ($page == 'manage-profile-fields') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('manage-profile-fields'); ?>">管理自定義文件欄位</a>
                                </li>
                            <?php } ?>
                            <?php if ($is_admin == true) { ?>
                                <li <?php echo ($page == 'manage-verification-reqeusts') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('manage-verification-reqeusts'); ?>">管理驗證請求</a>
                                </li>
                            <?php } ?>
                            <?php if ($is_admin == true) { ?>
                                <li <?php echo ($page == 'affiliates-settings' || $page == 'payment-reqeuests' || $page == 'referrals-list') ? 'class="active"' : ''; ?>>
                                    <a href="javascript:void(0);" class="menu-toggle">會員系統</a>
                                    <ul class="ml-menu">
                                        <li <?php echo ($page == 'affiliates-settings') ? 'class="active"' : ''; ?>>
                                            <a href="<?php echo Wo_LoadAdminLinkSettings('affiliates-settings'); ?>">
                                                <span>會員系統設定</span>
                                            </a>
                                        </li>
                                        <li <?php echo ($page == 'payment-reqeuests') ? 'class="active"' : ''; ?>>
                                            <a href="<?php echo Wo_LoadAdminLinkSettings('payment-reqeuests'); ?>">
                                                <span>付款請求</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>
                            <?php if ($is_admin == true) { ?>
                                <li <?php echo ($page == 'manage-genders') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('manage-genders'); ?>">管理性別</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php if ($is_admin == true) { ?>
                        <li <?php echo ($page == 'pro-settings' || $page == 'pro-memebers' || $page == 'pro-payments') ? 'class="active"' : ''; ?>>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">&#xE8d0</i>
                                <span>高級會員系統</span>
                            </a>
                            <ul class="ml-menu">
                                <li <?php echo ($page == 'pro-settings') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('pro-settings'); ?>">高級會員系統設置</a>
                                </li>
                                <li <?php echo ($page == 'pro-payments') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('pro-payments'); ?>">管理金流</a>
                                </li>
                                <li <?php echo ($page == 'pro-memebers') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('pro-memebers'); ?>">管理高級會員清單</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <li <?php echo ($page == 'manage-apps' || $page == 'manage-pages' || $page == 'manage-stickers' || $page == 'add-new-sticker' || $page == 'manage-gifts' || $page == 'add-new-gift' || $page == 'manage-groups' || $page == 'manage-posts' || $page == 'manage-articles' || $page == 'manage-events' ||  $page == 'manage-forum-sections' || $page == 'manage-forum-forums' || $page == 'manage-forum-threads' || $page == 'manage-forum-messages' || $page == 'create-new-forum' || $page == 'create-new-section' || $page == 'manage-movies' || $page == 'add-new-movies' || $page == 'manage-games' || $page == 'add-new-game' || $page == 'edit-movie' || $page == 'pages-categories' || $page == 'groups-categories' || $page == 'blogs-categories' || $page == 'products-categories' || $page == 'manage-fund' || $page == 'manage-jobs') ? 'class="active"' : ''; ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">&#xE8e9</i>
                            <span>管理功能</span>
                        </a>
                        <ul class="ml-menu">
                            <!-- <li <?php echo ($page == 'manage-colored-posts') ? 'class="active"' : ''; ?>>
                                <a href="<?php echo Wo_LoadAdminLinkSettings('manage-colored-posts'); ?>">Manage Colored Posts</a>
                            </li> -->
                            <li <?php echo ($page == 'manage-apps') ? 'class="active"' : ''; ?>>
                                <a href="<?php echo Wo_LoadAdminLinkSettings('manage-apps'); ?>">應用</a>
                            </li>
                            <li <?php echo ($page == 'manage-pages') ? 'class="active"' : ''; ?>>
                                <a href="<?php echo Wo_LoadAdminLinkSettings('manage-pages'); ?>">頁面</a>
                            </li>
                            <li <?php echo ($page == 'manage-groups') ? 'class="active"' : ''; ?>>
                                <a href="<?php echo Wo_LoadAdminLinkSettings('manage-groups'); ?>">群組</a>
                            </li>
                            <li <?php echo ($page == 'manage-posts') ? 'class="active"' : ''; ?>>
                                <a href="<?php echo Wo_LoadAdminLinkSettings('manage-posts'); ?>">貼文</a>
                            </li>
                            <li <?php echo ($page == 'manage-fund') ? 'class="active"' : ''; ?>>
                                <a href="<?php echo Wo_LoadAdminLinkSettings('manage-fund'); ?>">資金來源</a>
                            </li>
                            <li <?php echo ($page == 'manage-jobs') ? 'class="active"' : ''; ?>>
                                <a href="<?php echo Wo_LoadAdminLinkSettings('manage-jobs'); ?>">工作</a>
                            </li>
                            <li <?php echo ($page == 'manage-articles') ? 'class="active"' : ''; ?>>
                                <a href="<?php echo Wo_LoadAdminLinkSettings('manage-articles'); ?>">文章（部落格）</a>
                            </li>
                            <li <?php echo ($page == 'manage-events') ? 'class="active"' : ''; ?>>
                                <a href="<?php echo Wo_LoadAdminLinkSettings('manage-events'); ?>">大事記</a>
                            </li>
                            <!-- <li <?php echo ($page == 'manage-forum-sections' || $page == 'manage-forum-forums' || $page == 'manage-forum-threads' || $page == 'manage-forum-messages' || $page == 'create-new-forum' || $page == 'create-new-section') ? 'class="active"' : ''; ?>>
                                <a href="javascript:void(0);" class="menu-toggle">論壇</a>
                                <ul class="ml-menu">
                                    <?php if ($is_admin == true) { ?>
                                    <li <?php echo ($page == 'manage-forum-sections') ? 'class="active"' : ''; ?>>
                                        <a href="<?php echo Wo_LoadAdminLinkSettings('manage-forum-sections'); ?>">
                                            <span>管理論壇單元</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php if ($is_admin == true) { ?>
                                    <li <?php echo ($page == 'manage-forum-forums') ? 'class="active"' : ''; ?>>
                                        <a href="<?php echo Wo_LoadAdminLinkSettings('manage-forum-forums'); ?>">
                                            <span>管理論壇</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <li <?php echo ($page == 'manage-forum-threads') ? 'class="active"' : ''; ?>>
                                        <a href="<?php echo Wo_LoadAdminLinkSettings('manage-forum-threads'); ?>">
                                            <span>Manage Threads</span>
                                        </a>
                                    </li>
                                    <li <?php echo ($page == 'manage-forum-messages') ? 'class="active"' : ''; ?>>
                                        <a href="<?php echo Wo_LoadAdminLinkSettings('manage-forum-messages'); ?>">
                                            <span>Manage Replies</span>
                                        </a>
                                    </li>
                                    <?php if ($is_admin == true) { ?>
                                    <li <?php echo ($page == 'create-new-section') ? 'class="active"' : ''; ?>>
                                        <a href="<?php echo Wo_LoadAdminLinkSettings('create-new-section'); ?>">
                                            <span>Create New Section</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php if ($is_admin == true) { ?>
                                    <li <?php echo ($page == 'create-new-forum') ? 'class="active"' : ''; ?>>
                                        <a href="<?php echo Wo_LoadAdminLinkSettings('create-new-forum'); ?>">
                                            <span>Create New Forum</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li> -->

                            <li <?php echo ($page == 'manage-movies' || $page == 'add-new-movies') ? 'class="active"' : ''; ?>>
                                <a href="javascript:void(0);" class="menu-toggle">電影</a>
                                <ul class="ml-menu">
                                    <li <?php echo ($page == 'manage-movies') ? 'class="active"' : ''; ?>>
                                        <a href="<?php echo Wo_LoadAdminLinkSettings('manage-movies'); ?>">
                                            <span>管理電影清單</span>
                                        </a>
                                    </li>
                                    <?php if ($is_admin == true) { ?>
                                        <li <?php echo ($page == 'add-new-movies') ? 'class="active"' : ''; ?>>
                                            <a href="<?php echo Wo_LoadAdminLinkSettings('add-new-movies'); ?>">
                                                <span>新增電影</span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>

                            <li <?php echo ($page == 'manage-games' || $page == 'add-new-game') ? 'class="active"' : ''; ?>>
                                <a href="javascript:void(0);" class="menu-toggle">遊戲</a>
                                <ul class="ml-menu">
                                    <li <?php echo ($page == 'manage-games') ? 'class="active"' : ''; ?>>
                                        <a href="<?php echo Wo_LoadAdminLinkSettings('manage-games'); ?>">
                                            <span>管理遊戲清單</span>
                                        </a>
                                    </li>
                                    <li <?php echo ($page == 'add-new-game') ? 'class="active"' : ''; ?>>
                                        <a href="<?php echo Wo_LoadAdminLinkSettings('add-new-game'); ?>">
                                            <span>新增遊戲</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li <?php echo ($page == 'pages-categories' || $page == 'groups-categories' || $page == 'blogs-categories' || $page == 'products-categories') ? 'class="active"' : ''; ?>>
                                <a href="javascript:void(0);" class="menu-toggle">分類目錄</a>
                                <ul class="ml-menu">
                                    <li <?php echo ($page == 'pages-categories') ? 'class="active"' : ''; ?>>
                                        <a href="<?php echo Wo_LoadAdminLinkSettings('pages-categories'); ?>">
                                            <span>頁面類別</span>
                                        </a>
                                    </li>
                                    <li <?php echo ($page == 'groups-categories') ? 'class="active"' : ''; ?>>
                                        <a href="<?php echo Wo_LoadAdminLinkSettings('groups-categories'); ?>">
                                            <span>群組類別</span>
                                        </a>
                                    </li>
                                    <li <?php echo ($page == 'blogs-categories') ? 'class="active"' : ''; ?>>
                                        <a href="<?php echo Wo_LoadAdminLinkSettings('blogs-categories'); ?>">
                                            <span>部落格類別</span>
                                        </a>
                                    </li>
                                    <li <?php echo ($page == 'products-categories') ? 'class="active"' : ''; ?>>
                                        <a href="<?php echo Wo_LoadAdminLinkSettings('products-categories'); ?>">
                                            <span>產品分類</span>
                                        </a>
                                    </li>
                                    <li <?php echo ($page == 'job-categories') ? 'class="active"' : ''; ?>>
                                        <a href="<?php echo Wo_LoadAdminLinkSettings('job-categories'); ?>">
                                            <span>工作類別</span>
                                        </a>
                                    </li>



                                </ul>
                            </li>

                            <?php if ($wo['config']['gift_system'] == 1) { ?>
                                <li <?php echo ($page == 'manage-gifts' || $page == 'add-new-gift') ? 'class="active"' : ''; ?>>
                                    <a href="javascript:void(0);" class="menu-toggle">贈禮設定</a>
                                    <ul class="ml-menu">
                                        <li <?php echo ($page == 'manage-gifts') ? 'class="active"' : ''; ?>>
                                            <a href="<?php echo Wo_LoadAdminLinkSettings('manage-gifts'); ?>">
                                                <span>管理贈禮</span>
                                            </a>
                                        </li>
                                        <li <?php echo ($page == 'add-new-gift') ? 'class="active"' : ''; ?>>
                                            <a href="<?php echo Wo_LoadAdminLinkSettings('add-new-gift'); ?>">
                                                <span>添加新禮物類型</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>

                            <?php if ($wo['config']['stickers_system'] == 1) { ?>
                                <li <?php echo ($page == 'manage-stickers' || $page == 'add-new-sticker') ? 'class="active"' : ''; ?>>
                                    <a href="javascript:void(0);" class="menu-toggle">聊天貼圖</a>
                                    <ul class="ml-menu">
                                        <li <?php echo ($page == 'manage-stickers') ? 'class="active"' : ''; ?>>
                                            <a href="<?php echo Wo_LoadAdminLinkSettings('manage-stickers'); ?>">
                                                <span>管理貼圖</span>
                                            </a>
                                        </li>
                                        <li <?php echo ($page == 'add-new-sticker') ? 'class="active"' : ''; ?>>
                                            <a href="<?php echo Wo_LoadAdminLinkSettings('add-new-sticker'); ?>">
                                                <span>增加新貼圖</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>

                        </ul>
                    </li>
                    <li <?php echo ($page == 'bank-receipts') ? 'class="active"' : ''; ?>>
                        <a href="<?php echo Wo_LoadAdminLinkSettings('bank-receipts'); ?>">
                            <i class="material-icons">&#xE870</i>
                            <span>管理銀行收據</span>
                        </a>
                    </li>
                    <li <?php echo ($page == 'ads-settings' || $page == 'manage-site-ads' || $page == 'manage-user-ads') ? 'class="active"' : ''; ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">&#xE227</i>
                            <span>廣告</span>
                        </a>
                        <ul class="ml-menu">
                            <?php if ($is_admin == true) { ?>
                                <li <?php echo ($page == 'ads-settings') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('ads-settings'); ?>">廣告系統設定</a>
                                </li>
                            <?php } ?>
                            <?php if ($is_admin == true) { ?>
                                <li <?php echo ($page == 'manage-site-ads') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('manage-site-ads'); ?>">網站廣告管理</a>
                                </li>
                            <?php } ?>
                            <li <?php echo ($page == 'manage-user-ads') ? 'class="active"' : ''; ?>>
                                <a href="<?php echo Wo_LoadAdminLinkSettings('manage-user-ads'); ?>">用戶廣告管理</a>
                            </li>
                        </ul>
                    </li>
                    <?php if ($is_admin == true) { ?>
                        <li <?php echo ($page == 'manage-themes' || $page == 'manage-site-design' || $page == 'custom-code') ? 'class="active"' : ''; ?>>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">&#xE3b7</i>
                                <span>設計</span>
                            </a>
                            <ul class="ml-menu">
                                <li <?php echo ($page == 'manage-themes') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('manage-themes'); ?>">主題</a>
                                </li>
                                <li <?php echo ($page == 'manage-site-design') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('manage-site-design'); ?>">變更網站設計</a>
                                </li>
                                <li <?php echo ($page == 'custom-code') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('custom-code'); ?>">自定義 JS / CSS</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if ($is_admin == true) { ?>
                        <li <?php echo ($page == 'manage-announcements' || $page == 'mailing-list' || $page == 'mass-notifications' || $page == 'ban-users' || $page == 'generate-sitemap' || $page == 'manage-invitation-keys' || $page == 'backups' || $page == 'auto-delete' || $page == 'auto-friend' || $page == 'fake-users' || $page == 'auto-like' || $page == 'auto-join') ? 'class="active"' : ''; ?>>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">&#xE869</i>
                                <span>工具</span>
                            </a>
                            <ul class="ml-menu">
                                <li <?php echo ($page == 'manage-announcements') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('manage-announcements'); ?>">公告內容</a>
                                </li>
                                <li <?php echo ($page == 'auto-delete') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('auto-delete'); ?>">自動刪除數據</a>
                                </li>
                                <li <?php echo ($page == 'auto-friend') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('auto-friend'); ?>">自動交友</a>
                                </li>
                                <li <?php echo ($page == 'auto-like') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('auto-like'); ?>">自動新增喜好頁面</a>
                                </li>
                                <li <?php echo ($page == 'auto-join') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('auto-join'); ?>">自動加入群組</a>
                                </li>
                                <li <?php echo ($page == 'fake-users') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('fake-users'); ?>">假帳號產生器</a>
                                </li>

                                <li <?php echo ($page == 'mailing-list') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('mailing-list'); ?>">用戶發信系統</a>
                                </li>
                                <li <?php echo ($page == 'mass-notifications') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('mass-notifications'); ?>">大量通知用戶系統</a>
                                </li>
                                <li <?php echo ($page == 'ban-users') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('ban-users'); ?>">黑名單</a>
                                </li>
                                <li <?php echo ($page == 'generate-sitemap') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('generate-sitemap'); ?>">產生網站地圖</a>
                                </li>
                                <li <?php echo ($page == 'manage-invitation-keys') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('manage-invitation-keys'); ?>">邀請碼</a>
                                </li>
                                <li <?php echo ($page == 'backups') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('backups'); ?>">備份SQL檔 & 文件</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if ($is_admin == true) { ?>
                        <li <?php echo ($page == 'edit-terms-pages' || $page == 'manage-custom-pages' || $page == 'add-new-custom-page' || $page == 'edit-custom-page') ? 'class="active"' : ''; ?>>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">&#xE873</i>
                                <span>頁面</span>
                            </a>
                            <ul class="ml-menu">
                                <li <?php echo ($page == 'manage-custom-pages') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('manage-custom-pages'); ?>">管理自定義頁面</a>
                                </li>
                                <li <?php echo ($page == 'edit-terms-pages') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('edit-terms-pages'); ?>">編輯條款頁面</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <li <?php echo ($page == 'manage-reports') ? 'class="active"' : ''; ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">&#xE002</i>
                            <span>報表</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php echo ($page == 'manage-reports') ? 'class="active"' : ''; ?>>
                                <a href="<?php echo Wo_LoadAdminLinkSettings('manage-reports'); ?>">管理報表</a>
                            </li>
                        </ul>
                    </li>
                    <?php if ($is_admin == true) { ?>
                        <li <?php echo ($page == 'verfiy-applications' || $page == 'push-notifications-system' || $page == 'manage-api-access-keys' || $page == 'manage-third-psites') ? 'class="active"' : ''; ?>>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">&#xE915</i>
                                <span>API 設定</span>
                            </a>
                            <ul class="ml-menu">
                                <li <?php echo ($page == 'manage-api-access-keys') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('manage-api-access-keys'); ?>">管理API伺服器金鑰</a>
                                </li>
                                <li <?php echo ($page == 'push-notifications-system') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('push-notifications-system'); ?>">推送通知設置</a>
                                </li>
                                <li <?php echo ($page == 'verfiy-applications') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('verfiy-applications'); ?>">認證碼申請</a>
                                </li>
                                <li <?php echo ($page == 'manage-third-psites') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('manage-third-psites'); ?>">第三方腳本</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if ($is_admin == true) { ?>
                        <li <?php echo ($page == 'manage-updates') ? 'class="active"' : ''; ?>>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">&#xE2c0</i>
                                <span>網站更新</span>
                            </a>
                            <ul class="ml-menu">
                                <li <?php echo ($page == 'manage-updates') ? 'class="active"' : ''; ?>>
                                    <a href="<?php echo Wo_LoadAdminLinkSettings('manage-updates'); ?>">更新 & 錯誤修復</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if ($is_admin == true) { ?>
                        <li <?php echo ($page == 'changelog') ? 'class="active"' : ''; ?>>
                            <a href="<?php echo Wo_LoadAdminLinkSettings('changelog'); ?>">
                                <i class="material-icons">&#xE923</i>
                                <span>更新紀錄</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($is_admin == true) { ?>
                        <li>
                            <a href="http://docs.wowonder.com/#faq" target="_blank">
                                <i class="material-icons">&#xE5d4</i>
                                <span>常見問題</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    Copyright &copy; <?php echo date('Y') ?> <a href="javascript:void(0);"><?php echo $wo['config']['siteName'] ?></a>.
                </div>
                <div class="version">
                    <b>版本： </b> <?php echo $wo['script_version'] ?>
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <?php if (is_dir('install')) { ?>
                <div class="alert alert-danger">
                    <i class="fa fa-fw fa-exclamation-triangle"></i> <strong>Risk:</strong> Please delete the ./install folder for security reasons.
                </div>
            <?php } ?>
            <?php
            $warnings = Wo_GetScriptWarnings();
            if (!empty($warnings)) {
                foreach ($warnings as $key => $value1) { ?>
                    <div class="alert alert-warning">
                        <i class="fa fa-fw fa-exclamation-circle"></i>
                        <?php
                                if ($key == "STRICT_TRANS_TABLES") {
                                    echo "<strong>Warning:</strong> The sql-mode <b>STRICT_TRANS_TABLES</b> is enabled in your mysql server, please contact your host provider to disable it.";
                                }
                                if ($key == "STRICT_ALL_TABLES") {
                                    echo "<strong>Warning:</strong> The sql-mode <b>STRICT_ALL_TABLES</b> is enabled in your mysql server, please contact your host provider to disable it.";
                                }
                                if ($key == "safe_mode") {
                                    echo "<strong>Warning:</strong> The php-mode <b>safe_mode</b> is enabled in your server, please contact your host provider to disable it.";
                                }
                                if ($key == "allow_url_fopen") {
                                    echo "<strong>Warning:</strong> The php-extension <b>allow_url_fopen</b> is disabled in your server, please contact your host provider to enable it.";
                                }
                                if ($key == 'update_file') {
                                    echo "<strong>Important:</strong> The file <b>update.php</b> is uploaded and not run yet, <a href='" . $wo['config']['site_url'] . "/update.php' style='color:#fff; text-decoration:underline;'>Click Here</a> to update the script to v" . $wo['script_version'];
                                }
                                ?>
                    </div>
            <?php }
            }
            ?>
        </div>
        <?php echo $page_loaded; ?>
    </section>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo Wo_LoadAdminLink('plugins/bootstrap/js/bootstrap.js'); ?>"></script>

    <script src="<?php echo Wo_LoadAdminLink('plugins/jquery-datatable/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo Wo_LoadAdminLink('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js'); ?>"></script>
    <script src="<?php echo Wo_LoadAdminLink('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo Wo_LoadAdminLink('plugins/jquery-datatable/extensions/export/buttons.flash.min.js'); ?>"></script>
    <script src="<?php echo Wo_LoadAdminLink('plugins/jquery-datatable/extensions/export/jszip.min.js'); ?>"></script>
    <script src="<?php echo Wo_LoadAdminLink('plugins/jquery-datatable/extensions/export/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo Wo_LoadAdminLink('plugins/jquery-datatable/extensions/export/vfs_fonts.js'); ?>"></script>
    <script src="<?php echo Wo_LoadAdminLink('plugins/jquery-datatable/extensions/export/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo Wo_LoadAdminLink('plugins/jquery-datatable/extensions/export/buttons.print.min.js'); ?>"></script>
    <script src="<?php echo Wo_LoadAdminLink('js/pages/tables/jquery-datatable.js'); ?>"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo Wo_LoadAdminLink('plugins/bootstrap-select/js/bootstrap-select.js'); ?>"></script>
    <script src="<?php echo Wo_LoadAdminLink('plugins/sweetalert/sweetalert.min.js'); ?>"></script>

    <!-- ColorPicker Plugin Js -->
    <script src="<?php echo Wo_LoadAdminLink('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js'); ?>"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo Wo_LoadAdminLink('plugins/jquery-slimscroll/jquery.slimscroll.js'); ?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo Wo_LoadAdminLink('plugins/node-waves/waves.js'); ?>"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo Wo_LoadAdminLink('plugins/jquery-countto/jquery.countTo.js'); ?>"></script>

    <!-- Custom Js -->
    <script src="<?php echo Wo_LoadAdminLink('js/admin.js'); ?>"></script>
    <script src="<?php echo Wo_LoadAdminLink('js/pages/index.js'); ?>"></script>
</body>

</html>
<style>
    .sidebar .user-info {
        background-size: cover;
    }

    .theme-red .sidebar .menu .list li.active> :first-child i,
    .theme-red .sidebar .menu .list li.active> :first-child span {
        color: <?php echo $wo['config']['btn_background_color'] ?>;
    }

    .theme-red .navbar {
        background: <?php echo $wo['config']['header_background'] ?>;
    }

    .sidebar .user-info {
        background: <?php echo $wo['config']['btn_background_color'] ?> !important;
    }

    [type="radio"]:checked+label:after,
    [type="radio"].with-gap:checked+label:after {
        background-color: <?php echo $wo['config']['btn_background_color'] ?> !important;
    }

    [type="radio"]:checked+label:after,
    [type="radio"].with-gap:checked+label:before,
    [type="radio"].with-gap:checked+label:after {
        border: 2px solid <?php echo $wo['config']['btn_background_color'] ?> !important;
    }

    .btn-primary,
    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary:focus {
        background-color: <?php echo $wo['config']['btn_background_color'] ?> !important;
    }

    .sidebar .user-info {
        height: 135px !important;
    }

    .sidebar .menu .list .ml-menu span {
        margin: 0 !important;
    }

    .sidebar .menu .list .ml-menu li.active a.toggled:not(.menu-toggle):before,
    .sidebar .menu .list .ml-menu li.active a.toggled:not(.menu-toggle),
    .theme-red .sidebar .legal .copyright a {
        color: <?php echo $wo['config']['btn_background_color'] ?> !important;
    }

    .spinner-layer.pl-red {
        border-color: <?php echo $wo['config']['btn_background_color'] ?>;
    }
</style>

<script>
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover();
        var hash = $('.main_session').val();
        $.ajaxSetup({
            data: {
                hash: hash
            },
            cache: false
        });


    });



    function searchInFiles(keyword) {
        if (keyword.length > 2) {
            $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=search_in_pages', {
                keyword: keyword
            }, function(data, textStatus, xhr) {
                if (data.html != '') {
                    $('#search_for_bar').html(data.html)
                } else {
                    $('#search_for_bar').html('')
                }
            });
        } else {
            $('#search_for_bar').html('')
        }
    }
    $(window).load(function() {
        jQuery.fn.highlight = function(str, className) {
            if (str != '') {
                var aTags = document.getElementsByTagName("h2");
                var bTags = document.getElementsByTagName("label");
                var searchText = str.toLowerCase();

                if (aTags.length > 0) {
                    for (var i = 0; i < aTags.length; i++) {
                        var tag_text = aTags[i].textContent.toLowerCase();
                        if (tag_text.indexOf(searchText) != -1) {
                            $(aTags[i]).addClass(className)
                        }
                    }
                }

                if (bTags.length > 0) {
                    for (var i = 0; i < bTags.length; i++) {
                        var tag_text = bTags[i].textContent.toLowerCase();
                        if (tag_text.indexOf(searchText) != -1) {
                            $(bTags[i]).addClass(className)
                        }
                    }
                }
            }
        };
        jQuery.fn.highlight("<?php echo (!empty($_GET['highlight']) ? $_GET['highlight'] : '') ?>", 'highlight_text');
    });

    window.onbeforeunload = function() {
        var scrollPos;
        if (typeof window.pageYOffset != 'undefined') {
            scrollPos = window.pageYOffset;
        } else if (typeof document.compatMode != 'undefined' && document.compatMode != 'BackCompat') {
            scrollPos = document.documentElement.scrollTop;
        } else if (typeof document.body != 'undefined') {
            scrollPos = document.body.scrollTop;
        }
        document.cookie = "scrollTop=" + scrollPos; //儲存滾動條位置到cookies中
    }

    window.onload = function() {
        if (document.cookie.match(/scrollTop=([^;]+)(;|$)/) != null) {
            var arr = document.cookie.match(/scrollTop=([^;]+)(;|$)/); //cookies中不為空,則讀取滾動條位置
            document.documentElement.scrollTop = parseInt(arr[1]);
            document.body.scrollTop = parseInt(arr[1]);
        }
    }
</script>