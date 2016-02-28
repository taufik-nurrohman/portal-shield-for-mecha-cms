<?php if($config->page_type !== 'manager'): ?>
<section class="blog-footer-grid-group">
  <div class="blog-footer-grid">
  <?php $s = (array) $config->states->shield->font_size; ?>
  <?php Shield::chunk('block.widget', array(
      'title' => $speak->widget->recent_responses,
      'content' => Widget::recentResponse(3, round($s[0] * 3.6363636363636362), 50)
  )); ?>
  </div>
  <div class="blog-footer-grid">
  <?php if(Plugin::exist('popular-post')): ?>
    <?php Shield::chunk('block.widget', array(
        'title' => $speak->widget->popular_posts,
        'content' => Widget::popularPost()
    )); ?>
  <?php else: ?>
    <?php Shield::chunk('block.widget', array(
        'title' => $speak->widget->recent_posts,
        'content' => Widget::recentPost()
    )); ?>
  <?php endif; ?>
  </div>
  <div class="blog-footer-grid">
  <?php Shield::chunk('block.widget', array(
      'title' => $speak->widget->random_posts,
      'content' => Widget::randomPost()
  )); ?>
  </div>
  <div class="blog-footer-grid">
  <?php Shield::chunk('block.widget', array(
      'title' => $speak->widget->tags,
      'content' => Widget::tag('CLOUD')
  )); ?>
  </div>
</section>
<?php endif; ?>