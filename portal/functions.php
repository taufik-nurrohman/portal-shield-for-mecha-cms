<?php

/**
 * Custom Function(s)
 * ------------------
 *
 * Add your own custom function(s) here. You can do something like
 * making custom widget(s), custom route(s), custom filter(s),
 * custom weapon(s), loading custom asset(s), etc. So that you can
 * manipulate the site output without having to touch the CMS core.
 *
 */

// HTML output manipulation
Filter::add('chunk:output', function($content, $path) use($config, $speak) {
    $name = File::N($path);
    $s = Shield::lot('article');
    // Add search for to the header
    if($name === 'block.header') {
        return str_replace('</header>', Widget::search() . '</header>', $content);
    }
    if($name === 'article.body.index') {
        if(strpos($content, ' class="fi-link"') === false) {
            return $content . '<p><a class="fi-link btn" href="' . $s->url . '">' . $speak->read_more . '</a></p>';
        } else {
            return str_replace(' class="fi-link"', ' class="fi-link btn"', $content);
        }
    }
    return $content;
});

// Exclude these fields on index, tag, archive, search page ...
Config::set($config->page_type . '_fields_exclude', array('content', 'content_raw'));

// Add social button(s)
if($config->is->post) {
    Weapon::add(array('article_header', 'page_header'), function() {
        $social = array(
            'facebook' => '',
            'twitter' => '',
            'google-plus' => '',
            'pinterest-p' => ''
        );
        echo '<p class="social-buttons">';
        foreach($social as $k => $v) {
            echo '<a href="' . $v . '"><i class="fa fa-' . $k . '"></i></a>';
        }
        echo '</p>';
    });
}

// Custom appearance
Weapon::add('shell_after', function() use($config) {
    $c = Mecha::A(Config::get('states.shield'));
    echo O_BEGIN . '<style media="screen">
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
  background-color:' . $c['color'][9] . ';
  color:' . $c['color'][4] . ';
}
.blog-navigation {border-bottom-color:' . $c['color'][1] . '}
.blog-navigation a {
  background-color:' . $c['color'][10] . ';
  color:' . $c['color'][4] . ';
}
.blog-navigation .current a,
.blog-navigation ul ul {background-color:' . $c['color'][1] . '}
.blog-main,
.recent-response-avatar img {
  background-color:' . $c['color'][4] . ';
  border-bottom-color:' . $c['color'][8] . ';
}
.post {font-size:' . $c['font_size'][1] . 'px}
.blog-main a:focus,
.blog-main a:hover {color:' . $c['color'][14] . '}
.blog-main .btn:focus,
.blog-main .btn:hover {color:' . $c['color'][4] . '}
.blog-sidebar .widget-title,
.social-buttons a {background-color:' . $c['color'][8] . '}
.blog-sidebar .widget li {border-top-color:' . $c['color'][8] . '}
.blog-footer,
.blog-footer-grid-group {
  background-color:' . $c['color'][1] . ';
  color:' . $c['color'][4] . ';
}
.post-time {
  background-color:' . $c['color'][1] . ';
  color:' . $c['color'][4] . ';
}
.post-footer {
  border-top-color:' . $c['color'][8] . ';
  background-color:' . $c['color'][6] . ';
}
.comment-time,
.recent-response-time {color:' . $c['color'][2] . '}
.message {background-color:' . $c['color'][3] . '}
</style>' . O_END;
    if(Guardian::happy()) {
        echo O_BEGIN . '<style media="screen">
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
.page-time {color:' . $c['color'][2] . '}
</style>' . O_END;
    }
}, 10.1);