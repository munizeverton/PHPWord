<?php
/**
 * This file is part of PHPWord - A pure PHP library for reading and writing
 * word processing documents.
 *
 * PHPWord is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/MunizEverton/PHPWord/contributors.
 *
 * @link        https://github.com/MunizEverton/PHPWord
 * @copyright   2010-2014 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace MunizEverton\PhpWord\Element;

use MunizEverton\PhpWord\Shared\String;
use MunizEverton\PhpWord\Style\ListItem as ListItemStyle;

/**
 * List item element
 */
class ListItem extends AbstractElement
{
    /**
     * Element style
     *
     * @var \MunizEverton\PhpWord\Style\ListItem
     */
    private $style;

    /**
     * Text object
     *
     * @var \MunizEverton\PhpWord\Element\Text
     */
    private $textObject;

    /**
     * Depth
     *
     * @var int
     */
    private $depth;

    /**
     * Create a new ListItem
     *
     * @param string $text
     * @param int $depth
     * @param mixed $fontStyle
     * @param array|string|null $listStyle
     * @param mixed $paragraphStyle
     */
    public function __construct($text, $depth = 0, $fontStyle = null, $listStyle = null, $paragraphStyle = null)
    {
        $this->textObject = new Text(String::toUTF8($text), $fontStyle, $paragraphStyle);
        $this->depth = $depth;

        // Version >= 0.10.0 will pass numbering style name. Older version will use old method
        if (!is_null($listStyle) && is_string($listStyle)) {
            $this->style = new ListItemStyle($listStyle);
        } else {
            $this->style = $this->setNewStyle(new ListItemStyle(), $listStyle, true);
        }
    }

    /**
     * Get style
     *
     * @return \MunizEverton\PhpWord\Style\ListItem
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * Get Text object
     *
     * @return \MunizEverton\PhpWord\Element\Text
     */
    public function getTextObject()
    {
        return $this->textObject;
    }

    /**
     * Get depth
     *
     * @return int
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * Get text
     *
     * @return string
     * @since 0.11.0
     */
    public function getText()
    {
        return $this->textObject->getText();
    }
}
