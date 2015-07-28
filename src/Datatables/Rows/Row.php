<?php

namespace Khill\Lavacharts\DataTables\Rows;

use \Carbon\Carbon;
use Khill\Lavacharts\Datatables\DateCell;
use \Khill\Lavacharts\Exceptions\InvalidColumnIndex;

/**
 * Row Object
 *
 * The row object contains all the data for a row, stored in an array, indexed by columns.
 *
 *
 * @package    Lavacharts
 * @subpackage DataTables\Rows
 * @since      3.0.0
 * @author     Kevin Hill <kevinkhill@gmail.com>
 * @copyright  (c) 2015, KHill Designs
 * @link       http://github.com/kevinkhill/lavacharts GitHub Repository Page
 * @link       http://lavacharts.com                   Official Docs Site
 * @license    http://opensource.org/licenses/MIT MIT
 */
class Row implements \JsonSerializable
{
    /**
     * Row values
     *
     * @var array
     */
    private $values;

    /**
     * Creates a new Row object with the given values.
     *
     * @param  array $valueArray Array of row values.
     * @return self
     */
    public function __construct($valueArray)
    {
        $this->values = array_map(function ($cellValue) {
            if ($cellValue instanceof Carbon) {
                return new DateCell($cellValue);
            } else {
                return $cellValue;
            }
        }, $valueArray);
    }

    /**
     * Returns a column value from the Row.
     *
     * @access public
     * @param  int $columnIndex Column value to fetch from the row.
     * @throws \Khill\Lavacharts\Exceptions\InvalidColumnIndex
     * @return mixed
     */
    public function getColumnValue($columnIndex)
    {
        try {
            return $this->values[$columnIndex];
        } catch (\Exception $e) {
            throw new InvalidColumnIndex($columnIndex, count($this->values));
        }
    }

    /**
     * Custom json serialization of the column.
     *
     * @access public
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'c' => array_map(function ($cellValue) {
                return ['v' => $cellValue];
            }, $this->values)
        ];
    }
}
