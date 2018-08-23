<?php

class UserTest extends \PHPUnit_Framework_TestCase
{
	protected $user;

	public function setup()
	{
		$this->user = new \App\Models\User;
	}

	/** @test */
	public function thatWeCanGetTheFirstName()
	{
		//$user = new App\Models\User;
		$this->user->setFirstName('Owais');

		$this->assertEquals('Owais',$this->user->getFirstName());
	}


        public function testThatWeCanGetTheLastName()
        {
                $this->user->setLastName('Ali');
                $this->assertEquals('Ali',$this->user->getLastName());
        }

        public function testThatWeCanGetTheFullName()
        {
                $user = new App\Models\User;
		$user->setFirstName('Owais');
                $user->setLastName('Ali');

                $this->assertEquals('Owais Ali',$user->getFullName());
        }

	public function testThatWeCanGetTheTrimmedFirstAndLastName()
        {
                $user = new App\Models\User;
                $user->setFirstName('  Owais ');
                $user->setLastName('    Ali   ');

                $this->assertEquals('Owais',$user->getFirstName());
                $this->assertEquals('Ali',$user->getLastName());

        }

	public function testThatWeCanGetTheEmail()
	{
                $user = new App\Models\User;
		$user->email = 'owaisali.cs@gmail.com';
		$this->assertEquals('owaisali.cs@gmail.com',$user->getEmail());
	}

	public function testThatWeCanGetEmailVariables()
	{
		$user = new App\Models\User;
		$user->first_name = 'Owais';
		$user->last_name = 'Ali';
                $user->email = 'owaisali.cs@gmail.com';

		$emailVariable = $user->getEmailVariables();
		$this->assertArrayHasKey('full_name',$emailVariable);
                $this->assertArrayHasKey('email',$emailVariable);

		$this->assertEquals('Owais Ali',$emailVariable['full_name']);
                $this->assertEquals('owaisali.cs@gmail.com',$emailVariable['email']);

	}

}
