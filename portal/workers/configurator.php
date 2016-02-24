<?php

// Default color palettes ...
$colors = array(
    0 => '#222222',
    1 => '#333333',
    2 => '#E3E3DB',
    3 => '#FFFFFF',
    4 => '#EDF2F2',
    5 => '#E8F0F0',
    6 => '#D8E0E3',
    7 => '#D1D8DB',
    8 => '#AABCD1',
    9 => '#98ADC6',
    10 => '#839BB4',
    11 => '#8698AD',
    12 => '#6C7E95',
    13 => '#4B5562'
);

$c = Mecha::A($config->states->shield);

$s = "";
foreach($colors as $k => $v) {
    $s .= Form::color('color[' . $k . ']', $c['color'][$k], $v) . ' ';
}

?>
<div class="grid-group">
  <span class="grid span-1 form-label"><?php echo $speak->shield_portal->title->palette; ?></span>
  <span class="grid span-5"><?php echo rtrim($s); ?></span>
</div>
<label class="grid-group">
  <span class="grid span-1 form-label"><?php echo $speak->shield_portal->title->font_1; ?></span>
  <span class="grid span-5"><?php echo Form::text('font_family[0]', $c['font_family'][0]); ?></span>
</label>
<label class="grid-group">
  <span class="grid span-1 form-label"><?php echo $speak->shield_portal->title->font_2; ?></span>
  <span class="grid span-5"><?php echo Form::text('font_family[1]', $c['font_family'][1]); ?></span>
</label>
<label class="grid-group">
  <span class="grid span-1 form-label"><?php echo $speak->shield_portal->title->text_size_1; ?></span>
  <span class="grid span-5"><?php echo Form::number('font_size[0]', $c['font_size'][0]); ?></span>
</label>
<label class="grid-group">
  <span class="grid span-1 form-label"><?php echo $speak->shield_portal->title->text_size_2; ?></span>
  <span class="grid span-5"><?php echo Form::number('font_size[1]', $c['font_size'][1]); ?></span>
</label>