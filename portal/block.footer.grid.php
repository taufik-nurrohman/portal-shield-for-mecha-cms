<section class="blog-footer-grid-group">
  <div class="blog-footer-grid">
  <?php Shield::chunk('block.widget', array(
      'title' => $speak->widget->recent_responses,
      'content' => Widget::recentResponse(3, 40, 50)
  )); ?>
  </div>
  <div class="blog-footer-grid">
  <?php Shield::chunk('block.widget', array(
      'title' => $speak->widget->recent_posts,
      'content' => Widget::recentPost()
  )); ?>
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