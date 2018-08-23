<?php
class CollectionTest  extends \PHPUnit_Framework_TestCase
{
	protected $collection;

	public function setup()
	{
		$this->collection  = new  \App\Support\Collection();
	}

	/**  @test */
	public function empty_instantiated_collection_returns_no_items()
	{
		$this->collection = new \App\Support\Collection;
		$this->assertEmpty($this->collection->get());
	}

	/** @test */
	public function countIsCorrectForItemsPassed()
	{
		$collection = new \App\Support\Collection([
			'one','two','three'
		]);
		$this->assertEquals(3, $collection->getCount() );
	}

	/** @tests */
	public function collection_implements_iterator_aggregate_interface()
	{
		$this->assertInstanceOf(IteratorAggregate::class,$this->collection);
	}

	/**  @test  */
	public function iterated_collection_items_are_same_as_passed()
	{
		$collection = new \App\Support\Collection([
			'one','two','three'
		]);

		$tempItems = [];
		foreach ($collection as $value)
		{
			$tempItems[] = $value;
		}
		$this->assertCount(3,$tempItems);
		$this->assertInstanceOf(ArrayIterator::class,$collection->getIterator());

	}


	/** @test */
	public function json_encoded_items()
	{
		$collection = new \App\Support\Collection([
			['name'=>'one',
			'email'=>'email_one@test.com'],
			['name'=>'two',
                        'email'=>'email_two@test.com']
		]);
		$json_collection = $collection->toJson();
		$this->assertEquals('[{"name":"one","email":"email_one@test.com"},{"name":"two","email":"email_two@test.com"}]',$json_collection);
	}


	/** @test */
	public function json_encodable_items_using_interface()
	{
		$collection = new \App\Support\Collection([
                        ['name'=>'one',
                        'email'=>'email_one@test.com'],
                        ['name'=>'two',
                        'email'=>'email_two@test.com']
                ]);
                $json_collection = json_encode($collection);

		$this->assertInternalType('string',$json_collection);
		$this->assertEquals('[{"name":"one","email":"email_one@test.com"},{"name":"two","email":"email_two@test.com"}]',$json_collection);

	}

}
