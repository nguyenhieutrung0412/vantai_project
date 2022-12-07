<?php
require _APP.'dao/category.php';
$oCategory = new CategoryDAO($configure_mod);
require _APP.'dao/content.php';
$oContent = new ContentDAO($configure_mod);
require _APP.'dao/gallery.php';
$oGallery = new GalleryDAO($configure_mod);
require _APP.'dao/html.php';
$oHtml = new HtmlDAO($configure_mod);
require _APP.'dao/option.php';
$oOption = new OptionDAO($configure_mod);
?>