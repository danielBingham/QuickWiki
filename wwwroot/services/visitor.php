<?php
/**
 * Copyright:
 *		Copyright (C) 2012 Daniel Bingham (http://www.theroadgoeson.com)
 *
 * License:
 *
 * This software is licensed under the MIT Open Source License which reads as
 * follows:
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in the
 * Software without restriction, including without limitation the rights to use, copy,
 * modify, merge, publish, distribute, sublicense, and/or sell copies of the Software,
 * and to permit persons to whom the Software is furnished to do so, subject to the
 * following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies
 * or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR
 * PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE
 * USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * For more information see here: http://www.opensource.org/licenses/mit-license.php
 */

/**
*  A service to handle retrieving visitors and determining if they are
* new or repeat visitors.
*/
class VisitorService {

    // {{{ getVisitor():                                                    public Visitor

    /**
    * Check's this visitor's ip address against the database.
    * If a visitor already exists for this ip address, return it.
    * Otherwise, create a new one, save it and return that.
    *
    * @return Visitor The populated model for our current visitor.
    */
    public function getVisitor() {
        $mixIp = $_SERVER['REMOTE_ADDR'];
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
            $mixIp = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
        }
        
        $objVisitor = Visitor::LoadByIp($mixIp);
        if(null === $objVisitor) {
            $objVisitor = new Visitor();
            $objVisitor->Ip = $mixIp; 
            $objVisitor->Save(); 
        }

        return $objVisitor;
    }

    // }}}

}

?>
