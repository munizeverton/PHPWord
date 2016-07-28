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

use MunizEverton\PhpWord\Style\Paragraph;

/**
 * Footnote element
 */
class Footnote extends AbstractContainer
{
    /**
     * @var string Container type
     */
    protected $container = 'Footnote';

    /**
     * Paragraph style
     *
     * @var string|\MunizEverton\PhpWord\Style\Paragraph
     */
    protected $paragraphStyle;

    /**
     * Is part of collection
     *
     * @var bool
     */
    protected $collectionRelation = true;

    /**
     * Create new instance
     *
     * @param string|array|\MunizEverton\PhpWord\Style\Paragraph $paragraphStyle
     */
    public function __construct($paragraphStyle = null)
    {
        $this->paragraphStyle = $this->setNewStyle(new Paragraph(), $paragraphStyle);
        $this->setDocPart($this->container);
    }

    /**
     * Get paragraph style
     *
     * @return string|\MunizEverton\PhpWord\Style\Paragraph
     */
    public function getParagraphStyle()
    {
        return $this->paragraphStyle;
    }

    /**
     * Get Footnote Reference ID
     *
     * @return int
     * @deprecated 0.10.0
     * @codeCoverageIgnore
     */
    public function getReferenceId()
    {
        return $this->getRelationId();
    }

    /**
     * Set Footnote Reference ID
     *
     * @param int $rId
     * @deprecated 0.10.0
     * @codeCoverageIgnore
     */
    public function setReferenceId($rId)
    {
        $this->setRelationId($rId);
    }
}
