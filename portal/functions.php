<?php

// Add icon to the "read more", "older" and "newer" link text
$speak->read_more = $speak->read_more . ' <i class="fa fa-angle-double-right"></i>';
$speak->older = $speak->older . ' <i class="fa fa-angle-double-right"></i>';
$speak->newer = '<i class="fa fa-angle-double-left"></i> ' . $speak->newer;
Config::set(array(
    'speak.read_more' => $speak->read_more,
    'speak.older' => $speak->older,
    'speak.newer' => $speak->newer
));

// HTML output manipulation
Filter::add('chunk:output', function($content, $path) use($config, $speak) {
    $name = File::N($path);
    $s = Shield::lot('article');
    // Add search for to the header
    if($name === 'block.header' && ! Guardian::happy()) {
        return str_replace('</header>', Widget::search() . '</header>', $content);
    }
    if($name === 'article.body.index') {
        if(strpos($content, ' class="fi-link"') === false) {
            return $content . '<p><a class="fi-link btn" href="' . $s->url . '">' . $speak->read_more . '</a></p>';
        } else {
            return str_replace(' class="fi-link"', ' class="fi-link btn"', $content);
        }
    }
    if($name === 'comment.form') {
        return str_replace('>' . $speak->publish . '</button>', '><i class="fa fa-check-circle"></i> ' . $speak->publish . '</button>', $content);
    }
    return $content;
});

// Exclude these fields on index, tag, archive, search page ...
Config::set($config->page_type . '_fields_exclude', array('content', 'content_raw'));

// Add social button(s)
if($config->is->post) {
    Weapon::add(array('article_header', 'page_header'), function($post) use($config) {
        $url = urlencode($post->url);
        $title = urlencode(Text::parse($post->title, '->text'));
        $description = urlencode(Text::parse($post->description, '->text'));
        $social = array(
            'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . $url,
            'twitter' => 'https://twitter.com/intent/tweet?text=' . $description . '&amp;url=' . $url,
            'google-plus' => 'https://plusone.google.com/_/+1/confirm?url=' . $url . '&amp;title=' . $title,
            'pinterest-p' => 'https://www.pinterest.com/pin/create/button?url=' . $url . '&amp;description=' . $description,
            'linkedin' => 'http://www.linkedin.com/shareArticle?mini=true&amp;url=' . $url . '&amp;title=' . $title . '&amp;summary=' . $description . '&amp;source=' . urlencode($config->url)
        );
        echo '<p class="social-button-group"><strong>' . Config::speak('shield_portal.title.share') . '</strong> ';
        foreach($social as $k => $v) {
            echo '<a class="social-button social-button-' . $k . '" href="' . $v . '" target="_blank"><i class="fa fa-' . $k . '"></i></a>';
        }
        echo '</p>';
    });
}

// Custom appearance
Weapon::add('shell_after', function() use($config) {
    $c = Mecha::A(Config::get('states.shield'));
    $css = '
body {
  background-color:' . $c['color'][7] . ';
  font-family:' . strip_tags($c['font_family'][0]) . ';
  font-size:' . $c['font_size'][0] . 'px;
  color:' . $c['color'][0] . ';
}
a {color:' . $c['color'][13] . '}
a:focus,
a:hover {color:' . $c['color'][11] . '}
h1,h2,h3,h4,h5,h6 {font-family:' . strip_tags($c['font_family'][1]) . '}
fieldset,
hr,
.table-bordered th,
.table-bordered td,
table[border="1"] th,
table[border="1"] td {border-color:' . $c['color'][8] . '}
.comment-pilot,
.table-bordered th,
table[border="1"] th {background-color:' . $c['color'][5] . '}
pre {background-color:' . $c['color'][5] . '}
button,
input,
select,
textarea,
.btn {
  background-color:' . $c['color'][4] . ';
  border-color:' . $c['color'][8] . ';
}
button,
input[type="button"],
input[type="reset"],
input[type="submit"],
.btn {
  background-color:' . $c['color'][10] . ';
  border-color:transparent;
  color:' . $c['color'][4] . ';
}
button:active,
input[type="button"]:active,
input[type="reset"]:active,
input[type="submit"]:active,
.btn:active {
  background-color:' . $c['color'][12] . ';
  color:' . $c['color'][4] . ';
}
.blog-header {
  background:' . $c['color'][9] . ' ' . ($c['background'][0]['image'] ? 'url(\'' . strip_tags($c['background'][0]['image']) . '\')' : 'none') . ' ' . Mecha::alter($c['background'][0]['repeat'], array(0 => 'no-repeat', 1 => 'repeat', 2 => 'repeat-x', 3 => 'repeat-y')) . ' ' . Mecha::alter($c['background'][0]['position']['x'], array(0 => '50%', 1 => '0', 2 => '100%')) . ' ' . Mecha::alter($c['background'][0]['position']['y'], array(0 => '50%', 1 => '0', 2 => '100%')) . ';
  color:' . $c['color'][4] . ';
}
.blog-navigation {border-color:' . $c['color'][1] . '}
.blog-navigation a,
.blog-navigation .a,
.blog-navigation li li .active,
.blog-navigation li li a:focus,
.blog-navigation li li a:hover,
.blog-navigation li li .a:focus,
.blog-navigation li li .a:hover,
.blog-navigation li li:hover > a,
.blog-navigation li li:hover > .a {
  background-color:' . $c['color'][10] . ';
  color:' . $c['color'][4] . ';
}
.blog-navigation .current a,
.blog-navigation li .active,
.blog-navigation li a:focus,
.blog-navigation li a:hover,
.blog-navigation li .a:focus,
.blog-navigation li .a:hover,
.blog-navigation li:hover > a,
.blog-navigation li:hover > .a,
.blog-navigation ul ul {background-color:' . $c['color'][1] . '}
.blog-main {
  background-color:' . $c['color'][4] . ';
  border-color:' . $c['color'][8] . ';
}
.post {font-size:' . $c['font_size'][1] . 'px}
.post-image span {
  background-color:' . $c['color'][8] . ';
  color:' . $c['color'][4] . ';
}
.blog-main a:focus,
.blog-main a:hover {color:' . $c['color'][14] . '}
.blog-main .btn:focus,
.blog-main .btn:hover {color:' . $c['color'][4] . '}
.blog-sidebar .widget-title,
.social-button {background-color:' . $c['color'][8] . '}
.blog-sidebar .widget li {border-color:' . $c['color'][8] . '}
.blog-footer,
.blog-footer-grid-group {
  background-color:' . $c['color'][1] . ';
  color:' . $c['color'][4] . ';
}
.post-time {
  background-color:' . $c['color'][1] . ';
  color:' . $c['color'][4] . ';
}
.post-footer,
.blog-wrapper .toc-block {
  border-color:' . $c['color'][8] . ';
  background-color:' . $c['color'][6] . ';
}
.blog-wrapper .toc-block li:after {background-color:' . $c['color'][6] . '}
.comment-time,
.recent-response-time,
.text-fade {color:' . $c['color'][2] . '}
.message {background-color:' . $c['color'][3] . '}';
    if(Guardian::happy()) {
        $css .= '
.tooltip {
  background-color:' . $c['color'][1] . ';
  border-color:' . $c['color'][1] . ';
  color:' . $c['color'][4] . ';
}
.custom-drop,
.media,
.modal-area,
.sortable,
.tab-button,
.tab-button:before,
.tab-button:after {border-color:' . $c['color'][8] . '}
.tab-button:not(.active) {
  background-color:' . $c['color'][5] . ';
  border-color:transparent;
}
.checkbox,
.radio {color:' . $c['color'][10] . '}
.about-author {background-color:' . $c['color'][7] . '}
.about-title {background-color:' . $c['color'][5] . '}
.page-time {color:' . $c['color'][2] . '}';
        if(isset($c['rounded_corner'])) {
            $css .= '
.custom-drop,
.custom-modal,
.modal-area,
.sortable {border-radius:.5em}
.tab-button {border-radius:.5em .5em 0 0}';
        }
    }
    if(isset($c['rounded_corner'])) {
        $css .= '
button,
input,
select,
textarea,
.btn,
.message,
.tooltip {border-radius:.25em}
fieldset,
pre {border-radius:.5em}
.blog-navigation a {border-radius:.5em .5em 0 0}
.blog-navigation ul ul a {border-radius:0}
.blog-navigation ul ul {border-radius:0 0 .5em .5em}
.blog-navigation ul ul ul {border-radius:0 .5em .5em .5em}
.blog-wrapper .toc-block {border-radius:0 0 .5em .5em}
.social-button {border-radius:100%}
@media (max-width:43.75em) {
  .blog-navigation ul ul ul {border-radius:0}
}';
    }
    if($c['css'][0]) {
        $css .= "\n" . $c['css'][0];
    }
    echo O_BEGIN . '<style media="screen">' . $css . "\n" . '</style>' . O_END;
}, 10.1);