<?php

$sessions=array();
$data=array();
$phpdate=0;

if (isset($_GET['from']) AND isset($_GET['to']) AND isset($_GET['club']) AND isset($_GET['infra']) AND isset($_GET['kwh'])) 
{
		
	require('tfpdf.php');

	class PDF extends tfpdf
	{

		// En-tête
		function Header()
		{
		
		require 'config/config.php';
		
		try {
			$bdd = new PDO('mysql:host='.$config['host'].';dbname='.$config['database'], $config['username'],  $config['password']);
		}
		catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}
		

		$query = 'SELECT `CLUB_ID` FROM `clubs` WHERE `NOM_CLUB` LIKE "'.$_GET['club'].'"';

		$reponse = $bdd->query($query); 
			
		while ($donnees = $reponse->fetch())
		{  	
			$club = $donnees;
		}	
		
		$query = 'SELECT `RESPONSABLE` FROM `clubs` WHERE `NOM_CLUB` LIKE "'.$_GET['club'].'"';

		$reponse = $bdd->query($query); 
			
		while ($donnees = $reponse->fetch())
		{  	
			$coordonnee = $donnees;
		}	
//echo "<pre>";
//print_r($coordonnee);
//echo "</pre>";

		$query = 'SELECT * FROM `utilisateurs` WHERE `USER_ID` = '.$coordonnee[0];
//echo $query."<br>";
		$reponse = $bdd->query($query); 
			
		while ($donnees = $reponse->fetch())
		{  	
			$coordonnee = $donnees;
		}

//echo "<pre>";
//print_r($coordonnee);
//echo "</pre>";
		
			// Police Arial 10
			$this->SetFont('Arial','',10);
			// Décalage à droite
			$this->Ln(3);
			// Logo
			$this->Image('img/bg_slider_home.jpg',-1,0,211);
			$this->Image('img/rexel.png',5,5,30);
			$this->Ln(15);
			// Police Arial gras 20
			$this->SetFont('Arial','B',20);
			// Décalage à droite
			$this->Cell(70);
			// Club - responsable - facture
			$this->Line(0,44,220,44);
			$this->Line(0,53,220,53);
			// Saut de ligne
			$this->Ln(21);
			
			// Police Arial gras 15
			$this->SetFont('Arial','',12);
			// Titre
			$this->Cell(50,0,'Club : '.$_GET['club'],0,0,'L'); //projet + type
			$X=90;
			$Y=0;
			$this->SetX($X,$Y);
			$this->Cell(30,0,'Facture n° '.$coordonnee[5],0,0,'C'); //n° facture
			setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
			$dateactuelle=strftime("%d %B %Y"); // date
			$this->Cell(0,0,$dateactuelle,0,0,'R');

			// Saut de ligne
			$this->Ln(8);

		}

		// Pied de page
		function Footer()
		{
			// Positionnement à 2,8 cm du bas
			$this->SetY(-28);
			$this->SetFont('','',7);
			$this->Cell(40);
			$this->Cell(100,11,'Mentions légales 1.',0,0,'C');
			$this->Ln(3);
			$this->Cell(40);
			$this->Cell(100,11,'Mentions légales 2.',0,0,'C');
			$this->Ln(8);

			// Police Arial italique 8
			$this->SetFont('Arial','I',8);
			$this->SetFillColor(255,0,0);
			// Numéro de page
			$this->SetTextColor(255);
			$this->SetFont('','B');
			$this->Cell(190,7,'Page '.$this->PageNo().'/{nb}',1,0,'C',true);
		}


		// Tableau coloré
		function FancyTable($header, $data)
		{

			// Couleurs, épaisseur du trait et police grasse
			$this->SetFillColor(255,0,0);
			$this->SetTextColor(255);
			$this->SetDrawColor(128,0,0);
			$this->SetLineWidth(.3);
			$this->SetFont('','B');
			// En-tête
			$w = array(19, 16, 16, 33, 33, 24, 24, 24);
			for($i=0;$i<count($header);$i++)
				$this->Cell($w[$i],6,$header[$i],1,0,'C',true);
			$this->Ln();

			// Restauration des couleurs et de la police
			$this->SetFillColor(224,235,255);
			$this->SetTextColor(0);
			$this->SetFont('');
			// Données
			$fill = false;
			foreach($data as $row)
			{
				$this->Cell($w[0],6,$row[0],'LR',0,'C',$fill);
				$this->Cell($w[1],6,$row[1],'LR',0,'R',$fill);
				$this->Cell($w[2],6,$row[2],'LR',0,'R',$fill);
				$this->Cell($w[3],6,$row[3],'LR',0,'R',$fill);
				$this->Cell($w[4],6,$row[4],'LR',0,'R',$fill);
				$this->Cell($w[5],6,$row[5],'LR',0,'R',$fill);
				$this->Cell($w[6],6,$row[6],'LR',0,'R',$fill);
				$this->Cell($w[7],6,$row[7],'LR',0,'R',$fill);

				$this->Ln();
				$fill = !$fill;
			}
			
			// Trait de terminaison
			$this->Cell(array_sum($w),0,'','T');
		}
	}

	$pdf = new PDF();
	$pdf->AliasNbPages();
	// Titres des colonnes
	$header = array('Date', 'H. début','H. fin','Index début (kWh)','Index fin (kWh)',"Conso (kWh)","Prix kWh (€)","Prix total (€)" );
	// Chargement des données

		$datefrom = $_GET['from'];
		list($day, $month, $year) = explode("/", $datefrom);
		$datefromen=$month."/".$day."/".$year;
		$phpdate = strtotime($datefromen);
		$mysqldatefrom = date( 'Y-m-d H:i:s', $phpdate );

		$dateto = $_GET['to'];
		list($day, $month, $year) = explode("/", $dateto);
		$datetoen=$month."/".$day."/".$year;
		$phpdate = strtotime($datetoen);
		$mysqldateto = date( 'Y-m-d 23:59:99', $phpdate );
		
		require 'config/config.php';
		
		try {
			$bdd = new PDO('mysql:host='.$config['host'].';dbname='.$config['database'], $config['username'],  $config['password']);
		}
		catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}


		$query = 'SELECT `CLUB_ID` FROM `clubs` WHERE `NOM_CLUB` LIKE "'.$_GET['club'].'"';

		$reponse = $bdd->query($query); 
			
		while ($donnees = $reponse->fetch())
		{  	
			$club = $donnees;
		}	

		$query = 'SELECT * FROM `sessions` WHERE `CLUB` = '.$club[0].' AND `DATEHEURELOGIN` >= "'.$mysqldatefrom.'" AND `DATEHEURELOGOUT` <= "'.$mysqldateto.'"';

		$reponse = $bdd->query($query); 
			
		while ($donnees = $reponse->fetch())
		{  	
			$sessions[] = $donnees;
		}	
		
		$query = 'SELECT `RESPONSABLE` FROM `clubs` WHERE `NOM_CLUB` LIKE "'.$_GET['club'].'"';

		$reponse = $bdd->query($query); 
			
		while ($donnees = $reponse->fetch())
		{  	
			$coordonnee = $donnees;
		}	

		$query = 'SELECT * FROM `utilisateurs` WHERE `USER_ID` = '.$coordonnee[0];

		$reponse = $bdd->query($query); 
			
		while ($donnees = $reponse->fetch())
		{  	
			$coordonnee = $donnees;
		}


	require 'config/config.php';
	
	try {
		$bdd = new PDO('mysql:host='.$config['host'].';dbname='.$config['database'], $config['username'],  $config['password']);
	}
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
	
	$query = 'SELECT `RESPONSABLE` FROM `clubs` WHERE `NOM_CLUB` LIKE "'.$_GET['club'].'"';

	$reponse = $bdd->query($query); 
		
	while ($donnees = $reponse->fetch())
	{  	
		$coordonnee = $donnees;
	}	

	$query = 'SELECT * FROM `utilisateurs` WHERE `USER_ID` = '.$coordonnee[0];

	$reponse = $bdd->query($query); 
		
	while ($donnees = $reponse->fetch())
	{  	
		$coordonnee = $donnees;
	}

	require 'config/config.php';

	try {
		$bdd = new PDO('mysql:host='.$config['host'].';dbname='.$config['database'], $config['username'],  $config['password']);
	}
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}

	$total=0;
	$key_next=0;
	
	foreach($sessions as $key => $var_temp ) {
		list($date, $time) = explode(" ", $sessions[$key][3]);
		list($year, $month, $day) = explode("-", $date);
		$data[$key][]= $day."/".$month."/".$year;
		$data[$key][]=  $time;
		list($date, $time) = explode(" ", $sessions[$key][4]);
		list($year, $month, $day) = explode("-", $date);
		$data[$key][]= $time;
		$data[$key][]= $sessions[$key][5];
		$data[$key][]= $sessions[$key][6];
		$data[$key][]= $sessions[$key][7];
		$data[$key][]= str_replace(".",",",$_GET['kwh']/100);
		$data[$key][]= str_replace(".",",",$_GET['kwh']/100 * $sessions[$key][7]);
		$total=$total+($_GET['kwh']/100 * $sessions[$key][7]);
		$key_next = $key;
	}
	
	for ($i=0;$i<8;$i++) {
		$data[$key_next+1][$i]="";
	}

	$data[$key_next+2][0]="Total :";

	for ($i=1;$i<7;$i++) {
		$data[$key_next+2][$i]="";
	}
	$data[$key_next+2][7]=str_replace(".",",",$total);
			
	//Page d'en-tête
	$pdf->SetTitle('CSSH - Facturation');
	$pdf->SetFont('Arial','',14);
	$pdf->AddPage();
	//Hypothèses de travail
	$pdf->SetFillColor(224,235,255);
	$pdf->SetFont('','BU',16);
	$pdf->Cell(70);
	$pdf->Cell(50,11,'Période : du '.$_GET['from'].' au '.$_GET['to'],0,0,'C');
	$pdf->Ln(14);
	$pdf->Cell(90);
	$pdf->SetFont('','B',14);
	$pdf->Cell(5,10,'Coordonnées du club :',0,0,'C');
	$pdf->Ln(10);
	$pdf->SetFont('Arial','',10);
	
	$pdf->Cell(60);
	$pdf->Cell(30,5,'Responsable : ',0,0,'L',true);
	$pdf->Cell(40,5,$coordonnee['PRENOM'].' '.$coordonnee['NOM'],0,0,'L',true);
	$pdf->Ln(5);
	$pdf->Cell(60);
	$pdf->Cell(30,5,'Rue : ',0,0,'L',false);
	$pdf->Cell(40,5,$coordonnee['RUE'].', '.$coordonnee['NUMERO'],0,0,'L',false);
	$pdf->Ln(5);
	$pdf->Cell(60);
	$pdf->Cell(30,5,'Code Postal : ',0,0,'L',true);
	$pdf->Cell(40,5,$coordonnee['CODE_POSTAL'],0,0,'L',true);
	$pdf->Ln(5);
	$pdf->Cell(60);
	$pdf->Cell(30,5,'Localité : ',0,0,'L',false);
	$pdf->Cell(4,5,$coordonnee['LOCALITE'],0,0,'L',false);
	$pdf->Ln(5);
	$pdf->Cell(60);
	$pdf->Cell(30,5,'Pays : ',0,0,'L',true);
	$pdf->Cell(40,5,$coordonnee['PAYS'],0,0,'L',true);
	$pdf->Ln(5);
	$pdf->Cell(60);
	$pdf->Cell(30,5,'Téléphone : ',0,0,'L',false);
	$pdf->Cell(40,5,$coordonnee['TELEPHONE'],0,0,'L',false);
	$pdf->Ln(5);
	$pdf->Cell(60);
	$pdf->Cell(30,5,'GSM : ',0,0,'L',true);
	$pdf->Cell(40,5,$coordonnee['GSM'],0,0,'L',true);
	$pdf->Ln(5);
	$pdf->Cell(60);
	$pdf->Cell(30,5,'email : ',0,0,'L',false);
	$pdf->Cell(40,5,$coordonnee['EMAIL'],0,0,'L',false);
	$pdf->Ln(10);
	$pdf->SetFont('Arial','',14);
	$pdf->Cell(70);
	$pdf->SetFont('','B',14);
	$pdf->Cell(50,11,'Consommation d\'électricité :',0,0,'C');
	$pdf->Ln(12);
	$pdf->SetFont('','',10);
	
	$nbrelignesmaxPAC=17;
	if (count($data)>$nbrelignesmaxPAC) {
		for ($key=0;$key<$nbrelignesmaxPAC;$key++) {
			$datapage1[]=$data[$key];
		}	

		for ($key=$nbrelignesmaxPAC;$key<count($data);$key++) {
			$datapage2[]=$data[$key];
		}	

		$pdf->FancyTable($header,$datapage1);
		$pdf->AddPage();
		$pdf->Ln(4);
		$pdf->SetFont('','B',14);
		$pdf->Cell(70);
		$pdf->Cell(50,11,'Liste du matériel - suite',0,0,'C');
		$pdf->Ln(12);
		$pdf->SetFont('','',10);

		$pdf->FancyTable($header,$datapage2);
		$pdf->Ln(4);
	} else {
		$pdf->FancyTable($header,$data);
	}

	$pdf->Ln(10);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(70);
	$pdf->SetFont('','B',12);
	$pdf->Cell(50,11,'Montant à payer pour la période du '.$_GET['from'].' au '.$_GET['to'].' : '.str_replace(".",",",$total).' €',0,0,'C');
	$pdf->Ln(12);
	$pdf->Cell(70);
	$pdf->SetFont('','',10);
	
	$dateto = $_GET['to'];
	list($day, $month, $year) = explode("/", $dateto);
	$datetoen=$month."/".$day."/".$year;
	$datelimite = new DateTime($datetoen);
	$datelimite->add(new DateInterval('P1M')); //Où 'P1M' indique 'Période de 1 Mois'
	$numcompte="BE91 3500 1171 3376";
	
	$pdf->Cell(50,11,'Date limite de paiement : '.$datelimite->format('d/m/20y'),0,0,'C');
	$pdf->Ln(5);
	$pdf->Cell(70);
	$pdf->Cell(50,11,'à verser sur le compte : '.$numcompte,0,0,'C');
	
	$repertoire = str_replace("\\", "/", $_SERVER['DOCUMENT_ROOT'])."cssh1/factures/";
	if (!is_dir($repertoire))
        {
                mkdir ($repertoire,0777);
                //echo " -=> Création du repertoire $repertoire réussi<br>";
        }

	$repertoire = str_replace("\\", "/", $_SERVER['DOCUMENT_ROOT'])."cssh1/factures/".$_GET['club'];
	if (!is_dir($repertoire))
        {
                mkdir ($repertoire,0777);
                //echo " -=> Création du repertoire $repertoire réussi<br>";
        }

	$CheminFichier = $repertoire."/Facture énergie du ".str_replace("/","-",$_GET['from'])." au ".str_replace("/","-",$_GET['to']).".pdf";
	//echo $CheminFichier;
	$pdf->Output($CheminFichier,'F'); // enregistre le pdf
	
	$pdf->Output($_GET['club'].' - facture du '.$_GET['from'].' au '.$_GET['to'].'.pdf', 'I');

}
		
	?>
