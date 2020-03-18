 <?php

//require_once('message.class.php');
class Connexion extends PDO
{
    private $db = 'cochons'; // base de données
    private $host = 'localhost'; // adresse de la base
    private $user = 'root'; // nom
    private $pwd = 'root'; // mot de passe
    private $con; //
    private $select; // requête de sélection
    private $execute; // requête d'éxecution
    private $email='dritz@free.fr'; // email de l'admin du site
    private $dns;

    public function __construct ()
    {
        try
        {

            $this->con = parent::__construct($this->getDns(), $this->user, $this->pwd);

            // pour mysql on active le cache de requête
            if($this->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql')
                $this->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            return $this->con;
        }
        catch(PDOException $e) {

                  die ( $e->getMessage () );
        }
    }

    public function select($reqSelect)
    {
        try
        {
            $this->con = parent::beginTransaction();
            //$result= parent::query($reqSelect);
            $result = parent::prepare($reqSelect);
            $result->execute();
            $this->con = parent::commit();
            // ou
            // $this->con = parent::rollBack();
              return $result;
        }
        catch (Exception $e)
        {
            //On indique par email que la requête n'a pas fonctionné.
            error_log(date('D/m/y').' à '.date("H:i:s").' : '.$e->getMessage(), 1, $email);
            $this->con =parent::rollBack();
            $message= new Message();
            $message->outPut('Erreur dans la requête', 'Votre requête a été abandonnée');
        }
    }

    // renvoie un tableau que l'on peux travailler avec count($result)...
    public function selectTableau($reqSelect)
    {
        $result = parent::prepare($reqSelect);
        $result->execute();
        /* Récupération de toutes les lignes d'un jeu de résultats "équivalent à mysql_num_row() " */
        $resultat = $result->fetchAll();
        return $resultat;
    }

    // on change le type de base ici
    public function getDns()
    {
        return 'mysql:dbname='.$this->db.';host='.$this->host;
    }
}
?>
