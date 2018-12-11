<?php
    /**
      * Deze class wordt gebruikt voor het registreren en inloggen van een gebruiker
      * Pas de code aan naar eigen wens, voeg zelf extra functionaliteit toe!
      */

    class UserService
    {
        /**
         * @var string het emailadres van de gebruiker
         * afschermen voor gebruik  buiten deze class
         */
        protected $email;

        /**
         * @var string het wachtwoord van de gebruiker
         * afschermen voor gebruik  buiten deze class
         */
        protected $password;

        /**
         * @var string het database connectie object
         * afschermen voor gebruik  buiten deze class
         */
        protected $db;       // stores the database handler
        protected $user;     // stores the user data

        /**
         * @param object db
         * @param string email
         * @param string password
         * De constructor functie voor de initialisatie van het object
         */
        public function __construct(PDO $db, $email, $password)
        {
           $this->db = $db;
           $this->email = $email;
           $this->password = $password;
        }

        /**
         * Deze functie controleert de inloggegevens
         * @return integer|boolean Deze functie retourneert het gebruiker id - of false indien er een fout optreed
         */
        protected function checkCredentials()
        {
           // vul hier je eigen code in 
        }

        /**
         * Deze functie probeert de gebruiker in te loggen
         * @return integer|boolean
         */
        public function login()
        {
            $user = $this->checkCredentials();

            if ($user) {
                $this->user = $user; // store it so it can be accessed later
                $_SESSION['user_id'] = $user['id'];
                return $user['id'];
            }

            return false;
        }

        /**
         * Deze functie registreert een nieuwe gebruiker
         * @return integer|boolean retourneer de nieuwe gebruiker id of retourneer false bij fout
         */
        public function registerNewUser()
        {
            $stmt = $this->db->prepare('SELECT * FROM users WHERE email = ?');
            $stmt->execute(array($this->email));

            if ($stmt->rowCount() == 0)
            {
                $stmt = $this->db->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
                $stmt->execute(array($this->email, $this->password));

                return $this->db->lastInsertId();
            }

            return false;
        }

        /**
         * @return string Deze functie geeft het emailadres terug
         */
        public function getEmailAddress()
        {
            return $this->email;
        }

        /**
         * @return string Deze functie stelt het emailadres in
         */
        public function setEmailAddress($email)
        {
            $this->email = $email;
        }

        /**
         * @return string Deze functie reset het wachtwoord van de desbetreffende user
         */
        public function resetPassword()
        {
            // vul hier je eigen code in
        }
    }
?>
