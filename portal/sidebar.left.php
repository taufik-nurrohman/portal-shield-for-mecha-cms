<aside class="blog-sidebar blog-sidebar-left widgets">
  <?php if($manager && Widget::exist('manager')): ?>
  <?php Shield::chunk('block.widget', array(
      'title' => $speak->widget->manager_menus,
      'content' => Widget::manager()
  )); ?>
  <?php endif; ?>
  <?php if($config->page_type !== 'manager'): ?>
  <?php Shield::chunk('block.widget', array(
      'title' => $speak->widget->recent_posts,
      'content' => Widget::recentPost()
  )); ?>
  <?php Shield::chunk('block.widget', array(
      'title' => $speak->widget->tags,
      'content' => Widget::tag()
  )); ?>
  <?php endif; ?>
</aside>