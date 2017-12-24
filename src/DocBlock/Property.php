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

namespace Popnikos\CodeGenerator\DocBlock;

/**
 * Description of Property
 *
 * @author popnikos
 */
class Property 
{
    private $level = 0;
    private $name;
    private $description;
    
    public function getLevel() {
        return $this->level;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setLevel($level) {
        $this->level = $level;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function __toString() 
    {
        return "@{$this->name} {$this->description}";
    }
}
