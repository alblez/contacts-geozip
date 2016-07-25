<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property GeocoderComponent $Geocoder
 * @property DistanceComponent $Geocoder
 * @property FlashComponent $Flash
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Geocoder', 'Distance', 'Flash');

/**
 * list method
 *
 * @return void
 */
	public function lists() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		// recupera los usuarios tipo agentes
		$agents = $this->User->getAgents();
		
		$this->set('agents', $agents);
	}

/**
 * getCoodinates method
 * Calcula coordenadas para cada codigo zip
 * @return array
 */
	private function getCoodinates($users) {

		foreach ($users as $key => $value) {
			if  (!empty($geoCode = $this->Geocoder->geocode((string) $value['User']['zipcode']))) {
				$users[$key]['User']['lat']= $geoCode[0]->geometry->location->lat;
				$users[$key]['User']['lng']=$geoCode[0]->geometry->location->lng;
			} 
			// agrega un delay de un segundo por limitaciones del api de google
			sleep(1);
			
		}
		
		return $users;
	}

/**
 * match method
 *
 * @return void
 */
	public function match() {
		// recupera los usuarios tipo contacto, y calcula sus coordenadas
		$contacts = $this->getCoodinates($this->User->getContacts());
		// calcula las coordenadas de los agentes enviadas por el formulario
		$agents = $this->getCoodinates($this->request->data['agents']);

		//define agents 
		$items = array();
		foreach ($agents as $key => $agent) {
			$items[] = [
					'code' => $agent['User']['code'],
					'latitude' => $agent['User']['lat'],
					'longitude' => $agent['User']['lng']
				     ];
		}

		// recorre cada contacto para encontrar el mas cercano a cada agente
		$results = array();
		foreach ($contacts as $key => $contact) {
			$distance = $this->Distance->getClosest($contact['User']['lat'], $contact['User']['lng'], $items);
			$results[] = [
					'AgentCode' => $distance['code'],
					'ContactName' => $contact['User']['name'],
					'ContactZipcode' => $contact['User']['zipcode'],
					'Distance' => $distance['distance']
				     ];
		}
		
		$this->set('matches', $results);

	}
}
