<?php
/**
* @author daf//
* @brief Eliminar una categoria
**/
		$cat = CategoryData::getById($_GET["id"]);
		$cat->del();
		Core::redir("./?view=categories");
?>