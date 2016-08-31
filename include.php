<?php 


function toon_header() {
	?>
	<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>A.C. Tervant U10</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">

</head>
<?php
}

function toon_footer() {
	?>

	<div class="footer">
		<div class="inner-footer"><p>FOOTER</p></div>
	</div>
		</body>
	</html>
<?php
}


// In deze class maken we contrueren we alle blok info zodat het overzichtelijker is
class gegevensOphalen 
{
	public $achternaam, $voornaam, $geboortedatum, $geslacht, $gegevens;

	public function __construct()
	{
		$this->spelersInfo = 
		"<tr class=\"table_row\">
			<td class=\"table_cell center\">{$this->achternaam} {$this->voornaam}</td> 
			<td class=\"table_cell center\">{$this->geboortedatum}</td> 
			<td class=\"table_cell center\">{$this->contact}</td></tr>";
	}
};


class wedstrijdVerslagen 
{
	public $titel, $datum, $wedstrijdverslag;

	public function __construct()
	{
		$this->wedstrijdverslag = 
		"   
		<div class=\"innerContainer\">
			<div class=\"wedstrijdverslag\">
				<header class=\"wedstrijdverslag_header center\">{$this->titel}</header>
				<div class=\"wedstrijdverslag_datum center\">{$this->datum}</div>

				<article class=\"wedstrijdverslag_artikel center\">{$this->wedstrijdverslag}
				</article>
		    </div>
		</div>
		";
	}
}



class spelerStatistieken 
{
	public $doelpunten, $assist;

	public function __construct()
	{
		$this->speler_statistieken = 
		"<tr class=\"table_row\">
			<td class=\"table_cell center\">{$this->doelpunten} </td> 
			<td class=\"table_cell center\">{$this->assist}</td>";
		;
	}
}


class ploegDoelpunten 
{
	public $doelpunten_tegen, $doelpunten_gemaakt;

	public function __construct()
	{
		$this->ploeg_doelpunten = 
		"<tr class=\"table_row\">
			<td class=\"table_cell center\">{$this->doelpunten_gemaakt} </td> 
			<td class=\"table_cell center\">{$this->doelpunten_gemaakt}</td>";
		;
	}
}
 ?>