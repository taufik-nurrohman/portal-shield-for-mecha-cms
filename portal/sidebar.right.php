<aside class="blog-sidebar blog-sidebar-right widgets">
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