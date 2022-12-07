<?php
require _APP.'dao/category.php';
$oCategory = new CategoryDAO;
require _APP.'dao/comment.php';
$oComment = new CommentDAO;
require _APP.'dao/configure.php';
$oConfigure = new ConfigureDAO;
require _APP.'dao/content.php';
$oContent = new ContentDAO;
require _APP.'dao/gallery.php';
$oGallery = new GalleryDAO;
require _APP.'dao/html.php';
$oHtml = new HtmlDAO;
require _APP.'dao/language.php';
$oLanguage = new LanguageDAO;
require _APP.'dao/option.php';
$oOption = new OptionDAO;
require _APP.'dao/user.php';
$oUser = new UserDAO;
?>