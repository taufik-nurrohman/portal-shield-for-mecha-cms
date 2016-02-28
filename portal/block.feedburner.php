<?php $c = Mecha::A($config->states->shield); ?>
<?php if($c['feed_slug']): ?>
<h5><?php echo $speak->shield_portal->title->feed_form_title; ?></h5>
<form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="_nw" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo Text::parse($c['feed_slug'], '->encoded_url'); ?>&amp;loc=<?php echo Text::parse($config->language, '->encoded_url'); ?>', '_nw', 'scrollbars=yes,width=550,height=520');return true;">
  <?php echo Form::hidden('uri', $c['feed_slug']); ?>
  <?php echo Form::hidden('loc', $config->language); ?>
  <p><?php echo Form::email('email', "", $speak->shield_portal->title->feed_form_input) . ' ' . Form::button('<i class="fa fa-rss"></i> ' . $speak->shield_portal->title->feed_form_button); ?></p>
</form>
<?php endif; ?>