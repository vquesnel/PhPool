<?PHP

require_once 'Vertex.class.php';

Class Vector
{
	private $_x	= 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 0.0;
	public static $verbose = FALSE;

	public function 	getX() { return str_replace(',', '', number_format($this->_x, 2)); }
	public function 	getY() { return str_replace(',', '', number_format($this->_y, 2)); }
	public function 	getZ() { return str_replace(',', '', number_format($this->_z, 2)); }
	public function 	getW() { return str_replace(',', '', number_format($this->_w, 2)); }

	public static function doc()
	{
		return (file_get_contents("Vector.doc.txt"));
	}

	public function __construct(array $kwargs)
	{
		$dest = $kwargs['dest'];
		if (array_key_exists('orig', $kwargs))
			$orig = $kwargs['orig'];
		else
			$orig = new Vertex(array("x" => 0, "y" => 0, "z" => 0, "w" => 1 ));
		$this->_x = floatval(str_replace(',', '', $dest->getX())) - $orig->getX();
		$this->_y = floatval(str_replace(',', '', $dest->getY())) - $orig->getY();
		$this->_z = floatval(str_replace(',', '', $dest->getZ())) - $orig->getZ();
		if (self::$verbose == TRUE)
		{
			printf("Vector( x:%4s, y:%4s, z:%4s, w:%4s ) constructed\n", $this->getX(), $this->getY(), $this->getZ(), $this->getW());
			return ;
		}
	}

	public function __toString()
	{
		$val = sprintf("Vector( x:%4s, y:%4s, z:%4s, w:%4s )", $this->getX(), $this->getY(), $this->getZ(), $this->getW());
		return ($val);
	}

	public function __destruct()
	{
		if (self::$verbose == TRUE)
		{
			printf("Vector( x:%4s, y:%4s, z:%4s, w:%4s ) destructed\n", $this->getX(), $this->getY(), $this->getZ(), $this->getW());
			return ;
		}
	}

	public function magnitude()
	{
		return (sqrt(pow($this->getX(), 2) + pow($this->getY(), 2) + pow($this->getZ(), 2)));
	}

	public function normalize()
	{
		$dest = new Vertex(array( 'x' => ($this->getX() / $this->magnitude()),
					'y' => ($this->getY() / $this->magnitude()),
					'z' => ($this->getZ() / $this->magnitude())));
		return (new Vector(array("dest" => $dest)));
	}

	public function add(Vector $rhs)
	{
		$dest = new Vertex(array("x" => $this->getX() + $rhs->getX(), "y" => $this->getY() + $rhs->getY(), "z" => $this->getZ() + $rhs->getZ()));
		return (new Vector(array("dest" => $dest)));
	}

	public function sub(Vector $rhs)
	{
		$dest = new Vertex(array("x" => $this->getX() - $rhs->getX(), "y" => $this->getY() - $rhs->getY(), "z" => $this->getZ() - $rhs->getZ()));
		return (new Vector(array("dest" => $dest)));
	}

	public function opposite()
	{
		$dest = new Vertex(array("x" => -$this->getX(), "y" => -$this->getY(), "z" => -$this->getZ()));
		return (new Vector(array("dest" => $dest)));
	}

	public function scalarProduct($k)
	{
		$dest = new Vertex(array("x" => $this->getX() * $k, "y" => $this->getY() * $k, "z" => $this->getZ() * $k));
		return (new Vector(array("dest" => $dest)));
	}

	public function dotProduct(Vector $rhs)
	{
		return ($this->getX() * $rhs->getX() + $this->getY() * $rhs->getY() + $this->getZ() * $rhs->getZ());
	}

	public function cos(Vector $rhs)
	{
		return ($this->dotProduct($rhs) / ($this->magnitude() * $rhs->magnitude()));
	}

	public function crossProduct(Vector $rhs)
	{
		$dest = new Vertex(array("x" => $this->getY() * $rhs->getZ() - $this->getZ() * $rhs->getY(),
					"y" => -($this->getX() * $rhs->getZ() - $this->getZ() * $rhs->getX()),
					"z" => $this->getX() * $rhs->getY() - $this->getY() * $rhs->getX()));
		return (new Vector(array("dest" => $dest)));
	}
}

?>
