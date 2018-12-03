<?

include("config.php");

class AUTH {


    function VALIDA($email,$senha){
    
        
        $sql = new MYSQL;
        
        $sql->SQL("select * from usuario where email='$email';");

        $result=$sql->MYRESULT;                
        if($row=mysql_fetch_object($result)){
            if($PASS!=$row->senha){
              require('indexfail.html');
              exit();
        
            }
                    
        }else{
            require('indexfail.html');
            exit();
        }
        session_start();
        
        $_SESSION['usuario_id']=$row->id;
        $_SESSION['nivel_usuario']=$row->perfil;
        $_SESSION['senha']=$row->senha;
        $_SESSION['email']=$row->email;

        $sql->SQL("select * from usuario where usuario_id='".$row->id."';");
        $result=$sql->MYRESULT;   
        $i=0;             
        while($row=mysql_fetch_object($result)){
            $_SESSION['nome'][$i]=$row->idcliente;
            $i++;
        }
    }
}
?>