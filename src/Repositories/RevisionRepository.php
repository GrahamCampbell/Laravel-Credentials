<?php

/*
 * This file is part of Laravel Credentials.
 *
 * (c) Graham Campbell <graham@mineuk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\Credentials\Repositories;

use GrahamCampbell\Credentials\Repositories\Common\PaginateRepositoryTrait;
use GrahamCampbell\Credentials\Repositories\Interfaces\PaginateRepositoryInterface;

/**
 * This is the revision repository class.
 *
 * @author Graham Campbell <graham@mineuk.com>
 */
class RevisionRepository extends AbstractRepository implements PaginateRepositoryInterface
{
    use PaginateRepositoryTrait;
}
