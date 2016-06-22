<?PHP

Class Matrix
{
	const IDENTITY = 1;
	const TRANSLATION = 2;
	const SCALE = 3;
	const RX = 4;
	const RY = 5;
	const RZ = 6;
	const PROJECTION = 7;
	public static $verbose = FALSE;
	public $preset = array(array(1.00, 0.00, 0.00, 0.00),
						   array(0.00, 1.00, 0.00, 0.00),
						   array(0.00, 0.00, 1.00, 0.00),
						   array(0.00, 0.00, 0.00, 1.00));

	public function getPreset() {return print_r($this->_preset);}

	public static function doc()
	{
		return (file_get_contents("Matrix.doc.txt"));
	}

	public function __construct(array $kwargs)
	{
		if ($kwargs['preset'] == self::IDENTITY)
			$what_matrix = "IDENTITY";
		else if ($kwargs['preset'] == self::TRANSLATION)
		{
			$what_matrix = "TRANSLATION";
			$this->preset[0][3] = $kwargs['vtc']->getX();
			$this->preset[1][3] = $kwargs['vtc']->getY();
			$this->preset[2][3] = $kwargs['vtc']->getZ();
		}
		else if ($kwargs['preset'] == self::SCALE)
		{
			$what_matrix = "SCALE";
			$this->preset[0][0] = $kwargs['scale'];
			$this->preset[1][1] = $kwargs['scale'];
			$this->preset[2][2] = $kwargs['scale'];
		}
		else if ($kwargs['preset'] == self::RX)
		{
			$what_matrix = "Ox ROTATION";
			$this->preset[1][1] = cos($kwargs['angle']);
			$this->preset[1][2] = -sin($kwargs['angle']);
			$this->preset[2][1] = sin($kwargs['angle']);
			$this->preset[2][2] = cos($kwargs['angle']);
		}
		else if ($kwargs['preset'] == self::RY)
		{
			$what_matrix = "Oy ROTATION";
			$this->preset[0][0] = cos($kwargs['angle']);
			$this->preset[0][2] = sin($kwargs['angle']);
			$this->preset[2][0] = -sin($kwargs['angle']);
			$this->preset[2][2] = cos($kwargs['angle']);

		}
		else if ($kwargs['preset'] == self::RZ)
		{
			$what_matrix = "Oz ROTATION";
			$this->preset[0][0] = cos($kwargs['angle']);
			$this->preset[0][1] = -sin($kwargs['angle']);
			$this->preset[1][0] = sin($kwargs['angle']);
			$this->preset[1][1] = cos($kwargs['angle']);
		}
		else if ($kwargs['preset'] == self::PROJECTION)
		{
			$what_matrix = "PROJECTION";
			$n = $kwargs['near'];
			$f = $kwargs['far'];
			$scale = tan(deg2rad($kwargs['fov']) / 2);
			$t = $scale;
			$b = -$t;
			$r = $scale * $kwargs['ratio'];
			$l = -$r;
			$this->preset[0][0] = 2 *  $n / ($r - $l);
			$this->preset[1][1] = 2 * $n / ($t - $b);
			$this->preset[0][2] = ($r + $l) / ($r - $l);
			$this->preset[1][2] = ($t + $b) / ($t - $b);
			$this->preset[2][2] = -($f + $n) / ($f - $n);
			$this->preset[3][2] = -1;
			$this->preset[2][3] = -2 * $f * $n / ($f - $n);
			$this->preset[3][3] = 0;
		}
		if (self::$verbose == TRUE)
			echo "Matrix ".$what_matrix." instance construced\n";
	}

	public function __destruct()
	{
		if (self::$verbose == TRUE)
		{
			echo "Matrix instance destructed\n";
			return ;
		}
	}

	public function __toString()
	{
		return ("M | vtcX | vtcY | vtcZ | vtxO\n"
			   ."-----------------------------\n"
			   ."x | ".$this->_print_float($this->preset[0][0])." | ".$this->_print_float($this->preset[0][1])." | ".$this->_print_float($this->preset[0][2])." | ".$this->_print_float($this->preset[0][3])."\n"
			   ."y | ".$this->_print_float($this->preset[1][0])." | ".$this->_print_float($this->preset[1][1])." | ".$this->_print_float($this->preset[1][2])." | ".$this->_print_float($this->preset[1][3])."\n"
			   ."z | ".$this->_print_float($this->preset[2][0])." | ".$this->_print_float($this->preset[2][1])." | ".$this->_print_float($this->preset[2][2])." | ".$this->_print_float($this->preset[2][3])."\n"
			   ."w | ".$this->_print_float($this->preset[3][0])." | ".$this->_print_float($this->preset[3][1])." | ".$this->_print_float($this->preset[3][2])." | ".$this->_print_float($this->preset[3][3]));
	}

	public function mult(Matrix $rhs)
	{
		$matrix = clone $rhs;
		$matrix->preset = array(array(0, 0, 0, 0), array(0, 0, 0, 0), array(0, 0, 0, 0), array(0, 0, 0, 0));
		$i = 0;
		while ($i < 4)
		{
			$j = 0;
			while ($j < 4)
			{
				$k = 0;
				while ($k < 4)
				{
					$matrix->preset[$i][$j] = $matrix->preset[$i][$j] + $this->preset[$i][$k] * $rhs->preset[$k][$j];
					++$k;
				}
				++$j;
			}
			++$i;
		}
		return ($matrix);
	}

	private function _print_float($nb)
	{
		return number_format($nb, 2);
	}

	public function transformVertex(Vertex $vtx)
	{
		$matrix_vtx = array($vtx->getX(), $vtx->getY(), $vtx->getZ());
		$matrix = array(0, 0, 0);
		$i = 0;
		while ($i < 3)
		{
			$k = 0;
			while ($k < 3)
			{
				$matrix[$i] = $matrix[$i] + $this->preset[$i][$k] * $matrix_vtx[$k];
				++$k;
			}
			$matrix[$i] = $matrix[$i] + $this->preset[$i][$k];
			++$i;
		}
		$new_vtx = new Vertex(array('x' => $matrix[0], 'y' => $matrix[1], 'z' => $matrix[2]));
		return ($new_vtx);
	}
}

?>
