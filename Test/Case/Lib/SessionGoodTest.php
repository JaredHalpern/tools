<?php

App::uses('CakeSession', 'Model/Datasource');

/**
 * This works - due to the hack
 */
class SessionGoodTest extends CakeTestCase {

	public $fixtures = array('core.cake_session');

	public function setUp() {
		parent::setUp();

		// BUGFIX for CakePHP2.5 - One has to write to the session before deleting actually works
		CakeSession::write('Auth', '');
		CakeSession::delete('Auth');
	}

	/**
	 * @return void
	 */
	public function testAccess() {
		$result = CakeSession::read('Auth');
		$this->assertNull($result);

		CakeSession::write('Auth', 'something');

		$result = CakeSession::read('Auth');
		$this->assertNotNull($result);
	}

	/**
	 * @return void
	 */
	public function testAccessAgain() {
		$result = CakeSession::read('Auth');
		$this->assertNull($result);

		CakeSession::write('Auth', 'something');

		$result = CakeSession::read('Auth');
		$this->assertNotNull($result);
	}

}
