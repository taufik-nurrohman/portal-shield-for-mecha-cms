<?php Shield::chunk('header'); ?>
<div class="blog-main posts">
  <?php if($config->total_articles > 0): ?>
  <?php foreach($articles as $article): ?>
  <?php Shield::lot(array('article' => $article)); ?>
  <article class="post post-index" id="post-<?php echo $article->id; ?>">
    <?php Shield::chunk('article.header.index'); ?>
    <figure class="post-image">
      <?php if($article->image): ?>
        <?php if(Plugin::exist('thumbnail')): ?>
          <?php $s = (array) $config->states->shield->font_size; ?>
          <?php $s = round($s[0] * 7); ?>
          <?php $article->image = str_replace(File::url(ASSET) . '/', $config->url . '/t/' . $s . '/' . $s . '/', $article->image); ?>
        <?php endif; ?>
        <?php if($article->image === Image::placeholder()): ?>
          <span role="image"><i class="fa fa-image"></i></span>
        <?php else: ?>
          <?php echo Asset::image($article->image, ' alt="" width="' . $s . '" height="' . $s . '"'); ?>
        <?php endif; ?>
      <?php else: ?>
        <span role="image"><i class="fa fa-image"></i></span>
      <?php endif; ?>
    </figure>
    <?php Shield::chunk('article.body.index'); ?>
    <?php Shield::chunk('article.footer'); ?>
  </article>
  <?php endforeach; ?>
  <?php else: ?>
  <article class="post">
    <?php Shield::chunk('article.body.204'); ?>
  </article>
  <?php endif; ?>
  <?php Shield::chunk('pager'); ?>
  <?php Shield::chunk('block.feedburner'); ?>
</div>
<?php Shield::chunk('footer'); ?>