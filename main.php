<?php
/**
 * DokuWiki Default Template
 *
 * This is the template you need to change for the overall look
 * of DokuWiki.
 *
 * You should leave the doctype at the very top - It should
 * always be the very first line of a document.
 *
 * @link   http://dokuwiki.org/templates
 * @author Andreas Gohr <andi@splitbrain.org>
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']; ?>"
 lang="<?php echo $conf['lang']; ?>" dir="<?php echo $lang['direction']; ?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>
    <?php tpl_pagetitle(); ?>
    [<?php echo strip_tags($conf['title']); ?>]
  </title>

  <?php tpl_metaheaders(); ?>

  <link rel="shortcut icon" href="<?php echo DOKU_TPL?>images/favicon.ico" />

  <?php /*old includehook*/ @include(dirname(__FILE__).'/meta.html'); ?>
</head>

<body>
<?php /*old includehook*/ @include(dirname(__FILE__).'/topheader.html'); ?>
<div class="dokuwiki">
  <?php html_msgarea(); ?>

  <div class="stylehead">

    <div class="header">
      <div class="pagename">
        [[<?php tpl_link(wl($ID,'do=backlink'),tpl_pagetitle($ID,true),'title="'.$lang['btn_backlink'].'"'); ?>]]
      </div>
      <div class="logo">
        <?php tpl_link(wl(),$conf['title'],'name="dokuwiki__top" id="dokuwiki__top" accesskey="h" title="[H]"'); ?>
      </div>

      <div class="clearer"></div>
    </div>

    <?php /*old includehook*/ @include(dirname(__FILE__).'/header.html'); ?>

    <div class="bar" id="bar__top">
      <div class="bar-left" id="bar__topleft">
        <?php tpl_button('edit'); ?>
        <?php tpl_button('history'); ?>
      </div>

      <div class="bar-right" id="bar__topright">
        <?php tpl_button('recent'); ?>
        <?php tpl_searchform(); ?>&nbsp;
      </div>

      <div class="clearer"></div>
    </div>

    <?php if($conf['breadcrumbs']){?>
    <div class="breadcrumbs">
      <?php tpl_breadcrumbs()?>
      <?php //tpl_youarehere(); //(some people prefer this)?>
    </div>
    <?php }?>

    <?php if($conf['youarehere']){?>
    <div class="breadcrumbs">
      <?php tpl_youarehere(); ?>
    </div>
    <?php }?>

  </div>
  <?php flush(); ?>

  <?php /*old includehook*/ @include(dirname(__FILE__).'/pageheader.html'); ?>

  <div class="page">
    <!-- wikipage start -->
    <?php tpl_content(); ?>
    <!-- wikipage stop -->
  </div>

  <div class="clearer">&nbsp;</div>

  <?php flush(); ?>

  <div class="stylefoot">

    <div class="meta">
      <div class="user">
        <?php tpl_userinfo(); ?>
      </div>
      <div class="doc">
        <?php tpl_pageinfo(); ?>
      </div>
    </div>

   <?php /*old includehook*/ @include(dirname(__FILE__).'/pagefooter.html'); ?>

    <div class="bar" id="bar__bottom">
      <div class="bar-left" id="bar__bottomleft">
        <?php tpl_button('edit'); ?>
        <?php tpl_button('history'); ?>
      </div>
      <div class="bar-right" id="bar__bottomright">
        <?php if (!plugin_isdisabled('add_page') && ($add_page =& plugin_load('helper', 'add_page'))) $add_page->html_add_page_button(); ?>
        <?php tpl_button('subscribe'); ?>
        <?php tpl_button('subscribens'); ?>
        <?php tpl_button('admin'); ?>
        <?php tpl_button('profile'); ?>
        <?php tpl_button('login'); ?>
        <?php tpl_button('index'); ?>
        <?php tpl_button('top'); ?>&nbsp;
      </div>
      <div class="clearer"></div>
    </div>

  </div>

  <?php tpl_license(false); ?>

</div>
<?php /*old includehook*/ @include(dirname(__FILE__).'/footer.html'); ?>

<?php if (tpl_getConf('google_analytics_code')): ?>
	<script type="text/javascript" charset="utf-8">var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));</script>
	<script type="text/javascript" charset="utf-8">
		try {
			var pageTracker = _gat._getTracker("<?php echo tpl_getConf('google_analytics_code'); ?>");
			<?php if ($INFO['isadmin']): ?>pageTracker._setVar('isadmin');<?php endif ?>
			<?php if ($INFO['ismanager']): ?>pageTracker._setVar('ismanager');<?php endif ?>
			pageTracker._setVar('lang: <?php echo $conf['lang']; ?>');
			pageTracker._setVar('id: <?php echo $INFO['id']; ?>');
			<?php if ($INFO['locked']): ?>pageTracker._setVar('locked');<?php endif ?>
			<?php if ($INFO['exists']): ?>pageTracker._setVar('exists');<?php endif ?>
			<?php if ($INFO['writable']): ?>pageTracker._setVar('writable');<?php endif ?>
			<?php if ($INFO['editable']): ?>pageTracker._setVar('editable');<?php endif ?>
			<?php if ($conf['client']): ?>
				pageTracker._setVar('client: echo $conf['client']; ?>');
			<?php else: ?>
				pageTracker._setVar('client: anonymous');
			<?php endif ?>
			pageTracker._setVar('action: <?php echo $ACT; ?>');
			pageTracker._initData();
		} catch(err) { }
	</script>
<?php endif ?>
<div class="no"><?php /* provide DokuWiki housekeeping, required in all templates */ tpl_indexerWebBug()?></div>
</body>
</html>
