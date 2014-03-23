<?php
App::uses('Ranking', 'Model');

/**
 * Ranking Test Case
 *
 */
class RankingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ranking',
		'app.user',
		'app.fb',
		'app.tw',
		'app.article',
		'app.group_exercise',
		'app.group',
		'app.groups_user',
		'app.exercises',
		'app.place',
		'app.user_exercise',
		'app.user_milestone',
		'app.milestones',
		'app.places'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ranking = ClassRegistry::init('Ranking');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ranking);

		parent::tearDown();
	}

}
