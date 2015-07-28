<?php

namespace Khill\Lavacharts\DataTables\Columns;

use \Khill\Lavacharts\Values\Label;
use \Khill\Lavacharts\Formats\Format;

/**
 * DateTimeColumn Object
 *
 * DateTime columns are for Carbon objects or strings representing datetimes in the DataTable.
 *
 *
 * @package    Lavacharts
 * @subpackage DataTables\Columns
 * @since      3.0.0
 * @author     Kevin Hill <kevinkhill@gmail.com>
 * @copyright  (c) 2015, KHill Designs
 * @link       http://github.com/kevinkhill/lavacharts GitHub Repository Page
 * @link       http://lavacharts.com                   Official Docs Site
 * @license    http://opensource.org/licenses/MIT MIT
 */
class DateTimeColumn extends DateColumn
{
    /**
     * Type of column.
     *
     * @var string
     */
    const TYPE = 'datetime';

    /**
     * Creates a new column object.
     *
     * @access public
     * @param  string $label Label for the column.
     * @return self
     */
    public function __construct($label='')
    {
        parent::__construct($label);
    }
}
