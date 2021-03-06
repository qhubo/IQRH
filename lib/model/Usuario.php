<?php

/**
 * Skeleton subclass for representing a row from the 'usuario' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 05/02/15 04:55:15
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class Usuario extends BaseUsuario {

    
      public function getJefe() {
$retorna ='';
$usuarioQ = UsuarioQuery::create()->findOneById($this->getUsuarioJefe());
if ($usuarioQ) {
    $retorna = $usuarioQ->getNombreCompleto();
}
     return $retorna;     
    }
    public function getNombreCompleto() {

        $nombre = trim(trim($this->getPrimerApellido()) . "  " . trim($this->getSegundoApellido()).", ".trim($this->getPrimerNombre()) . "  " . trim($this->getSegundoNombre()));
        return $nombre;
    }
    
    public function getNombreUsuario() {

        $nombre = trim(trim($this->getNombreCompleto()) . " | " . trim($this->getUsuario()));
        return $nombre;
    }

    public function getTema() {
        $tema = $this->tema;
        if (!$this->tema) {
            $tema = '/web/kunes/assets/admin/layout/css/themes/default.css';
        }
        return $tema;
    }

    public function save(PropelPDO $con = null) {
        if ($this->isNew()) {
            $clave = $this->getClave();
            $this->setClave(sha1($clave));          
     
        } else {
            $clave = $this->getClave();
            $this->setClave($clave);
        }

        return parent::save($con);
    }

}
