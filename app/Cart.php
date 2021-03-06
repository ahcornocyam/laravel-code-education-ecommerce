<?php
namespace CodeCommerce;

class Cart
{

	private $items;

	public function __construct()
	{
		$this->items = [];
	}

	public function add( $id, $name, $price)
	{
		$this->items +=
		[
			$id =>
			[
				'qtd' 		=> isset($this->items[$id]['qtd']) ? $this->items[$id]['qtd']++ : 1 ,
				'name' 		=> $name,
				'price' 	=> $price,
			]
		];
		return $this->items;
	}

	public function update( $id, $name, $price, $qtd )
	{
		$this->items +=
		[
			$id =>
			[

				'qtd' 		=>  $this->items[$id]['qtd'] = $qtd ,
				'name' 		=> $name,
				'price' 	=> $price,
			]
		];

		return $this->items;
	}

	public function remove($id)
	{
		unset($this->items[$id]);
	}


	public function all()
	{
		return $this->items;
	}

	public function getTotal()
	{
		$total  = 0;
		foreach ($this->items as $item) {
			# code...
			$total +=  $item['qtd'] * $item['price'];
		}
		return $total;
	}

	public function getTotalProducts(){
		$total = 0;
		foreach ($this->items as $this->items['id'] => $value) {
			$total+=$value['qtd'];
		}
		return $total;
	}

	public function clear()
	{
		$this->items = [];
	}

}
