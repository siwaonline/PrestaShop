<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://devdocs.prestashop.com/ for more information.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */
declare(strict_types=1);

namespace PrestaShopBundle\Form\Admin\Sell\CartRule;

use PrestaShop\PrestaShop\Core\Form\ChoiceProvider\CurrencyByIdChoiceProvider;
use PrestaShopBundle\Form\Admin\Type\CurrencyChoiceType;
use PrestaShopBundle\Form\Admin\Type\SwitchType;
use PrestaShopBundle\Form\Admin\Type\TaxInclusionChoiceType;
use PrestaShopBundle\Form\Admin\Type\TranslatorAwareType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class MinimumAmountType extends TranslatorAwareType
{
    /**
     * @var CurrencyByIdChoiceProvider
     */
    private $currencyByIdChoiceProvider;

    public function __construct(
        TranslatorInterface $translator,
        array $locales,
        CurrencyByIdChoiceProvider $currencyByIdChoiceProvider
    ) {
        parent::__construct($translator, $locales);
        $this->currencyByIdChoiceProvider = $currencyByIdChoiceProvider;
    }

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('amount', NumberType::class, [
                'label' => false,
                'required' => false,
                'help' => $this->trans(
                    'You can choose a minimum amount for the cart either with or without the taxes and shipping.',
                    'Admin.Catalog.Help'
                ),
            ])
            ->add('currency', CurrencyChoiceType::class)
            //@todo: should this kind of option become switch everywhere? Is it worth having a select list for a boolean (also same in PriceReductionType)?
            ->add('tax_included', TaxInclusionChoiceType::class)
            ->add('shipping_included', SwitchType::class, [
                'label' => $this->trans('Shipping included', 'Admin.Catalog.Feature'),
            ])
        ;
    }
}
