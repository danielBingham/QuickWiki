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
*  New form to create a new article.  Shares an awful lot of code with the edit form. 
* It may be possible to combine those two, but for now it was easier to just make two
* forms rather than puzzling out how to separate out the logic specific to one or the
* other.  I generally also follow the rule of three: used twice?  Copy and paste.  Used
* thrice?  Abstract it.
*/
class NewAction extends QForm {
    protected $txtTitle;
    protected $txtContent;
    protected $txtMessage;

    protected $btnEdit;

    // Standard Form Hooks
    // {{{ Form_Create():                                                   protected void
    
    protected function Form_Create() {
        $this->txtTitle = new QTextBox($this);
        $this->txtTitle->Required = true;


        $this->txtContent = new QTextBox($this);
        $this->txtContent->TextMode = QTextMode::MultiLine;
        $this->txtContent->Required = true;


        $this->txtMessage = new QTextBox($this);
        
        $this->btnEdit = new QButton($this);
        $this->btnEdit->Text = 'Submit New';
        $this->btnEdit->AddAction(new QClickEvent(), new QServerAction('btnEdit_Click')); 
        $this->btnEdit->CausesValidation = true;
    }

    // }}}

    // Control Actions and Bindings
    // {{{ btnEdit_Click($strFormId, $strControlId, $strParameter):         protected void

    protected function btnEdit_Click($strFormId, $strControlId, $strParameter) {
        $objArticle = new Article();
        $objArticle->Save();
  
        // Retrieve the visitor performing this edit.
        $objVisitorService = new VisitorService();
        $objVisitor = $objVisitorService->getVisitor();

        // Create a new revision. 
        $objArticleRevision = new ArticleRevision();
        $objArticleRevision->ArticleId = $objArticle->Id; 
        $objArticleRevision->Title = $this->txtTitle->Text;
        $objArticleRevision->VisitorId = $objVisitor->Id; 
        $objArticleRevision->Message = $this->txtMessage->Text;
        $objArticleRevision->Created = new QDateTime(QDateTime::Now);

        // Force insert in order to create a new revision. 
        $objArticleRevision->Save(true);

    
     
        // Create this revision's content.  It's going to be an entirely
        // new content. 
        $objContent = new ArticleContent(); 
        $objContent->ArticleRevisionId = $objArticleRevision->Id;
        $objContent->Content = $this->txtContent->Text; 
        $objContent->Save(); 
        $objArticleRevision->ArticleContent = $objContent;
       
        // Now update the article's revision id, which should always point to
        // the current revision.  The back link costs us a little on the write
        // side, but is absolutely worth it on the read side.   
        $objArticle->ArticleRevisionId = $objArticleRevision->Id;
        $objArticle->Save(); 
        QApplication::redirect('/article/view/' . $objArticle->Id);
    }

    // }}}

}

?>
