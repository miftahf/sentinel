<?php namespace Cartalyst\Sentinel\Roles;
/**
 * Part of the Sentinel package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Cartalyst PSL License.
 *
 * This source file is subject to the Cartalyst PSL License that is
 * bundled with this package in the license.txt file.
 *
 * @package    Sentinel
 * @version    1.0.0
 * @author     Cartalyst LLC
 * @license    Cartalyst PSL
 * @copyright  (c) 2011-2014, Cartalyst LLC
 * @link       http://cartalyst.com
 */

use Cartalyst\Support\Traits\EventTrait;
use Cartalyst\Support\Traits\RepositoryTrait;

class IlluminateRoleRepository implements RoleRepositoryInterface {

	use EventTrait, RepositoryTrait;

	/**
	 * Model name.
	 *
	 * @var string
	 */
	protected $model = 'Cartalyst\Sentinel\Roles\EloquentRole';

	/**
	 * Create a new Illuminate user repository.
	 *
	 * @param  string  $model
	 */
	public function __construct($model = null)
	{
		if (isset($model))
		{
			$this->model = $model;
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function findById($id)
	{
		return $this->createModel()
			->newQuery()
			->with('users')
			->find($id);
	}

	/**
	 * {@inheritDoc}
	 */
	public function findBySlug($slug)
	{
		return $this->createModel()
			->newQuery()
			->with('users')
			->where('slug', $slug)
			->first();
	}

	/**
	 * {@inheritDoc}
	 */
	public function findByName($name)
	{
		return $this->createModel()
			->newQuery()
			->with('users')
			->where('name', $name)
			->first();
	}

}
