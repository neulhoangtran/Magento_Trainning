<?php
namespace Aht\Helloworld\Setup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Model\Entity\Attribute\Source\Boolean;
class UpgradeData implements UpgradeDataInterface
{
	private $eavSetupFactory;
	public function __construct(EavSetupFactory $eavSetupFactory)
	{
		$this->eavSetupFactory = $eavSetupFactory;
	}
	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		$setup->startSetup();
		if ($context->getVersion() && version_compare($context->getVersion(), '1.2.0')) {
			$eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
			$eavSetup->addAttribute(
				\Magento\Catalog\Model\Product::ENTITY,
				'my_custom_size',
				[
					'type' => 'int',
					'backend' => '',
					'frontend' => '',
					'label' => 'My Custom Size',
					'input' => 'select',
					'note' => 'My Custom Size',
					'class' => '',
					'source' => 'Aht\ModuleTrainning\Model\Config\Source\Options',
					'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
					'visible' => true,
					'required' => false,
					'user_defined' => true,
					'default' => '0',
					'searchable' => false,
					'filterable' => false,
					'comparable' => false,
					'visible_on_front' => true,
					'used_in_product_listing' => true,
					'unique' => false,
					'option' => [
						'values' => [],
					]
				]
			);
		}
		$setup->endSetup();
	}
}