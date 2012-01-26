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

class SearchService {

    // {{{ getResultCount($strSearch):                                      public int
    
    public function getResultCount($strSearch) {
        $objDatabase = QApplication::getDatabase();

        $objPrepareStatementService = new PrepareStatementService();

        $strQuery = 'SELECT Count(*) as ItemCount
                        FROM article 
                        LEFT JOIN article_revision ON (article.article_revision_id = article_revision.id) 
                        LEFT JOIN article_content ON (article_content.article_revision_id = article_revision.id) 
                        WHERE MATCH(article_revision.title) AGAINST(:search IN BOOLEAN MODE) 
                            OR MATCH(article_content.content) AGAINST (:search IN BOOLEAN MODE) ';
   
        $sqlQuery = $objPrepareStatementService->PrepareStatement($strQuery, array('search'=>$strSearch)); 
        $objDatabaseResult = $objDatabase->Query($sqlQuery);
        $mixResultArray = $objDatabaseResult->FetchArray();
        return $mixResultArray['ItemCount'];
    }

    // }}}
    // {{{ search($strSearch, $strLimit=''):                                public array(Article)

    public function search($strSearch, $strLimit='') {
        $objDatabase = QApplication::getDatabase();
        
        $objPrepareStatementService = new PrepareStatementService();

        $strQuery = 'SELECT article.id as id,
                            article.article_revision_id as article_revision_id,
                            article_revision.id as article__article_revision_id__id,
                            article_revision.article_id as article__article_revision_id__article_id,
                            article_revision.visitor_id as article__article_revision_id__visitor_id,
                            article_revision.title as article__article_revision_id__title,
                            article_revision.message as article__article_revision_id__message,
                            article_revision.created as article__article_revision_id__created,    
                            (MATCH(article_revision.title) AGAINST(:search IN BOOLEAN MODE) 
                                + MATCH(article_content.content) AGAINST(:search IN BOOLEAN MODE)) as relevance 
                        FROM article 
                        LEFT JOIN article_revision ON (article.article_revision_id = article_revision.id) 
                        LEFT JOIN article_content ON (article_content.article_revision_id = article_revision.id) 
                        WHERE MATCH(article_revision.title) AGAINST(:search IN BOOLEAN MODE) 
                            OR MATCH(article_content.content) AGAINST (:search IN BOOLEAN MODE) 
                        ORDER BY relevance DESC'
                    . ' ' . $objDatabase->SqlLimitVariableSuffix($strLimit);
   
        $sqlQuery = $objPrepareStatementService->PrepareStatement($strQuery, array('search'=>$strSearch)); 
        $objDatabaseResult = $objDatabase->query($sqlQuery);
        return Article::InstantiateDbResult($objDatabaseResult, array('ArticleRevision'));
    }

    // }}}

}

?>
