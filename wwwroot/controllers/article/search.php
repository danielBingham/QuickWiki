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
* Search action.  Presents a search form (not managed by QControls)
* and allows the user to submit it.  Submit is a GET request that 
* redirects back here.  The form then calls the search service
* to perform the search and return a list of articles.
*
* No caching done for now.  The only way to perform caching I've
* come up with so far involves storing the query in the database.
* That means an extra database query for each search.  I don't actually
* expect any particular search to be run terribly frequently.  So most of the time
* that caching won't happen and the infrastructure to allow it to happen
* will just add another db hit to an already relatively expensive operation.
* Future profiling might change that calculation. 
*/
class SearchAction extends QForm {
    protected $dtrArticles;

    protected $strQuery;
    protected $objArticles;

    // Standard Form Hooks
    // {{{ Form_Create():                                                   protected void

    protected function Form_Create() {
        $this->strQuery = QApplication::QueryString('q');

            $this->dtrArticles = new QDataRepeater($this);
            
            $this->dtrArticles->Paginator = new QPaginator($this);
            $this->dtrArticles->ItemsPerPage = 30;
            $this->dtrArticles->UseAjax = true;

            $this->dtrArticles->Template = '../views/partials/title_list.tpl.php'; 

        if(!empty($this->strQuery)) { 
            $this->dtrArticles->setDataBinder('dtrArticles_Bind'); 
        }
    }

    // }}}

    // Control Actions and Bindings
    // {{{ dtrArticles_Bind():                                              public void


    public function dtrArticles_Bind() {
        $this->performSearch(); 
    }    

    // }}}

    // Custom Methods
    // {{{ loadArticleFromDb():                                             protected Article
    /**
    *  Load this article from the database and return it.
    */ 
    protected function performSearch() {
        $objSearchService = new SearchService();
        $this->dtrArticles->DataSource = $objSearchService->Search($this->strQuery, $this->dtrArticles->LimitInfo);
        $this->dtrArticles->TotalItemCount = $objSearchService->getResultCount($this->strQuery);
    }

    // }}}
}

?>
