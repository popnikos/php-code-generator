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
 * The ClassBuilder is a fluent class to build skeleton
 * and body, docBlock annotation,...for PHP class
 *
 * @author popnikos
 */
class ClassBuilder 
{
    /**
     * Class Namespace
     * @var string
     */
    private $namespace;
    /**
     *
     * @var string Class Name
     */
    private $name;
    /**
     *  Parent Class Namespace
     * @var string
     */
    private $parentNamespace;
    /**
     * Fully Qualified Class Name of parent class
     * @var string
     */
    private $parentName;
    /**
     * Array of array interface names with namespaces as keys
     * @var string[string]
     */
    private $interfaces=[];
    
    use DocblockTrait;
    /**
     * 
     * @param string $className - fully qualified class name (i.e. including its Namespace)
     * @param string $parentClass  - fully qualified class name of parent class (i.e. the one extended)
     * @param string[] $interfaces Array of interfaces names
     * @param string[] $traits Array of Traits names
     */
    public function __construct($className, $parentClass, $interfaces=[],$traits=[]) 
    {
        $this->qualify($className,$parentClass,$interfaces,$traits);
    }
    
    public function getNamespace() {
        return $this->namespace;
    }

    public function getName() {
        return $this->name;
    }

    public function setNamespace($namespace) {
        $this->namespace = $namespace;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }
    public function getParentNamespace() {
        return $this->parentNamespace;
    }

    public function getParentName() {
        return $this->parentName;
    }

    public function setParentNamespace($parentNamespace) {
        $this->parentNamespace = $parentNamespace;
        return $this;
    }

    public function setParentName($parentName) {
        $this->parentName = $parentName;
        return $this;
    }

    public function addMethod(MethodBuilder $method) {
        $this->methods[]= $method;
    }
    
    public function addInterface($interface) {
        $name = $namespace = null;
        $parser = new Utils\FQCNStringParser;
        foreach($parser->parse($interface) as $property => $value) {
            if ('name' == $property) {
                $name = $value;
                continue;
            }
            if ('namespace' == $property) {
                $namespace = $value;
            }
        }
        $namespace = strval($namespace);
        if (!array_key_exists($namespace, $this->interfaces)) {
            $this->interfaces[$namespace] = [];
        }
        $this->interfaces[$namespace][] = $name;
    }
    public function addTrait($trait) {
        $name = $namespace = null;
        $parser = new Utils\FQCNStringParser;
        foreach($parser->parse($trait) as $property => $value) {
            if ('name' == $property) {
                $name = $value;
                continue;
            }
            if ('namespace' == $property) {
                $namespace = $value;
            }
        }
        $namespace = strval($namespace);
        if (!array_key_exists($namespace, $this->interfaces)) {
            $this->interfaces[$namespace] = [];
        }
        $this->interfaces[$namespace][] = $name;
    }
    
    private function qualify($className, $parentClass, $interfaces=[],$traits=[])
    {
        $parser = new Utils\FQCNStringParser;
        foreach($parser->parse($className) as $property => $value) {
            if ('name' == $property) {
                $this->setName($value);
                continue;
            }
            if ('namespace' == $property) {
                $this->setNamespace($value);
            }
        }
        foreach($parser->parse($parentClass) as $property => $value) {
            if ('name' == $property) {
                $this->setName($value);
                continue;
            }
            if ('namespace' == $property) {
                $this->setNamespace($value);
            }
        }
        
        foreach ($interfaces as $interface) {
            $this->addInterface($interface);
        } 
        
        foreach ($traits as $trait) {
            $this->addTrait($trait);
        }
        
    }
}
