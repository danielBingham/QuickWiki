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

class PrepareStatementService {

    // {{{ PrepareStatement($strSql, $mixParameterArray):                   public string(escaped SQL)

    /**
    *  A prepare statement method that uses parameters in the same
    *  way that java does in order to quote values into SQL and allow
    *  us to run safe SQL through query.
    *
    * You may designate parameters either with single question mark, '?', or with
    * a colon and a name, ':myparam'.
    */
    public function PrepareStatement($strSql, $mixParameterArray) {
        $objDatabase = QApplication::getDatabase();

        $strQuery = $strSql;
        
        // Handle the named parameters first.  Replaces all instances
        // of ':{key}' with 'value'.
        foreach($mixParameterArray as $strKey=>$mixValue) {
            if(is_numeric($strKey)) 
                continue;

            $strQuery = str_replace(':' . $strKey, $objDatabase->SqlVariable($mixValue), $strQuery);
            unset($mixParameterArray[$strKey]); // Now remove it from the array, we don't need it anymore.
        }

        // Now deal with the unnamed parameters.  Replace a single instance of '?'
        // at a time with 'value'
        $pattern = '/\?/'; // Syntax highlighting was freaking out when I did it in place.  
        foreach($mixParameterArray as $mixValue) {
            $strQuery = preg_replace($pattern, $objDatabase->SqlVariable($mixValue), $strQuery, 1);
        } 
        
        return $strQuery; 
    }
    
    // }}}

}

?>
