<?php if($config->page_type === 'manager' && $manager): ?>
<!-- nothing here! -->
<?php else: ?>
<a class="blog-sidebar-toggle blog-sidebar-toggle-right" href="#blog-sidebar:right">
  <i class="fa fa-navicon"></i>
</a>
<aside class="blog-sidebar blog-sidebar-right widgets"  id="blog-sidebar:right">
  <?php if($config->page_type !== 'manager'): ?>
  <?php Shield::chunk('block.widget', array(
      'title' => $speak->widget->related_posts,
      'content' => Widget::relatedPost()
  )); ?>
  <?php Shield::chunk('block.widget', array(
      'title' => $speak->widget->archives,
      'content' => Widget::archive()
  )); ?>
  <?php endif; ?>
</aside>
<?php endif; ?>