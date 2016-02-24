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

// Custom appearance
Weapon::add('shell_after', function() use($config) {
    $c = File::open(SHIELD . DS . $config->shield . DS . 'states' . DS . 'config.txt')->unserialize();
    echo O_BEGIN . '<style media="screen">
body {
  background-color:' . $c['color'][6] . ';
  font-family:' . strip_tags($c['font_family'][0]) . ';
  font-size:' . $c['font_size'][0] . 'px;
  color:' . $c['color'][0] . ';
}
a {color:' . $c['color'][12] . '}
a:focus,
a:hover {color:' . $c['color'][10] . '}
h1,h2,h3,h4,h5,h6 {font-family:' . strip_tags($c['font_family'][1]) . '}
fieldset,
hr,
.table-bordered th,
.table-bordered td,
table[border="1"] th,
table[border="1"] td {border-color:' . $c['color'][7] . '}
.table-bordered th,
table[border="1"] th {background-color:' . $c['color'][4] . '}
pre {background-color:' . $c['color'][4] . '}
button,
input,
select,
textarea,
.btn {
  background-color:' . $c['color'][3] . ';
  border-color:' . $c['color'][7] . ';
}
button,
input[type="button"],
input[type="reset"],
input[type="submit"],
.btn {
  background-color:' . $c['color'][9] . ';
  border-color:transparent;
  color:' . $c['color'][3] . ';
}
button:active,
input[type="button"]:active,
input[type="reset"]:active,
input[type="submit"]:active,
.btn:active {
  background-color:' . $c['color'][11] . ';
  color:' . $c['color'][3] . ';
}
.blog-header {
  background-color:' . $c['color'][8] . ';
  color:' . $c['color'][3] . ';
}
.blog-navigation {border-bottom-color:' . $c['color'][1] . '}
.blog-navigation a {
  background-color:' . $c['color'][9] . ';
  color:' . $c['color'][3] . ';
}
.blog-navigation .current a {background-color:' . $c['color'][1] . '}
.blog-main {
  background-color:' . $c['color'][3] . ';
  border-bottom-color:' . $c['color'][7] . ';
}
.post {font-size:' . $c['font_size'][1] . 'px}
.blog-main a:focus,
.blog-main a:hover {color:' . $c['color'][13] . '}
.blog-main .btn:focus,
.blog-main .btn:hover {color:' . $c['color'][3] . '}
.blog-sidebar .widget-title {background-color:' . $c['color'][7] . '}
.blog-sidebar .widget li {border-top-color:' . $c['color'][7] . '}
.blog-footer {
  background-color:' . $c['color'][1] . ';
  color:' . $c['color'][3] . ';
}
.post-time {
  background-color:' . $c['color'][1] . ';
  color:' . $c['color'][3] . ';
}
.post-footer {
  border-top-color:' . $c['color'][7] . ';
  background-color:' . $c['color'][5] . ';
}
.message {background-color:' . $c['color'][2] . '}
</style>' . O_END;
    if($config->page_type === 'manager') {
        echo O_BEGIN . '<style media="screen">
.custom-drop,
.media,
.modal-area,
.sortable,
.tab-button,
.tab-button:before,
.tab-button:after {border-color:' . $c['color'][7] . '}
.tab-button:not(.active) {
  background-color:' . $c['color'][4] . ';
  border-color:transparent;
}
.checkbox,
.radio {color:' . $c['color'][9] . '}
.about-author {background-color:' . $c['color'][6] . '}
.about-title {background-color:' . $c['color'][4] . '}
</style>' . O_END;
    }
}, 10.1);