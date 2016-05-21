<?php
/**
* @author daf//
* @brief Aprobar comentarios
**/
		$cat = CommentData::getById($_GET["id"]);
		$cat->aprove();
		Core::redir("./?view=comments");
?>