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
<!-- script toevoegen van tinymce text editor -->
 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
 <link rel="stylesheet" href="css/style.css">
  

</head>
<?php
}

function toon_footer() {
	?>

	<div class="footer">
		<div class="inner-footer"><p>FOOTER</p></div>
	</div>
	<script src="js/actervant.js" type="text/javascript"></script>
		</body>
	</html>
<?php
}


// In deze class maken we contrueren we alle blok info zodat het overzichtelijker is
class gegevensOphalen 
{
	public $achternaam, $voornaam, $geboortedatum, $geslacht, $ID;

	public function __construct()
	{
		$this->spelersInfo = 
		"<tr class=\"table_row\">
			<td class=\"table_cell naam_knop center\"><a id=\"naam_knop\" href=\"spelers_detail.php?ID={$this->ID}\">{$this->achternaam} {$this->voornaam}</a></td> 
			<td class=\"table_cell center\">{$this->geboortedatum}</td> 
			<td class=\"table_cell center\">{$this->contact}</td></tr>";
	}
};


class spelersDetail 
{
	public $achternaam, $voornaam, $leeftijd, $geboortedatum, $contact, $adres, $geslacht, $evaluatie,$ID;
	public function __construct()
	{
		$this->spelers_detail = 
		"<tr class=/table_row/>
			<td class=/table_naam table_cell center/>{$this->ID} {$this->achternaam} {$this->voornaam}</td> 
			<td class=/table_cell center/>{$this->geboortedatum}</br>leeftijd: {$this->leeftijd}</td> 
			<td class=/table_cell center/>{$this->contact}</td>
			<td class=/table_cell center/>{$this->adres}</td>
			<td class=/table_cell center/>{$this->geslacht}</td> 
			<td class=/table_cell center evaluatie/>{$this->evaluatie}</td>  
		</tr>";
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
					<div class=\"wedstrijdverslag_header_wrapper\">
						<header class=\"wedstrijdverslag_header center\"><b>{$this->titel}</b></header>
						<div class=\"wedstrijdverslag_datum center\"><b>{$this->datum}</b></div>
					</div>
					<article class=\"wedstrijdverslag_artikel center\">{$this->wedstrijdverslag}
				</article>
		    </div>
		   <!-- <div class=\"wijzig_wis_wrapper\">
		    	<div class=\"wedstrijdverslag_wijzig\">
					<a href=\"wedstrijdverslag_wijzig.php\">wijzig</a>
		    	</div>
		    	<div class=\"wedstrijdverslag_wis\">
					<a href=\"wedstrijdverslag_wis.php\">wis</a>
		    	</div>
				</div>-->
			</div> 
		    ";
		}	
}




// Testen hoe ik een READ MORE stukje kan toevoegen  hieronder

class verslag 
{
	public $wedstrijd__verslag;
	public function __construct()
	{
		$this->wedstrijdverslag;
	}
}


class spelerStatistieken 
{
	public $doelpunten, $assist,$voornaam, $achternaam, $ID;

	public function __construct()
	{
		$this->speler_statistieken = 
		"<tr class=\"table_row\">
			<td class=\"table_cell center\"><a href=\"wijzig_speler.php?id=$this->ID\">{$this->achternaam} {$this->voornaam}</a> </td> 
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
			<td class=\"table_cell center\">{$this->doelpunten_tegen} </td> 
			<td class=\"table_cell center\">{$this->doelpunten_gemaakt}</td>";
		;
	}
}

class spelersDoelpunten 
{
	public $userID, $doelpunten, $assist;

	public function __construct()
	{
		$this->spelersDoelpunten_assist = 
		"<tr class=\"table_row\">
			<td class=\"table_cell naam_knop center\"><a id=\"naam_knop\" href=\"spelers_detail.php\">{$this->doelpunten}</a></td> 
			<td class=\"table_cell center\">{$this->assist}</td>
		";
	}
}
 ?>