<?php
/**
 *
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts.Email.html
 * @since         CakePHP(tm) v 0.10.0.1076
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
	<title><?php echo $title_for_layout; ?></title>
</head>
<body>
<table>
<tr style="height:45px; background-color:black;">
<td style="text-align:center;">
<?php echo $this->Html->image("MUVE-title.png", array('alt'=>'MUVE','fullBase' => true)); ?>
</td>
</tr>
<tr>
<td>
	<?php echo $this->fetch('content'); ?>
</td>
</tr>
</table>

</body>
</html>