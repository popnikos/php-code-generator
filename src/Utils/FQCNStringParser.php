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

namespace Popnikos\CodeGenerator\Utils;

/**
 * FQCNStringParser is simply a parser that determine a short name and
 * a namespace from as string (like "Popnikos\CodeGenerator\Utils\FQCNStringParser")
 *
 * @author popnikos
 */
class FQCNStringParser 
{
    public function parse($string) {
        if (empty($string)) {
            return [];
        }
        if (is_string($string)) {
            $data = explode('\\',$string);
            $name = array_pop($data);
            return ['namespace'=>implode('\\',$data),'name'=>$name];
        } elseif (is_object($string)) {
            $class = new \ReflectionClass($string);
            return [
                'name' => $class->getShortName(),
                'namespace' => $class->getNamespaceName(),
            ];
        }
        return [];
    }
}
