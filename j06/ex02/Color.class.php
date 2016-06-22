<?PHP

Class Color
{
	public $red				= 0;
	public $green			= 0;
	public $blue			= 0;
	public static $verbose	= FALSE;

	public static function doc()
	{
		return (file_get_contents("Color.doc.txt"));
	}

	public function __construct(array $kwargs)
	{
		if (isset($kwargs['rgb']))
		{
			$hex = base_convert(intval($kwargs['rgb']), 10, 16);
			$len = strlen($hex);
			if ($len > 6)
				return;
			while (6 - $len > 0)
			{
				$hex = "0".$hex;
				++$len;
			}
			$this->red = base_convert("0x".substr($hex, 0, 2), 16, 10);
			$this->green = base_convert("0x".substr($hex, 2, 2), 16, 10);
			$this->blue = base_convert("0x".substr($hex, 4, 2), 16, 10);
		}
		else
		{
			$this->red = intval($kwargs['red']);
			$this->blue = intval($kwargs['blue']);
			$this->green = intval($kwargs['green']);
		}
		if (self::$verbose == TRUE)
		{
			print("Color( red: ".$this->red.", green:   ".$this->green.", blue:   ".$this->blue." ) constructed.\n");
			return ;
		}

	}

	public function __destruct()
	{
		if (self::$verbose == TRUE)
		{
			print("Color( red: ".$this->red.", green:   ".$this->green.", blue:   ".$this->blue." ) destructed.\n");
			return ;
		}
	}

	
	public function __toString()
	{
		return ("Color( red: ".$this->red.", green:   ".$this->green.", blue:   ".$this->blue.")");
	}
	


	public function add(Color $rhs)
	{
		return (new Color(array('red' => $this->red + $rhs->red, 'green' => $this->green + $rhs->green, 'blue' => $this->blue + $rhs->blue)));
	}

	public function sub(Color $rhs)
	{
		return (new Color(array('red' => $this->red - $rhs->red, 'green' => $this->green - $rhs->green, 'blue' => $this->blue - $rhs->blue)));
	}

	public function mult($f)
	{
		return (new Color(array('red' => $this->red * $f, 'green' => $this->green * $f, 'blue' => $this->blue * $f)));
	}
}

?>