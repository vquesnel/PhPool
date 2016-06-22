<?PHP

require_once 'Color.class.php';

Class Vertex
{
	private $_x	= 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 0.0;
	private $_color;
	public static $verbose = FALSE;

	public function 	getX() { return number_format($this->_x, 2); }
	public function 	getY() { return number_format($this->_y, 2); }
	public function 	getZ() { return number_format($this->_z, 2); }
	public function 	getW() { return number_format($this->_w, 2); }
	public function 	getColor() { return $this->_color; }

	public function 	setX($val) { $this->_x = $val; }
	public function 	setY($val) { $this->_y = $val; }
	public function 	setZ($val) { $this->_z = $val; }
	public function 	setW($val) { $this->_w = $val; }
	public function 	setColor($val) { $this->_color = $val; }

	public static function doc()
	{
		return (file_get_contents("Vertex.doc.txt"));
	}

	public function __construct(array $kwargs)
	{
		$this->_x = $kwargs['x'];
		$this->_y = $kwargs['y'];
		$this->_z = $kwargs['z'];

		if (array_key_exists("w", $kwargs))
			$this->_w = $kwargs['w'];
		else
			$this->_w = 1.0;

		if (array_key_exists("color", $kwargs))
			$this->_color = $kwargs['color'];
		else
			$this->_color = new COLOR(array("red" => 255, "green" => 255, "blue" => 255));
		if (self::$verbose == TRUE)
		{
			printf("Vertex( x: %4s, y: %4s, z: %4s, w: %4s, ", $this->getX(), $this->getY(), $this->getZ(), $this->getW());
			printf("Color( red: %4s, green: %4s, blue: %4s ) ) constructed\n", $this->getColor()->red, $this->getColor()->green, $this->getColor()->blue);
			return ;
		}
	}

	public function __destruct()
	{
		if (self::$verbose == TRUE)
		{
			printf("Vertex( x: %4s, y: %4s, z: %4s, w: %4s, ", $this->getX(), $this->getY(), $this->getZ() , $this->getW());
			printf("Color( red: %4s, green: %4s, blue: %4s ) ) destructed\n", $this->getColor()->red, $this->getColor()->green, $this->getColor()->blue);
			return ;
		}
	}

	public function __toString()
	{
		if (self::$verbose == FALSE)
		{
			$val = sprintf("Vertex( x: %4s, y: %4s, z: %4s, w: %4s )", $this->getX(), $this->getY(), $this->getZ() , $this->getW());
		}
		else
		{
			$val = sprintf("Vertex( x: %4s, y: %4s, z: %4s, w: %4s, Color( red: %4s, green: %4s, blue: %4s ) )", $this->getX(), $this->getY(), $this->getZ(), $this->getW(), $this->getColor()->red, $this->getColor()->green, $this->getColor()->blue);
		}
		return ($val);
	}
}

?>
