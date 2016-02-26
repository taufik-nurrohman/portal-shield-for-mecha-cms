<?php

// Default color palettes ...
$colors = array(
    0 => '#222222',
    1 => '#333333',
    2 => '#BBBBBB',
    3 => '#E3E3DB',
    4 => '#FFFFFF',
    5 => '#EDF2F2',
    6 => '#E8F0F0',
    7 => '#D8E0E3',
    8 => '#D1D8DB',
    9 => '#AABCD1',
    10 => '#98ADC6',
    11 => '#839BB4',
    12 => '#8698AD',
    13 => '#6C7E95',
    14 => '#4B5562'
);

$c = Mecha::A($config->states->shield);

$s = "";
foreach($colors as $k => $v) {
    $s .= Form::color('color[' . $k . ']', isset($c['color'][$k]) ? $c['color'][$k] : $v) . ' ';
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