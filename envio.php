<?php
    // $Nome = $_POST["nome"];
    // $Fone = $_POST["telefone"];
    // $Email = $_POST["email"];
    // $Mensagem = $_POST["mensagem"];
    
    // Variável que junta os valores acima e monta o corpo do email
    
    // = "Nome: $Nome\n\nE-mail: $Email\n\nTelefone: $Fone\n\nMensagem: $Mensagem\n";
    
    if(isset($_POST['resposta'])){
        $Resposta = $_POST['resposta'];
        $Remetente = $_POST['remetente'];
        $Destinatario = $_POST['destinatario'];
        $Responsavel = $_POST['responsavel'];
        $Vai = $Resposta;
        require_once("phpmailer/class.phpmailer.php");
        
        define('GUSER', 'ticket@walletfamily.com');
        define('GPWD', 'abcd1234');
        
        function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
            global $error;
            $mail = new PHPMailer();
            $mail->IsSMTP();		// Ativar SMTP
            $mail->SMTPDebug = 0;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
            $mail->SMTPAuth = true;		// Autenticação ativada
            //$mail->SMTPSecure = 'ssl';	// SSL REQUERIDO pelo GMail
            $mail->Host = 'localhost';	// SMTP utilizado
            $mail->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
            $mail->Username = GUSER;
            $mail->Password = GPWD;
            $mail->SetFrom($de, $de_nome);
            $mail->CharSet = 'utf-8';
            $mail->Subject = $assunto;
            $mail->Body = $corpo;
            $mail->AddAddress($para);
            if(!$mail->Send()) {
                $error = '<div class="resposta red"><b class="white-text">'.$mail->ErrorInfo.' </b></div>'; 
                return false;
            } else {
                $error = '<div class="resposta green lighten-1"><b class="white-text">E-Mail enviado com sucesso!</b></div>';
                return true;
            }
        }
        if($Responsavel != "" && $Remetente != ""){
            if (smtpmailer($Destinatario, $Remetente, $Responsavel, 'Resposta do Ticket', $Vai)) {

                //Header("location:http://www.brconexaochile.com.br/index.php"); // Redireciona para uma página de obrigado.
            }
            if (!empty($error)) echo $error;
        }
    }
?>