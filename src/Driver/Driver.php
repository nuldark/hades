<?php

/*
 * This file is part of the nuldark/hades.
 *
 * Copyright (C) 2024 Dominik Szamburski
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Hades\Driver;

use JetBrains\PhpStorm\Language;
use SensitiveParameter;

interface Driver
{
    /**
     * Initializes connection.
     *
     * @param array $params The connection parameters.
     * @return void
     */
    public function connect(#[SensitiveParameter] array $params): void;

    /**
     * Prepares a statement for execution and returns a <b>Statement</b> object
     *
     * @param string $sql The SQL statement to prepare.
     * @return \Hades\Driver\Statement <b>Driver::prepare</b> returns a <b>Statement</b> object.
     */
    public function prepare(#[Language('SQL')] string $sql): Statement;

    /**
     * Executes an SQL statement, returning a result set <b>Result</b> object.
     *
     * @param string $sql The SQL statement to prepare and execute.
     * @return \Hades\Driver\Result <b>Driver::query</b> returns a <b>Result</b> object.
     */
    public function query(#[Language('SQL')] string $sql): Result;

    /**
     * Executes an SQL Statement and return number of affected rows.
     *
     * @param string $sql The SQL statement to prepare and execute.
     * @return int|numeric-string <b>Driver::execute</b> returns the number of rows that have been modified
     * or deleted by a SQL statement. If no rows were affected <b>Driver::execute</b> returns 0.
     */
    public function execute(#[Language('SQL')] string $sql): int|string;

    /**
     * Initiates a transaction.
     *
     * @return bool <b>TRUE</b> on success, <b>FALSE</b> on failure.
     */
    public function beginTransaction(): bool;

    /**
     * Commits a transaction.
     *
     * @return bool <b>TRUE</b> on success, <b>FALSE</b> on failure.
     */
    public function commit(): bool;

    /**
     * Rollbacks a transaction.
     *
     * @return bool <b>TRUE</b> on success, <b>FALSE</b> on failure.
     */
    public function rollback(): bool;
}
