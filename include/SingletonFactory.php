<?php
/************************************************************************
 * This file is part of phpIPN.                                         *
 *                                                                      *
 * phpIPN is free software: you can redistribute it and/or modify       *
 * it under the terms of the GNU General Public License as published by *
 * the Free Software Foundation, either version 3 of the License, or    *
 * (at your option) any later version.                                  *
 *                                                                      *
 * phpIPN is distributed in the hope that it will be useful,            *
 * but WITHOUT ANY WARRANTY; without even the implied warranty of       *
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the        *
 * GNU General Public License for more details.                         *
 *                                                                      *
 * You should have received a copy of the GNU General Public License    *
 * along with phpIPN.  If not, see <http://www.gnu.org/licenses/>.      *
 *                                                                      *
 * @author Dafydd James <mail@dafyddjames.com>                          *
 *                                                                      *
 ************************************************************************/
class SingletonFactory {
	protected $singletons;       // array of singleton objects
    protected static $singleton; // singleton of SingletonFactory

    /**
     * @return instance of an object
     */
	function getSingleton($class, $params = array()) {
	    if(!isset($this->singletons[$class])) {
	        $this->singletons[$class] = new $class($params);
	    }
	    return $this->singletons[$class];
	}
	
    /**
     * @return instance of an object
     */
	function setSingleton($class, $object) {
        $this->singletons[$class] = $object;
	}

    /**
     * @return instance of an object
     */
	function resetSingletons() {
        unset($this->singletons);
	}

	/**
	 * @return instance of the SingletonFactory object
	 */
    static function getInstance() {
        if(!isset(self::$singleton)) {
            self::$singleton = new SingletonFactory();
        }
        return self::$singleton;
    }
}
