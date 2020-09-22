<?php
if ($wo['loggedin'] == false) {
  header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
  exit();
}
if ($wo['loggedin'] == true) {
	if (!empty($_COOKIE['last_sidebar_update'])) {
        if ($_COOKIE['last_sidebar_update'] < (time() - 120)) {
            Wo_CleanCache();
        }
    }
}

$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'blog';
$wo['title']       = $wo['config']['siteTitle'];
$wo['content']     = Wo_LoadPage('blog/blog');