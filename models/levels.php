<?php 
/**
 * 
 */
class Levels
{
	private $answer;
	private $real;

	function __construct($answer=null,$real=null)
	{
		$this->answer = $answer;
		$this->real = $real;
	}

	function validation_data($array_real,$array_ans){
		if (count($array_real) == count($array_ans)) {
			$diff = array_diff($array_real, $array_ans);
			if (count($diff)==0) {
				return TRUE;
			}else{
				if(count($diff)==count($array_real)){
					return "All your numbers/letters are different than ours ";
				}else{
					return "Some of your numbers are different than ours ";
				}
			}
		}else{
			return "Error, the numbers/letters has no same quantity";
		}
	}

	function validate_level_ascending(){
		$array_real = explode(",",str_replace(array(' ', "\t"), '', $this->real));
		$array_ans_order = explode(",",str_replace(array(' ', "\t"), '', $this->answer));
		$array_ans = explode(",",str_replace(array(' ', "\t"), '', $this->answer));
		sort($array_real);
		sort($array_ans_order);
		$ans = $this->validation_data($array_real,$array_ans_order);
		if($ans === TRUE){
			$count=0;
			for ($i=0; $i < count($array_real); $i++) { 
				if($array_real[$i] == $array_ans[$i]){
					$count = $count+1;
				}
			}
			if (count($array_real) == $count) {
				return TRUE;
			}else{
				$this->validate_lives();
				$levelDescription = ($_SESSION["level"]==1 || $_SESSION["level"]==2) ? "letters":"numbers";
				return "Your $levelDescription  have not been correctly ordered in ascending order ";
			}
		}else{
			$this->validate_lives();
			return $ans;
		}

	}

	function validate_level_descending(){
		$array_real = explode(",",str_replace(array(' ', "\t"), '', $this->real));
		$array_ans_order = explode(",",str_replace(array(' ', "\t"), '', $this->answer));
		$array_ans = explode(",",str_replace(array(' ', "\t"), '', $this->answer));
		rsort($array_real);
		rsort($array_ans_order);
		$ans = $this->validation_data($array_real,$array_ans_order);
		if($ans === TRUE){
			$count=0;
			for ($i=0; $i < count($array_real); $i++) { 
				if($array_real[$i] == $array_ans[$i]){
					$count = $count+1;
				}
			}
			if (count($array_real) == $count) {
				return TRUE;
			}else{
				$this->validate_lives();
				$levelDescription = ($_SESSION["level"]==1 || $_SESSION["level"]==2) ? "letters":"numbers";
				return "Your $levelDescription  have not been correctly ordered in descending order ";
			}
		}else{
			$this->validate_lives();
			return $ans;
		}

	}

	function validate_level_min_max(){
		$array_real = explode(",",str_replace(array(' ', "\t"), '', $this->real));
		$array_ans = explode(",",str_replace(array(' ', "\t"), '', $this->answer));
		sort($array_real);
		//validar que los dos esten en el array
		// iguales iutlimo y primero en ambos yya
		$ans ="";
		$levelDescription = ($_SESSION["level"]==5 || $_SESSION["level"]==6) ? "letters must be the FIRST and LAST! ":"numbers must be the MIN and MAX!";
		if (count($array_ans)==2) {
			$ans = ($array_real[0]==$array_ans[0] && $array_real[5]==$array_ans[1]) ? TRUE: "Error, the $levelDescription";
		}else{
			$ans ="Error, your answer must be just two $levelDescription";
		}

		if($ans === TRUE){
			return TRUE;
		}else{
			$this->validate_lives();
			return $ans;
		}

	}

	function validate_lives(){
		if ($_SESSION["lives"]>0) {
			$_SESSION["lives"] = $_SESSION["lives"] - 1;
		}
	}

	function get_numberValue(){
		//$times = rand(6,10);
		$times = 6;
		$i = 0;
		$number = "";
		while($i < $times-1){
			$number = $number . rand(0,100) .",";
			$i = $i + 1;
		}
		$number = $number . rand(0,100);
		return $number;
	}

	function get_stringValue(){
		//$txt = implode(',',str_split(substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,rand(6,10))));
		$txt = implode(',',str_split(substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,6)));
		return $txt;
	}
}

?>