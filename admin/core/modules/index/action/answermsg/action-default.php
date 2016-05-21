<?php
/**
* @author daf//
* @brief Responder Mensajes
**/
		$msg = CommentData::getById($_POST["comment_id"]);
		mail($msg->email, "Respuesta", $_POST["content"]);
		Core::redir("./?view=msgs");
?>