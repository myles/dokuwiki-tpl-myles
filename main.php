<?php
/**
 *	DokuWiki Myles Template
 *	
 *	@link		http://github.com/myles/dokuwiki-tpl-myles/
 *	@author		Myles Braithwaite <me@mylesbraithwaite>
 *	@license	Creative Commons Attribution-Noncommercial-Share Alike 2.5 Canada License
 *					http://creativecommons.org/licenses/by-nc-sa/2.5/ca/
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

require_once(dirname(__FILE__) . '/tpl_functions.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>"
 lang="<?php echo $conf['lang']?>" dir="<?php echo $lang['direction']?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>[<?php echo strip_tags($conf['title']); ?>] <?php tpl_pagetitle(); ?></title>
	<?php tpl_metaheaders(); ?>
	<link rel="shortcut icon" href="<?php echo DOKU_TPL?>img/favicon.ico" type="image/x-icon" />
	<?php @include(dirname(__FILE__).'/meta.html'); ?>
</head>
<body id="wiki-mylesbraithwaite-com">
	<div class="container">
		<div class="span-24 first last" id="header">
			<div>
				<?php #tpl_searchform(); ?>
				<h1 id="site_name"><?php tpl_link(wl(),$conf['title'],'name="dokuwiki__top" id="dokuwiki__top" accesskey="h" title="[H]"'); ?></h1>
				<ul class="tabs" id="navigation"></ul><!-- .tabs #navigation -->
			</div>
			<?php @include(dirname(__FILE__).'/header.html'); ?>
		</div><!-- .span-24 .first .last #header -->
		
		<hr class="space">
		
		<?php flush(); ?>
		
		<div id="body_sidebar">
			<div class="span-24 first last">
				<div class="bar" id="bar__top">
					<div class="bar-left" id="bar__topleft">
						<?php tpl_button('edit'); ?>
				        <?php tpl_button('history'); ?>
					</div><!-- .bar-left #bar__topleft -->
					<div class="bar-right" id="bar__topright">
						<?php tpl_button('recent')?>
						<?php tpl_searchform(); ?>&nbsp;
					</div><!-- .bar-right #bar__topright -->
				</div><!-- .bar #bar__top -->
			</div><!-- .span-24 .first .last -->
			
			<div class="span-24 first last" id="trace">
				<?php
					if (tpl_getConf('trace') == 'breadcrumbs') {
						tpl_breadcrumbs();
					} elseif (tpl_getConf('trace') == 'you are here') {
						tpl_youarehere();
					}
				?>
			</div>
			
			<?php if(tpl_sidebar_hide()) { ?>
				<div class="span-24 first last" id="body">
					<?php tpl_content(); ?>
				</div><!-- .span-21 .first .last #body -->
			<?php } elseif(tpl_getConf('sidebar') == 'left') { ?>
				<div class="span-6 prepend-1 colborder first" id="sidebar">
					<?php tpl_sidebar('left') ?>
				</div><!-- .span-6 .first #sidebar -->
				<div class="span-15 last" id="body">
					<?php @include(dirname(__FILE__).'/pageheader.html'); ?>
					<?php tpl_content(); ?>
					<?php @include(dirname(__FILE__).'/pagefooter.html'); ?>
				</div><!-- .span-15 .last #body -->
			<?php } elseif(tpl_getConf('sidebar') == 'right') { ?>
				<div class="span-15 prepend-1 colborder first" id="body">
					<?php @include(dirname(__FILE__).'/pageheader.html'); ?>
					<?php tpl_content(); ?>
					<?php @include(dirname(__FILE__).'/pagefooter.html'); ?>
				</div><!-- .span-15 .prepend-1 .colborder .first #body -->
				<div class="span-6 last" id="sidebar">
					<?php tpl_sidebar('right') ?>
				</div><!-- .span-6 .last #sidebar -->
			<?php } else { ?>
				<div class="span-24 first last" id="body">
					<?php tpl_content(); ?>
				</div><!-- .span-21 .first .last #body -->
			<?php } ?>
		</div><!-- #body_sidebar -->
		
		<?php flush(); ?>
		
		<div class="span-24 first last" id="footer">
			<p class="user_info"><small><?php tpl_userinfo(); ?></small></p>
			<p class="page_info"><small><?php tpl_pageinfo(); ?></small></p>
			<!--<p class="quiet license"><small><?php tpl_license(false);?></small></p>-->
			
			<div class="bar" id="bar__bottom">
				<div class="bar-left" id="bar__bottomleft">
					<?php tpl_button('edit'); ?>
					<?php tpl_button('history'); ?>
				</div><!-- .bar-left #bar__bottomleft -->
				<div class="bar-right" id="bar__bottomright">
					<?php tpl_button('subscribe'); ?>
					<?php tpl_button('subscribens'); ?>
					<?php tpl_button('admin'); ?>
					<?php tpl_button('profile'); ?>
					<?php tpl_button('login'); ?>
					<?php tpl_button('index'); ?>
					<?php tpl_button('top'); ?>&nbsp;
				</div><!-- .bar-right #bar__bottomright -->
				<div class="clearer"></div>
			</div><!-- .bar #bar__bottom -->
		</div><!-- .span-24 .first .last #footer -->
	</div><!-- .container -->
	
	<div class="no"><?php /* provide DokuWiki housekeeping, required in all templates */ tpl_indexerWebBug(); ?></div>
	
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
</body>
</html>