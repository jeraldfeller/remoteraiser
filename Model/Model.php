<?php


class Model {
    public $debug = TRUE;
    protected $db_pdo;


    public function addContactLog($post){

        $pdo = $this->getPdo();
        $sql = 'INSERT INTO `contact_logs` (`email`, `phone_number`, `contact_person`, `organization`, `city`, `state`, `group_size`, `comments`, `time_stamp`)
                VALUES
                ("' . $post['email']. '",
                 "' . $post['phone_no']. '",
                 "' . $post['contact_person']. '",
                 "' . $post['organization']. '",
                 "' . $post['city']. '",
                 "' . $post['state']. '",
                 "' . $post['group_size']. '",
                 "' . $post['comments']. '",
                 "' . time() . '")
               ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();




        $subject = 'Remote Raiser';
        $message = '';


        $message .= '<html>';
        $message .= '    <head>';
        $message .= '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">';
        $message .= '      <title>Notification</title>';
        $message .= '    </head>';
        $message .= '    <body>';
        $message .= '      <div class="col-lg-12">';
        $message .= '      <table class="table table-striped" border="0">';
        $message .= '        <tr>';
        $message .= '          <td>' . $post['email'] . '</td>';
        $message .= '        </tr>';
        $message .= '        <tr>';
        $message .= '          <td>' . $post['phone_no'] . '</td>';
        $message .= '        </tr>';
        $message .= '        <tr>';
        $message .= '          <td>' . $post['contact_person'] . '</td>';
        $message .= '        </tr>';
        $message .= '        <tr>';
        $message .= '          <td>' . $post['organization'] . '</td>';
        $message .= '        </tr>';
        $message .= '        <tr>';
        $message .= '          <td>' . $post['city'] . '</td>';
        $message .= '        </tr>';
        $message .= '        <tr>';
        $message .= '          <td>' . $post['state'] . '</td>';
        $message .= '        </tr>';
        $message .= '        <tr>';
        $message .= '          <td>' . $post['group_size'] . '</td>';
        $message .= '        </tr>';
        $message .= '        <tr>';
        $message .= '          <td>' . $post['comments'] . '</td>';
        $message .= '        </tr>';
        $message .= '    </table>';
        $message .= '    </div>';
        $message .= '    </body>';
        $message .= '    </html>';



        $this->sendEmail($post['email'], 'info@remoteraiser.com' , $subject, $message);

        Header('Location: index?success=true');

    }


    public function sendEmail($from, $to, $subject, $message){

        // To send HTML mail, the Content-type header must be set
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

        // Additional headers
        $headers .= 'From: <' . $from . '>' . "\r\n";


        // Mail it
        mail($to, $subject, $message, $headers);



    }
    public function pdoQuoteValue($value)
    {
        $pdo = $this->getPdo();
        return $pdo->quote($value);
    }

    public function getPdo()
    {
        if (!$this->db_pdo)
        {
            if ($this->debug)
            {
                $this->db_pdo = new PDO(DB_DSN, DB_USER, DB_PWD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
            }
            else
            {
                $this->db_pdo = new PDO(DB_DSN, DB_USER, DB_PWD);
            }
        }
        return $this->db_pdo;
    }
}