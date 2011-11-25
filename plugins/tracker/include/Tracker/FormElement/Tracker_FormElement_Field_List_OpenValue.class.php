<?php
/**
 * Copyright (c) Xerox Corporation, Codendi Team, 2001-2009. All rights reserved
 *
 * This file is a part of Codendi.
 *
 * Codendi is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Codendi is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Codendi. If not, see <http://www.gnu.org/licenses/>.
 */

require_once('Tracker_FormElement_Field_List_Value.class.php');

class Tracker_FormElement_Field_List_OpenValue extends Tracker_FormElement_Field_List_Value {
    
    protected $label;
    
    public function __construct($id, $label) {
        parent::__construct($id);
        $this->label = $label;
    }
    
    public function __toString() {
        return $this->getLabel();
    }
    
    public function getLabel() {
        return $this->label;
    }
    
    public function getJsonId() {
        return 'o'. $this->getId();
    }
    
    public function getUsername() {
        return $this->getLabel();
    }
}

?>