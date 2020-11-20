<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="<?php $this->options->charset(); ?>">
  <title><?php $this->archiveTitle(array(
    'category'  =>  _t('分类 %s 下的文章'),
    'search'    =>  _t('包含关键字 %s 的文章'),
    'tag'       =>  _t('标签 %s 下的文章'),
    'author'    =>  _t('%s 发布的文章')
  ), '', ' - '); ?><?php $this->options->title(); ?><?php if ($this->is('index')): ?><?php endif; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="copyright" content="webstack_zmki_0.7.19_www.zmki.cn">
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Arimo:400,700,400italic">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/fonts/linecons/css/linecons.css'); ?>"> 
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/bootstrap.css'); ?>">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/xenon-core.css'); ?>">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/xenon-components.css'); ?>">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/xenon-skins.css'); ?>">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/nav.css'); ?>">
  <link rel="stylesheet" href="https://at.alicdn.com/t/font_1627571_5r5ttgth8yq.css"> 
  <script src="https://at.alicdn.com/t/font_1627571_5r5ttgth8yq.js"></script>
  <script src="//libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/icon.png">  
  <?php $this->header(); ?>
 <!--* @version 4.0 _zmki0.7.19 -->
</head> 
<body class="page-body <?php echo($_COOKIE['night'] == '1' ? 'night' : ''); ?>">
    <!-- skin-white -->
<div class="page-container">