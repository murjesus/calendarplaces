<?php

class Model_Spaces
{
	protected $id_space;
	protected $name;
	protected $latitude;
	protected $longitude;
	protected $type_id;
	protected $companies_id_company;
	protected $schedulling;
	protected $country_id;
	
	public function __construct()
	{
		
	}
	
	public function __destruct()
	{
		
	}
	
	
	// GETTERS && SETTERS
	/**
	 * @return the $id_space
	 */
	public function getId_space() {
		return $this->id_space;
	}

	/**
	 * @return the $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return the $latitude
	 */
	public function getLatitude() {
		return $this->latitude;
	}

	/**
	 * @return the $longitude
	 */
	public function getLongitude() {
		return $this->longitude;
	}

	/**
	 * @return the $type_id
	 */
	public function getType_id() {
		return $this->type_id;
	}

	/**
	 * @return the $companies_id_company
	 */
	public function getCompanies_id_company() {
		return $this->companies_id_company;
	}

	/**
	 * @return the $schedulling
	 */
	public function getSchedulling() {
		return $this->schedulling;
	}

	/**
	 * @return the $country_id
	 */
	public function getCountry_id() {
		return $this->country_id;
	}

	/**
	 * @param field_type $id_space
	 */
	public function setId_space($id_space) {
		$this->id_space = $id_space;
	}

	/**
	 * @param field_type $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @param field_type $latitude
	 */
	public function setLatitude($latitude) {
		$this->latitude = $latitude;
	}

	/**
	 * @param field_type $longitude
	 */
	public function setLongitude($longitude) {
		$this->longitude = $longitude;
	}

	/**
	 * @param field_type $type_id
	 */
	public function setType_id($type_id) {
		$this->type_id = $type_id;
	}

	/**
	 * @param field_type $companies_id_company
	 */
	public function setCompanies_id_company($companies_id_company) {
		$this->companies_id_company = $companies_id_company;
	}

	/**
	 * @param field_type $schedulling
	 */
	public function setSchedulling($schedulling) {
		$this->schedulling = $schedulling;
	}

	/**
	 * @param field_type $country_id
	 */
	public function setCountry_id($country_id) {
		$this->country_id = $country_id;
	}

	
	
	
}