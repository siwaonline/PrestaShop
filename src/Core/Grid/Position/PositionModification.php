<?php
/**
 * 2007-2019 PrestaShop and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
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
 * needs please refer to https://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2019 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

namespace PrestaShop\PrestaShop\Core\Grid\Position;

/**
 * Class PositionModification contains the modification for a
 * designated row.
 */
final class PositionModification implements PositionModificationInterface
{
    /**
     * @var string|int
     */
    private $id;

    /**
     * @var int
     */
    private $oldPosition;

    /**
     * @var int
     */
    private $newPosition;

    /**
     * @param string|int $id
     * @param int $oldPosition
     * @param int $newPosition
     */
    public function __construct(
        $id,
        $oldPosition,
        $newPosition
    ) {
        $this->id = $id;
        $this->oldPosition = $oldPosition;
        $this->newPosition = $newPosition;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getOldPosition()
    {
        return $this->oldPosition;
    }

    /**
     * {@inheritdoc}
     */
    public function getNewPosition()
    {
        return $this->newPosition;
    }
}