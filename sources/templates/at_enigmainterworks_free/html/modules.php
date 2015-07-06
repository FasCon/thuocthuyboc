<?php

// no direct access
defined('_JEXEC') or die('Restricted access');

function modChrome_standard_bottom($module, &$params, &$attribs)
{
$mc_sfx = $params->get('moduleclass_sfx');
if (!empty ($module->content)) : ?>
<?php if (strlen(trim($mc_sfx))>0) : ?>
<div class="module m<?php echo $mc_sfx; ?>">
<?php else: ?>
<div class="module">
<?php endif; ?>

<?php if ($module->showtitle != 0) : ?>
<h3 class="module-title"><?php echo $module->title; ?></h3>
<?php endif; ?>
<div class="module-body">
<?php echo $module->content; ?>
</div>
</div>
<?php endif;
}
?>


<?php
defined('_JEXEC') or die;
function modChrome_no($module, &$params, &$attribs)
{
if ($module->content) {
echo $module->content;
}
}
function modChrome_standard($module, &$params, &$attribs)
{
if ($module->content) {
echo "<div class=\"module-body " . htmlspecialchars($params->get('moduleclass_sfx')) . "\">";
if ($module->showtitle)
{
echo "<div class=\"module-title\">" . $module->title . "</div>";
}
echo $module->content;
echo "</div>";
}
}

?>