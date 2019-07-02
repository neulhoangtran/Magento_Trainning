<?php
namespace Aht\Helloworld\Setup;
  
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Config;
  
class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;
  
    public function __construct(EavSetupFactory $eavSetupFactory, Config $eavConfig)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig = $eavConfig;
    }
  
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
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
                // 'source' => 'Aht\ModuleTrainning\Model\Config\Source\Options',
                'source' => '',
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