<?php
/**
 * @package    jdatabase
 *
 * @author     rolandd <your@email.com>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://your.url.com
 */

defined('_JEXEC') or die;

$db = JFactory::getDbo();
?>
<style type="text/css">
    .big {
        font-size: 20px;
    }
</style>
<div id="j-sidebar-container" class="span2">
	<?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span10">
	<?php
	$db    = JFactory::getDbo();
	$query = $db->getQuery(true)
		->select($db->quoteName('id'))
		->select($db->quoteName('jdnl.name'))
		->select($db->quoteName('description', 'desc'))
		->select($db->quoteName(array('id', 'created_on'), array('number', 'date')))
		->from($db->quoteName('#__jdatabase', 'jdnl'));
	$db->setQuery($query);
	echo $query->dump();
	?>
	<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'quoteName')); ?>
	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'quoteName', 'quoteName'); ?>
    <pre>
            <div class="big">
	        $field = $db->quoteName('hits');
<br/>
	        $field = $db->quoteName('content.hits');
<br/>
	        $field = $db->quoteName('hits', 'seen');
<br/>
	        $field = $db->quoteName(array('hits', 'published'));
<br/>
	        $field = $db->quoteName(array('hits', 'published'), array('seen', 'enabled'));
            </div>
            </pre>
	<?php echo JHtml::_('bootstrap.endTab'); ?>
	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'assoc', 'assoc'); ?>
    <pre><div class="big"><?php

			print_r($this->items['assoc']);
			?></div></pre>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'assocList', 'assocList'); ?>
    <pre><div class="big"><?php
			print_r($this->items['assocList']);
			?></div></pre>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'column', 'column'); ?>
    <pre><div class="big"><?php
			print_r($this->items['column']);
			?></div></pre>
	<?php echo JHtml::_('bootstrap.endTab'); ?>


	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'object', 'object'); ?>
    <pre><div class="big"><?php
			print_r($this->items['object']);
			?></div></pre>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'objectList', 'objectList'); ?>
    <pre><div class="big"><?php
			print_r($this->items['objectList']);
			?></div></pre>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'result', 'result'); ?>
    <pre><div class="big"><?php
			print_r($this->items['result']);
			?></div></pre>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'row', 'row'); ?>
    <pre><div class="big"><?php
			print_r($this->items['row']);
			?></div></pre>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'rowList', 'rowList'); ?>
    <pre><div class="big"><?php
			print_r($this->items['rowList']);
			?></div></pre>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'tableList', 'tableList'); ?>
    <pre><div class="big"><?php
			$list = $db->getTableList();
			print_r($list);
			?></div></pre>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'insertid', 'insertid'); ?>
    <pre><div class="big"><?php
			$query = $db->getQuery(true)
				->insert($db->quoteName('#__jdatabase'))
				->columns($db->quoteName(array('name', 'description', 'created_on')))
				->values($db->quote('An entry') . ',' . $db->quote('Another row') . ',' . $db->quote(JDate::getInstance()->toSql()));
			$db->setQuery($query);
			$db->execute();
			echo $db->insertid();
			?></div></pre>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'nullDate', 'nullDate'); ?>
    <pre><div class="big"><?php
			$list = $db->getNullDate();
			print_r($list);
			?></div></pre>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'truncate', 'truncate'); ?>
    <pre><div class="big"><?php
            //$db->truncateTable('#__jdatabase');
			print_r(htmlentities('$db->truncateTable(\'#__jdatabase\');'));
			?></div></pre>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'splitsql', 'splitsql'); ?>
    <pre><div class="big">

            <?php
            $split = $db->splitSql(file_get_contents(JPATH_SITE . '/media/com_jdatabase/query.sql'));

			?><pre><?php
			echo __FILE__ . '::' . __LINE__;
			echo 'split';
			echo '<br />';
			print_r($split);
			?></pre><?php
			?></div></pre>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'exporter', 'exporter'); ?>
    <pre><div class="big"><?php
			print_r(htmlentities($this->items['exporter']));
			?></div></pre>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.endTabSet'); ?>
</div>
