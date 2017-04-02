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

/**
 * Jdatabase
 *
 * @package  jdatabase
 * @since    1.0
 */
class JdatabaseModelJdatabase extends JModelList
{
	public function getItems()
	{
		$query = $this->getDbo()->getQuery(true)
			->select($this->getDbo()->quoteName('id'))
			->select($this->getDbo()->quoteName('jdnl.name'))
			->select($this->getDbo()->quoteName('description', 'desc'))
			->select($this->getDbo()->quoteName(array('id', 'created_on'), array('number', 'date')))
			->from($this->getDbo()->quoteName('#__jdatabase', 'jdnl'));
		$this->getDbo()->setQuery($query);

		$items['assoc']      = $this->getDbo()->loadAssoc();
		$items['assocList']  = $this->getDbo()->loadAssocList();
		$items['column']     = $this->getDbo()->loadColumn();
		$items['object']     = $this->getDbo()->loadObject();
		$items['objectList'] = $this->getDbo()->loadObjectList();
		$items['result']     = $this->getDbo()->loadResult();
		$items['row']        = $this->getDbo()->loadRow();
		$items['rowList']    = $this->getDbo()->loadRowList();

		// Get the exporter
        $exporter = $this->getDbo()->getExporter();
        $exporter->from('#__jdatabase');
        $items['exporter'] = $exporter->__toString();

		// Get the importer
		/** @var JDatabaseImporterMysqli $importer */
		$importer = $this->getDbo()->getImporter();
		$importer->from(file_get_contents(JPATH_SITE . '/media/com_jdatabase/table.xml'));
		$importer->mergeStructure();

		// Use of JDatabaseIterator
        if (0)
        {
	        $this->getDbo()->setQuery($query);
	        $iteratorItems = $this->getDbo()->getIterator();

	        foreach ($iteratorItems as $item)
	        {
		        ?>
                <pre><?php
		        echo __FILE__ . '::' . __LINE__;
		        echo 'item';
		        echo '<br />';
		        print_r($item);
		        ?></pre><?php
	        }
        }
        
		return $items;
	}
}
