<?php
/**
 * Magmodules.eu - http://www.magmodules.eu
 *
 * NOTICE OF LICENSE
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to info@magmodules.eu so we can send you a copy immediately.
 *
 * @category      Magmodules
 * @package       Magmodules_Kiyoh
 * @author        Magmodules <info@magmodules.eu)
 * @copyright     Copyright (c) 2017 (http://www.magmodules.eu)
 * @license       http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Magmodules_Kiyoh_Helper_Data extends Mage_Core_Helper_Abstract
{

    /**
     * @return bool|Mage_Core_Model_Abstract
     */
    public function getTotalScore()
    {
        $shopId = Mage::getStoreConfig('kiyoh/general/api_id');
        $reviewStats = Mage::getModel('kiyoh/stats')->load($shopId, 'shop_id');
        if ($reviewStats->getScore() > 0) {
            $reviewStats->setPercentage($reviewStats->getScore());
            $reviewStats->setStarsQty(number_format(($reviewStats->getScore() / 10), 1, ',', ''));
            return $reviewStats;
        }

        return false;
    }

    /**
     * @return bool|string
     */
    public function getExternalLink()
    {
        if (Mage::getStoreConfig('kiyoh/general/url')) {
            $url = '<a href="' . Mage::getStoreConfig('kiyoh/general/url') . '" target="_blank">KiyOh</a>';
            return Mage::helper('kiyoh')->__('on') . ' ' . $url;
        }

        return false;
    }

    /**
     * @param $rating
     *
     * @return string
     */
    public function getHtmlStars($rating)
    {
        $html = '<div class="rating-box">';
        $html .= '	<div class="rating" style="width:' . $rating . '%"></div>';
        $html .= '</div>';
        return $html;
    }

}