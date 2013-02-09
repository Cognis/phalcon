<?php
class UpisController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	
    }

    public function unosAction()
    {
    	include "../app/_include/connect.php";
		
        //Request variables from html form
        $ime = $this->request->getPost("ime", "string");
        $prezime = $this->request->getPost("prezime", "string");
		$mreza = $this->request->getPost("mreza", "string");
		$broj = $this->request->getPost("broj", "string");

        $korisnici = new Korisnici();
        $korisnici->ime = $ime;
        $korisnici->prezime = $prezime;
		$korisnici->save();
		
		// Instantiate the Query
		$query = new Phalcon\Mvc\Model\Query("SELECT k_id FROM Korisnici WHERE ime = '$ime' AND prezime = '$prezime' ORDER BY k_id DESC LIMIT 1");
		// Pass the DI container
		$query->setDI($di);
		// Execute the query returning a result if any
		$id = $query->execute();
		foreach ($id as $id) {
		    $id = $id->k_id;
			echo $id;
		}
		
		$telefoni = new Telefoni();
        $telefoni->mreza = $mreza;
        $telefoni->broj = $broj;
		$telefoni->fk_k_id = $id;
		$telefoni->save();
		
		die('<META HTTP-EQUIV="Refresh" Content="0; URL=../../potvrda">');
    }

}
?>