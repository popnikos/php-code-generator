<?php

/*
 * Copyright (C) 2017 popnikos
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Popnikos\CodeGenerator;

/**
 * Description of MethodBuilder
 *
 * @author popnikos
 */
class MethodBuilder 
{
    /**
     * Method name
     * @var string
     */
    private $name;
    /**
     * public (default), protected or private
     * @var string
     */
    private $visibility;
    /**
     * Indicate wether method is static
     * @var boolean
     */
    private $isStatic;
    
    /**
     * Indicate if method is final
     * @var boolean
     */
    private $isFinal;
    /**
     * Body of method (code)
     * @var string
     */
    private $body;

    use DocblockTrait;
    
    public function getName() {
        return $this->name;
    }

    public function getVisibility() {
        return $this->visibility;
    }

    public function getIsStatic() {
        return $this->isStatic;
    }

    public function getIsFinal() {
        return $this->isFinal;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setVisibility($visibility) {
        $this->visibility = $visibility;
        return $this;
    }

    public function setIsStatic($isStatic) {
        $this->isStatic = (bool)$isStatic;
        return $this;
    }

    public function setIsFinal($isFinal) {
        $this->isFinal = (bool)$isFinal;
        return $this;
    }
    
    public function getBody() {
        return $this->body;
    }

    public function setBody($body) {
        $this->body = $body;
        return $this;
    }



}
