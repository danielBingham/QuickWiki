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
*  The browse action handles displaying a paged list of all articles that have been written.
* We won't be caching this, as it's not a terribly expensive query nor do we expect it to get
* hit all that often. 
*/
class BrowseAction extends QForm {
    protected $dtrArticles;

    // Standard Form Hooks
    // {{{ Form_Create():                                                   protected void

    protected function Form_Create() {
        $this->dtrArticles = new QDataRepeater($this);
        $this->dtrArticles->Paginator = new QPaginator($this);
        $this->dtrArticles->ItemsPerPage = 30;

        $this->dtrArticles->Template = '../views/partials/title_list.tpl.php'; 

        $this->dtrArticles->setDataBinder('dtrArticles_Bind'); 

    }

    // }}}
   
    // Action and Load methods, bound to components 
    // {{{ dtrArticles_Bind():                                              public void
    /**
    * Bind the browse data for the data repeater (pager).
    * We cache a single page at a time (using the LimitInfo property of the
    * repeater as a part of the key).  When a page gets hit, it'll be cached.
    */
    public function dtrArticles_Bind() {
            $this->dtrArticles->DataSource = Article::LoadAll(QQ::Clause(QQ::Expand(QQN::Article()->ArticleRevision), $this->dtrArticles->LimitClause));
            $this->dtrArticles->TotalItemCount = Article::CountAll();
    }

    // }}}
}

?>
