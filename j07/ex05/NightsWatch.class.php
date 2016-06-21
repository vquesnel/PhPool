<?php
class NightsWatch {
	private $_group;
	public function __construct() {
		$this->_group = array();
	}
	public function recruit($people) {
		$this->_set_group($people);
	}
	public function fight() {
		$group = $this->get_group();
		foreach ($group as $somebody)
			if (array_key_exists("IFighter", class_implements($somebody)))
				$somebody->fight();
	}
	private function get_group() {
		return $this->_group;
	}
	private function _set_group($people) {
		array_push($this->_group, $people);
	}
}
?>
