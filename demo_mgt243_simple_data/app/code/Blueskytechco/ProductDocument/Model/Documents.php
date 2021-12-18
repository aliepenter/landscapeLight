<?php
namespace Rokanthemes\RokanBase\Model;
class Documents extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'rokanthemes_documents';

	protected $_cacheTag = 'rokanthemes_documents';

	protected $_eventPrefix = 'rokanthemes_documents';

	protected function _construct()
	{
		$this->_init('Rokanthemes\RokanBase\Model\ResourceModel\Documents');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}

	public function getAvailableTemplate()
    {
        $docs = $this->getCollection();
        $l_docs = array();
        foreach ($docs as $b) {
            $l_docs[] = array('label' => $b->getName(), 'value' => $b->getId());
        }
        return $l_docs;
    }

    public function getAllOptions($withEmpty = true)
    {
        $options = array();
        $options = $this->getAvailableTemplate();

        if ($withEmpty) {
            array_unshift($options, array(
                'value' => '',
                'label' => '-- Please Select --',
                ));
        }
        return $options;
    }
}