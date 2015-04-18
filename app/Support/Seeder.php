<?php
namespace App\Support;

use Illuminate\Database\Seeder as BaseSeeder;
use Faker\Factory as Faker;
use Faker\Generator;
use Illuminate\Database\Eloquent\Collection;

abstract class Seeder extends BaseSeeder
{
	/**
	 * @return BaseModel
	 */
	abstract protected function getModel();

	/**
	 * @param Generator $faker
	 * @return array
	 */
	abstract protected function getFakerData(Generator $faker);

	/**
	 * @return mixed
	 */
	public function create()
	{
		$values = $this->getFakerData(Faker::create());
		return $this->getModel()->create($values);
	}

	/**
	 * @param int $total
	 * @return Collection
	 */
	public function createMultiple($total = 10)
	{
		$collection = new Collection();
		for ($i = 0; $i < $total; $i++) {
			$collection->add($this->create());
		}

		return $collection;
	}
}