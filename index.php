<?php
$labelIndex = 0;
$bdd = new PDO('mysql:host=localhost;dbname=dcw_touring;charset=utf8','root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);



if(isset($_POST['line0'])){

}
$req = $bdd->prepare(
		"SELECT o.id_offer, o.option_name, d.percentage
	FROM offers AS o 
	LEFT JOIN discount AS d ON d.id_offer = o.id_offer
	WHERE d.percentage IS NULL;");

$req -> execute();
?>
<div id="divPanel">
	<form action='#' method="POST">
		<?php
			while ($line = $req->fetch()) {
				echo ("<label for='".$line['id_offer']."'>".$line['option_name']."</label>");
				echo ("<input id='".$line['id_offer']."' type='text' value='".$line['percentage']."'/></br>");
				$labelIndex++;
			}
			$req->closeCursor();
		?>
		<input type="submit"/>
	</form>
</div>
