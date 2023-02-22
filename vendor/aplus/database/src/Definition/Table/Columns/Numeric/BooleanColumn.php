<?php declare(strict_types=1);
/*
 * This file is part of Aplus Framework Database Library.
 *
 * (c) Natan Felles <natanfelles@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Framework\Database\Definition\Table\Columns\Numeric;

/**
 * Class BooleanColumn.
 *
 * @see https://mariadb.com/kb/en/boolean/
 *
 * @package database
 */
final class BooleanColumn extends NumericDataType
{
    protected string $type = 'boolean';
}
