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
* Action to display an article's past revisions.  No caching to be done here
* as we don't expect this to get hit very often.    
*/
class HistoryAction extends QForm {
    protected $dtrRevisions;
    protected $mixArticleId;

    // Standard Form Hooks
    // {{{ Form_Create():                                                   protected void     

    protected function Form_Create() {
        // Get the id of the article out of the path info.
        $this->mixArticleId = QApplication::PathInfo(2); 

        $this->dtrRevisions = new QDataRepeater($this);  
        $this->dtrRevisions->Paginator = new QPaginator($this);
        $this->dtrRevisions->ItemsPerPage = 5;

        $this->dtrRevisions->Template = '../views/partials/revision_list.tpl.php'; 

        $this->dtrRevisions->setDataBinder('dtrRevisions_Bind'); 

    }

    // }}}
   
    // Control Actions and Binding
    // {{{ dtrRevisions_Bind():                                             protected void

    protected function dtrRevisions_Bind() {
        // Load all the revisions for that article.
        $this->dtrRevisions->DataSource = ArticleRevision::QueryArray(
            QQ::Equal(QQN::ArticleRevision()->ArticleId, $this->mixArticleId),
            QQ::Clause(
                    QQ::Expand(QQN::ArticleRevision()->ArticleContent),
                    QQ::Expand(QQN::ArticleRevision()->Visitor), 
                    $this->dtrRevisions->LimitClause, 
                    QQ::OrderBy(QQN::ArticleRevision()->Created, false)
            )
        );
        $this->dtrRevisions->TotalItemCount = ArticleRevision::QueryCount(
            QQ::Equal(QQN::ArticleRevision()->ArticleId, $this->mixArticleId)
        ); 
    }
    
    // }}}    
}


?>
